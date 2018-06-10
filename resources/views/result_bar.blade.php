@extends('layout.apps')
@section('result_bar')


<!--sidebar end-->
<!--main content start-->
<section id="main-content" onLoad="autoSink()">
    <div class="row">
        <div class="col-lg-12">
            <section class="wrapper">
                <div class="comments-container">
                    <ul id="comments-list" class="comments-list">
                        <li>
                            @foreach($question as $questions)  
                            <div class="comment-main-level">
                                <!-- Avatar -->
                                <div class="comment-avatar"><img src="{{ asset('img/') }}/{{get_userimage($questions->userid)}}" alt=""></div>
                                <!-- Contenedor del Comentario -->
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name by-author"><a href="#">
                                            {{ get_username($questions->userid) }}</a></h6>

                                    </div>
                                    <div class="comment-content">
                                                                 
                                        {{ $questions->question_title }}
                                        
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
                        </li>
                    </ul>
                    <hr>

                    <div class="row">
                        <div class="col-lg-12">                   
                        <?php 
                          $uri = Request::server('REQUEST_URI');
                          $id = (explode("/",$uri));
                          $id3 = $id[4];
                        ?>
                            <div id="bar-container" style ="width: 550px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
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
   
 <script src = "https://code.highcharts.com/highcharts.js"></script>  
   
<script language = "JavaScript">
         $(document).ready(function() {  
            var chart = {
               type: 'column'
            };
            var title = {
               text: 'Reply of the Users'   
            };
           
            var xAxis = {
               categories: ['No', 'Yes'],
               crosshair: true
            };
            var yAxis = {
               min: 0,
               title: {
                  text: 'Reply'         
               }      
            };
            var tooltip = {
               headerFormat: '<span style = "font-size:10px">{point.key}</span><table>',
               pointFormat: '<tr><td style = "color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style = "padding:0"><b>{point.y:.1f}</b></td></tr>',
               footerFormat: '</table>',
               shared: true,
               useHTML: true
            };
            var plotOptions = {
               column: {
                  pointPadding: 0.2,
                  borderWidth: 0
               }
            };  
            var credits = {
               enabled: false
            };
            var series= [
               {
                  name: 'Reply',
                  data: [0, 0]
               }
            ];     
         
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            //json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;  
            json.credits = credits;
            setInterval(function(){ test(); }, 4000); 
            function test() {
                $.ajax({
                    type:"GET",
                    url: "../../../admin/chart_data/<?php echo $id3; ?>",
                    dataType:"JSON",
                    success: function(series) {  
                        json.series = [{name: 'Reply', data: series[0]}];
                        $('#bar-container').highcharts(json);    
                    }
                });                
            }
         });                  
      </script>       
    @endsection
@endsection