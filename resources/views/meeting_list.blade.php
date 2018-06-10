@extends('layout.apps')
@section('list')

<style type="text/css">
    .fa{
        font-size: 20px
    }
</style>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <!-- page start-->
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Duplicate Question</h4>
                        </div>
                        <div class="modal-body">
                            <div class="ui-widget">
                                <input type="text" class="form-control" placeholder="Type meeting title" name="" id="meeting_for_radio">
                            </div>
                            <br>
                            <div class="ui-widget">
                                <input type="text" class="form-control" placeholder="Type agenda title" name="" id="agenda_for_radio">
                            </div>
                            <br>
                            <input type="text" class="form-control" placeholder="Single Choice Question Title">
                            <div class="panel">
                                <h4> Post question on behalf of </h4>
                                <label class="container" style="font-size: 14px; font-weight: normal">Company
                                    <input type="radio" name="check">
                                    <span class="checkmark"></span>
                                </label>

                                <label class="container" style="font-size: 14px; font-weight: normal">Personal
                                    <input type="radio" name="check">
                                    <span class="checkmark"></span>
                                </label>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Meeting title</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(session()->has('question_dependency'))
                    <div class="alert alert-success">
                        {{ session()->get('question_dependency') }}
                    </div>
                    @endif
                    
                    @if(session()->has('delete_success'))
                    <div class="alert alert-success">
                        {{ session()->get('delete_success') }}
                    </div>
                    @endif
                    
                    
                    @foreach($meetings as $meeting)
                    <tr>
                        <td>{{ $meeting->title }}</td>
                        <td>{{ $meeting->code }}</td>
                        <td>
                            <a  class="btn btn-success" href="{{ url('admin/meeting_edit/'.$meeting->id) }}"  ><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger delete" href="{{ url('admin/meeting_delete/'.$meeting->id) }}"><i class="fa fa-trash-o"></i></a>
                        </td>
                        
                    </tr>
                    
                    @endforeach
                    
                </tbody>
            </table>
            <!-- page end-->
            {{ $meetings->links() }}
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

@section('footer_js_scrip_area')

    @parent

        <script src="{{ asset('js/sweetalert.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css')}}">
        <script>
            
            $('.delete').click(function(e) {
                  e.preventDefault(); // Prevent the href from redirecting directly
                  var linkURL = $(this).attr("href");
                  warnBeforeRedirect(linkURL);
                });

                function warnBeforeRedirect(linkURL) {
                  swal({
                    title: "Sure want to delete?", 
                    text: "If you click 'OK' file will be deleted", 
                    type: "warning",
                    showCancelButton: true
                  }, function() {
                    // Redirect the user | linkURL is href url
                    window.location.href = linkURL;
                  });
              }

        </script>
    @endsection
    
    
@endsection


