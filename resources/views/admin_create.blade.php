
@extends('layout.apps')
@section('admin_create')
<!--header end-->
<!--sidebar start-->
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <header class="panel-heading">
                        Registration
                    </header>
                    <div class="panel-body">

                        <form action="{{ url('admin/user_data_insert') }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter name" >
                            </div>
                            @if ($errors->has('name'))

                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            <br>
                            @endif
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email"  >
                            </div>
                            @if ($errors->has('email'))

                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            <br>
                            @endif
                            <div class="form-group">
                                <label for="passwords">Password</label>
                                <input type="password" name="passwords" value="{{ old('passwords') }}" class="form-control" id="passwords" placeholder="Enter password"  >
                            </div>
                            @if ($errors->has('passwords'))

                            <div class="alert alert-danger">{{ $errors->first('passwords') }}</div>
                            <br>
                            @endif
                            
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" name="designation" value="{{ old('designation') }}" class="form-control" id="designation" placeholder="Enter designation" >
                            </div>
                            @if ($errors->has('designation'))

                            <div class="alert alert-danger">{{ $errors->first('designation') }}</div>
                            <br>
                            @endif
                            
                            
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" placeholder="Enter phone no." >
                            </div>

                            @if ($errors->has('phone'))

                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                            <br>
                            @endif

                            <div class="form-group">
                                <label for="picture">Select Photo</label>
                                <input type="file" name="picture" value="{{ old('picture') }}" class="form-control" id="picture"  >
                            </div>
                            @if ($errors->has('picture'))

                            <div class="alert alert-danger">{{ $errors->first('picture') }}</div>
                            <br>
                            @endif

                            <label class="container" style="font-size: 14px;font-weight: normal;">Register As Admin
                                <input type="radio" name="admin_role" value="1">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container" style="font-size: 14px;font-weight: normal;">Register As User
                                <input type="radio" name="admin_role" value="0">

                                <span class="checkmark"></span>
                            </label>

                            <button type="submit" class="btn btn-info">Submit</button>
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
                    <img alt="" src="img/img_avatar1.png" class="media-object">
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
                    <img alt="" src="img/chat-avatar.jpg" class="media-object">
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
                    <img alt="" src="img/pro-ac-1.png" class="media-object">
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
                    <img alt="" src="img/avatar1.jpg" class="media-object">
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
                    <img alt="" src="img/mail-avatar.jpg" class="media-object">
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








