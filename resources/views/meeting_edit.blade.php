@extends('layout.apps')
@section('meeting')



<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-7">
                <section class="panel">
                    @if(session()->has('meeting_msg'))
                    <div class="alert alert-success">
                        {{ session()->get('meeting_msg') }}
                    </div>
                    @endif
                    <header class="panel-heading">
                        Add Meeting
                    </header>
                    <div class="panel-body">
                        <form role="form" class="form-horizontal tasi-form" method="post" action="{{ url('admin/update_meeting') }}">
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Title</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $meeting_edits->title }}" class="form-control" id="inputPassword1" name="title" placeholder="Type title">
                                </div>

                            </div>
                            <input type="hidden" value="{{ $meeting_edits->id }}" name="update_id">
                            @if ($errors->has('title'))

                            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                            <br>
                            @endif

                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $meeting_edits->description }}" class="form-control" id="inputPassword1" name="description" placeholder="Type description">
                                </div>
                            </div>

                            @if ($errors->has('description'))

                            <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                            <br>
                            @endif

                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Start Time</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ date('h:i:s a', $meeting_edits->start_time) }}" class="form-control" id="basicExample1" name="start_time" placeholder="Start Time">
                                </div>
                            </div>

                            @if ($errors->has('start_time'))

                            <div class="alert alert-danger">{{ $errors->first('start_time') }}</div>
                            <br>
                            @endif

                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">End Time</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ date('h:i:s a', $meeting_edits->end_time) }}" class="form-control" id="basicExample2" name="end_time" placeholder="End Time">
                                </div>
                            </div>

                            @if ($errors->has('end_time'))

                            <div class="alert alert-danger">{{ $errors->first('end_time') }}</div>
                            <br>
                            @endif


                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Location</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $meeting_edits->location }}" class="form-control" id="inputPassword1" name="location" placeholder="Type location">
                                </div>
                            </div>

                            @if ($errors->has('location'))

                            <div class="alert alert-danger">{{ $errors->first('location') }}</div>
                            <br>
                            @endif

                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Code</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $meeting_edits->code }}" class="form-control" id="inputPassword1" name="code" placeholder="Type code">
                                </div>
                            </div>

                            @if ($errors->has('code'))

                            <div class="alert alert-danger">{{ $errors->first('code') }}</div>
                            <br>
                            @endif

                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Presenter</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $meeting_edits->presenter }}" class="form-control" id="inputPassword1" name="presenter" placeholder="Type presenter name here">
                                </div>
                            </div>

                            @if ($errors->has('presenter'))

                            <div class="alert alert-danger">{{ $errors->first('presenter') }}</div>
                            <br>
                            @endif

                            @foreach($agendas as $key => $agenda)
                            <div class="panel-body panel_hide{{ ++$key }}">
                                <header class="panel-heading">
                                    Add Agenda | <button type="button" id="panel_hide{{ $key }}"  style="border:none;float:right" value="Remove" onclick="hide_panel(this.id)"><i class="fa fa-trash-o btn btn-danger"></i></button>
                                    
                                </header>

                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Agenda name</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="{{ $agenda->agenda_name }}" class="form-control" name="agenda_name_{{ $key }}" id="inputPassword1" placeholder="Agenda name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Speaker</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="{{ $agenda->speaker }}" class="form-control" name="speaker_{{ $key }}" id="inputPassword1" placeholder="Speaker" required>
                                        
                                    </div>
                                </div>

                                <input type="hidden" name="count" id="count" value="{{ $key }}">
                                
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Room No</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="{{ $agenda->room }}" class="form-control" name="room_{{ $key }}" id="inputPassword1" placeholder="Room No" required>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <div id="address"></div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <br><br>
                                    <button class="btn btn-success" id="add" type="button" style="margin-left: 110px">Add Agenda</button>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button class="btn btn-success" style="float: right" type="submit">Update</button>
                                </div>
                            </div>
                    </div>
                    </form>
            </div>
    </section>
</div>




</div>
<!-- page end-->
</section>
</section>
<!--main content end-->
<!-- Right Slidebar start -->
<div class="sb-slidebar sb-right sb-style-overlay">
    <h5 class="side-title">Online Customers</h5>
    <ul class="quick-chat-list">
        <li class="online">
            <div class="media">
                <a href="#" class="pull-left media-thumb">
                    <img alt="" src="" class="media-object">
                </a>
                <div class="media-body">
                    <strong>John Doe</strong>
                    <small>Dream Land, AU</small>
                </div>
            </div><!-- media -->
        </li>
        <li class="online">
            <div class="media">
                <a href="#" class="pull-left media-thumb">
                    <img alt="" src="" class="media-object">
                </a>
                <div class="media-body">
                    <div class="media-status">
                        <span class=" badge bg-important">3</span>
                    </div>
                    <strong>Jonathan Smith</strong>
                    <small>United States</small>
                </div>
            </div><!-- media -->
        </li>

        <li class="online">
            <div class="media">
                <a href="#" class="pull-left media-thumb">
                    <img alt="" src="" class="media-object">
                </a>
                <div class="media-body">
                    <div class="media-status">
                        <span class=" badge bg-success">5</span>
                    </div>
                    <strong>Jane Doe</strong>
                    <small>ABC, USA</small>
                </div>
            </div><!-- media -->
        </li>
        <li class="online">
            <div class="media">
                <a href="#" class="pull-left media-thumb">
                    <img alt="" src="" class="media-object">
                </a>
                <div class="media-body">
                    <strong>Anjelina Joli</strong>
                    <small>Fockland, UK</small>
                </div>
            </div><!-- media -->
        </li>
        <li class="online">
            <div class="media">
                <a href="#" class="pull-left media-thumb">
                    <img alt="" src="" class="media-object">
                </a>
                <div class="media-body">
                    <div class="media-status">
                        <span class=" badge bg-warning">7</span>
                    </div>
                    <strong>Mr Tasi</strong>
                    <small>Dream Land, USA</small>
                </div>
            </div><!-- media -->
        </li>
    </ul>
    <h5 class="side-title"> pending Task</h5>
    <ul class="p-task tasks-bar">
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc">Dashboard v1.3</div>
                    <div class="percent">40%</div>
                </div>
                <div class="progress progress-striped">
                    <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                        <span class="sr-only">40% Complete (success)</span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                </div>
                <div class="progress progress-striped">
                    <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                        <span class="sr-only">60% Complete (warning)</span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc">Iphone Development</div>
                    <div class="percent">87%</div>
                </div>
                <div class="progress progress-striped">
                    <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                        <span class="sr-only">87% Complete</span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc">Mobile App</div>
                    <div class="percent">33%</div>
                </div>
                <div class="progress progress-striped">
                    <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                        <span class="sr-only">33% Complete (danger)</span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="task-info">
                    <div class="desc">Dashboard v1.3</div>
                    <div class="percent">45%</div>
                </div>
                <div class="progress progress-striped active">
                    <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                        <span class="sr-only">45% Complete</span>
                    </div>
                </div>

            </a>
        </li>
        <li class="external">
            <a href="#">See All Tasks</a>
        </li>
    </ul>
</div>
@section('footer_js_scrip_area')

@parent
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- date picker meeting insert -->

<script src="{{ asset('js/time_picker.js') }}"></script>
<script>$('#basicExample1').timepicker();</script>
<script>$('#basicExample2').timepicker();</script>
<script>
    $('#basicExample1').timepicker({
        timeFormat: 'h:i a',
        interval: 30,
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
</script>
<!--script for agenda loop-->
<script>
    var count = <?php echo ++$agenda_count; ?>;
    $("#add").click(function () {
        console.log(count);
        var html = '<div class="panel-body panel_hide'+count+'"><header class="panel-heading">Add Agenda | <button type="button" id="panel_hide'+count+'" onclick="hide_panel(this.id)" style="border:none;float:right"><i class="fa fa-trash-o btn btn-danger"></i></button></header><div class="form-group"><label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Agenda name</label><div class="col-lg-10"><input type="text" required class="form-control" id="inputPassword1" placeholder="Agenda name" name="agenda_name_'+count+'"></div></div><div class="form-group"><label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Speaker</label><div class="col-lg-10"><input type="text" required class="form-control" id="inputPassword1" placeholder="Speaker" name="speaker_'+count+'"></div></div><div class="form-group"><label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Room No</label><div class="col-lg-10"><input required type="text" class="form-control" id="inputPassword1" placeholder="Room No" name="room_'+count+'""><input type="hidden" name="count" value="'+count+'"></div></div></div>';
        $("#address").append(html);

        count++;
    });


    function hide_panel(id){
        console.log(id);
        $("."+id).hide();
    }
</script>
@endsection

@endsection

