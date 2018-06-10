@extends('layout.apps')
@section('result_multiple')

<?php $result_comment ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">

    <section class="wrapper">
        <div class="panel">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="comments-container">
                        <div class="alert alert-success">
                            <strong>Message</strong> Please scroll for new message</a>.
                        </div>
                        <ul id="comments-list" class="comments-list">
                            <li>
                                @foreach($questions as $question)
                                
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img src="{{ asset('images/') }}/{{get_userimage($question->userid)}}" alt=""></div>
                                    <!-- Contenedor del Comentario -->
                                    
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name by-author">{{ get_username($question->userid) }}</h6>

                                        </div>
                                        <div class="comment-content">
                                            
                                                {{ $question->question_title }}
                                            
                                            <div class="comment-open">
                                                <a class="btn-reply">

                                                </a>
                                            </div>
                                        </div>
                                        <div class="comment-footer">
                                            <div class="comment-form">
                                                <textarea class="form-control" name="" id=""></textarea>
                                                <div class="pull-right send-button">
                                                    <a class="btn-send">send</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                                <div id="reply"></div>



                            </li>

                        </ul>

                    </div>


                </div>
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
<script>
   
</script>

@section('footer_js_scrip_area')
    @parent
        <script>

           myVar = setInterval(alertFunc, 2000);

           function alertFunc(){

              $.ajax({
                    url: "{{ url('admin/reply_sink') }}/"+{{ $question->id }},
                    type: "get",
                    processData:false,
                    success: function(data){
                        $("#reply").html(data);
                    },
                    error: function(){}           
                });
           }

        </script>
    @endsection
@endsection 

