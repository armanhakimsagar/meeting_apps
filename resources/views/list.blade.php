@extends('layout.apps')
@section('list')

<style type="text/css">
    .fa{
        font-size: 18px
    }
    .ui-autocomplete { z-index:2147483647; }
    .div_style{height: 40px; width: 150px; background-color: #fff ; margin: 5px; border: 1px solid #ccc; text-align: center; line-height: 40px; cursor: pointer}
    .ui-menu-item-wrapper{width: 550px!important; height: 30px!important; border-radius: 0px!important; line-height:30px!important; padding: 5px!important; }

</style>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <!-- page start-->
            @if(session()->has('insert_success'))
            <div class="col-md-12 alert alert-success">
                Duplicate Successfully
            </div>
            <br>
            @endif
            @if(session()->has('publish_success'))
            <div class="col-md-12 alert alert-success">
                Publish Successfully
            </div>
            <br>
            @endif

            <table class="table">

                <tr>
                    <th>Question Title</th>
                    <th>Meeting Title</th>
                    <th>Action</th>
                </tr>

                @foreach($question_lists as $question_list)
                <tr>
                    <td width="40%">{{ $question_list->question_title }}</td>
                    <td width="40%">{{ get_meeting_name($question_list->meeting_id) }}</td>
                    <td width="20%">
                        <i class="fa fa-paper-plane"></i>

                        <span class="btn btn-warning" data-toggle="modal" data-target="#myModal{{ $question_list->id }}">
                            <i class="fa fa-copy"></i>
                        </span>
                        <a  class="btn btn-primary" href="{{ url('admin/publish_question/'.$question_list->id) }}">
                            <i class="glyphicon glyphicon-send" style="font-size:18px"></i>
                        </a>
                        <a class="btn btn-success" href="{{ url('admin/result_view/'.$question_list->question_type_id.'/'.$question_list->id) }}">
                            <i class="fa fa-list-alt" style="font-size:18px"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="myModal{{ $question_list->id }}" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Duplicate Question</h4>
                            </div>
                            <div class="modal-body">
                                
                                <?php if ($question_list->question_type_id == 1) { ?>
                                    <form action="{{ url('admin/single_question') }}" method="post">
                                        <input type="hidden" name="userid" value="{{ get_userid(Session::get('UserId')) }}">
                                        <input name="redirect" type="hidden" value="redirect"> 
                                        {{ csrf_field() }}
                                        <div class="ui-widget">
                                            <select class="form-control" name="meeting_id">
                                                <option>Select a meeting</option>
                                                @foreach($meeting_lists as $meeting_list)
                                                <option value="{{ $meeting_list->id }}">{{ $meeting_list->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="ui-widget">
                                            <select class="form-control" name="agenda_id">
                                                <option>Select a agenda</option>
                                                @foreach($agenda_lists as $agenda_list)
                                                <option value="{{ $agenda_list->id }}">{{ $agenda_list->agenda_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="panel">
                                            <h4> Post question on behalf of </h4>
                                            <label class="container" style="font-size: 14px; font-weight: normal">Company
                                                <input type="radio" name="check" value="1" required>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="container" style="font-size: 14px; font-weight: normal">Personal
                                                <input type="radio" name="check" value="2" required>
                                                <span class="checkmark"></span>
                                            </label>
                                            @if ($errors->has('check'))
                                            <br>
                                            <div class="alert alert-danger">{{ $errors->first('check') }}</div>

                                            @endif
                                        </div>
                                        <br>
                                        <input type="text" required class="form-control" value="{{ $question_list->question_title }}" readonly name="question_title" placeholder="Question Title">
                                        @if ($errors->has('question_title'))
                                        <br>
                                        <div class="alert alert-danger">{{ $errors->first('question_title') }}</div>

                                        @endif
                                        <br>
                                        <input type="submit" class="btn btn-success" value="Duplicate Question">
                                    </form>
                                <?php } ?>
                                <?php if ($question_list->question_type_id == 2) { ?>
                                    <form action="{{ url('admin/multiple_question') }}" method="post">
                                        <input type="hidden" name="userid" value="{{ get_userid(Session::get('UserId')) }}">
                                        <input name="redirect" type="hidden" value="redirect">
                                        {{ csrf_field() }}
                                        <div class="ui-widget">
                                            <select class="form-control" name="meeting_id">
                                                <option>Select a meeting</option>
                                                @foreach($meeting_lists as $meeting_list)
                                                <option value="{{ $meeting_list->id }}">{{ $meeting_list->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="ui-widget">
                                            <select class="form-control" name="agenda_id">
                                                <option>Select a agenda</option>
                                                @foreach($agenda_lists as $agenda_list)
                                                <option value="{{ $agenda_list->id }}">{{ $agenda_list->agenda_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <input type="text" required class="form-control" value="{{ $question_list->question_title }}" readonly name="question_title" placeholder="Single Choice Question Title">
                                        <div class="panel">
                                            <h4> Post question on behalf of </h4>
                                            <label class="container" style="font-size: 14px; font-weight: normal">Company
                                                <input type="radio" required name="check" value="1" required>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="container" style="font-size: 14px; font-weight: normal">Personal
                                                <input type="radio" required name="check" value="2" required>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-success" value="Duplicate Question">
                                    </form>
                                <?php } ?>
                                <?php if ($question_list->question_type_id == 3) { ?>
                                    <form action="{{ url('admin/multi_select') }}" method="post">
                                        <input type="hidden" name="userid" value="{{ get_userid(Session::get('UserId')) }}">
                                        <br><br><input name="redirect" type="hidden" value="redirect">
                                        {{ csrf_field() }}
                                        <div class="ui-widget">
                                            <select class="form-control" name="meeting_id">
                                                <option>Select a meeting</option>
                                                @foreach($meeting_lists as $meeting_list)
                                                <option value="{{ $meeting_list->id }}">{{ $meeting_list->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="ui-widget">
                                            <select class="form-control" name="agenda_id">
                                                <option>Select a agenda</option>
                                                @foreach($agenda_lists as $agenda_list)
                                                <option value="{{ $agenda_list->id }}">{{ $agenda_list->agenda_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <input type="text" value="{{ $question_list->question_title }}" readonly required class="form-control" placeholder="Multiple Choice Question Title" required  name="question_title">
                                        <br>
                                        <br><br>
                                        <div class="panel">
                                            <label class="container" style="font-size: 14px; font-weight: normal">Allow multiple choice
                                                <input type="radio" name="allow_choice" required value="1">
                                                <span class="checkmark" ></span>
                                            </label>

                                            <label class="container" style="font-size: 14px; font-weight: normal">Allow single choice
                                                <input type="radio" name="allow_choice" value="2" required>
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                        <hr> 
                                        <div class="panel">
                                            <h4> Post question on behalf of </h4>
                                            <label class="container" style="font-size: 14px; font-weight: normal">Company
                                                <input type="radio" name="check" value="1" required>
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="container" style="font-size: 14px; font-weight: normal">Personal
                                                <input type="radio" name="check" value="2" required>
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>
                                        <br><br>
                                        <input type="submit" class="btn btn-success" value="Duplicate Question">
                                    </form>
                                <?php } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </table>
            {{$question_lists->links()}}
            <!-- page end-->
        </div>
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


@endsection

