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
                    @if(session()->has('user_msg'))
                    <div class="alert alert-success">
                        {{ session()->get('user_msg') }}
                    </div>
                    @endif
                    <header class="panel-heading">
                        Add Meeting
                    </header>
                    <div class="panel-body">
                        <form role="form" class="form-horizontal tasi-form" enctype="multipart/form-data" method="post" action="{{ url('admin/update_user') }}">
                            <div class="form-group">
                                <label for="name" class="col-lg-2 col-sm-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $user_data->name }}" class="form-control" id="name" name="name" placeholder="Type Name">
                                </div>

                            </div>
                            <input type="hidden" value="{{ $user_data->id }}" name="update_user_id">
                            @if ($errors->has('title'))

                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            <br>
                            @endif

                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email" class="col-lg-2 col-sm-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $user_data->email }}" class="form-control" id="email" name="email" placeholder="Type Email">
                                </div>
                            </div>

                            @if ($errors->has('email'))

                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            <br>
                            @endif

                            <div class="form-group">
                                <label for="passwords" class="col-lg-2 col-sm-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" value="" class="form-control" id="passwords" name="passwords" placeholder="Type Passwords (Optional)">
                                </div>
                            </div>
                            <input type="hidden" value="{{ $user_data->passwords }}"  name="old_password">
                            @if ($errors->has('passwords'))

                            <div class="alert alert-danger">{{ $errors->first('passwords') }}</div>
                            <br>
                            @endif


                            <div class="form-group">
                                <label for="designation" class="col-lg-2 col-sm-2 control-label">Designation</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $user_data->designation }}" class="form-control" id="designation" name="designation" placeholder="Type Designation">
                                </div>
                            </div>

                            @if ($errors->has('designation'))

                            <div class="alert alert-danger">{{ $errors->first('designation') }}</div>
                            <br>
                            @endif

                            
                            <div class="form-group">
                                <label for="phone" class="col-lg-2 col-sm-2 control-label">Phone</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $user_data->phone }}" class="form-control" id="phone" name="phone" placeholder="Type Phone">
                                </div>
                            </div>

                            @if ($errors->has('phone'))

                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                            <br>
                            @endif
                            
                            <input type="hidden" value="{{ $user_data->picture }}"  name="old_image">
                            
                            <div class="form-group">
                                <label for="picture" class="col-lg-2 col-sm-2 control-label">Upload Picture</label>
                                <div class="col-lg-10">
                                    <input type="file" name="picture">
                                    <?php if($user_data->picture != ""){ ?>
                                        <img src="{{ asset('/images/' . $user_data->picture) }}" width="200px"/>
                                        <input type="hidden" value="{{ $user_data->picture }}" name="old_image">
                                    <?php } ?>
                                    
                                </div>
                            </div>

                            @if ($errors->has('picture'))

                            <div class="alert alert-danger">{{ $errors->first('picture') }}</div>
                            <br>
                            @endif
                            
                            <label class="container" style="font-size: 14px;font-weight: normal;">Register As Admin
                                <input type="radio" <?php if ($user_data->admin_role == 1){ echo 'checked'; } ?>  name="admin_role" value="1">
                                <span class="checkmark"></span>
                            </label>

                            <label class="container" style="font-size: 14px;font-weight: normal;">Register As User
                                <input type="radio" <?php if ($user_data->admin_role == 0){ echo 'checked'; } ?> name="admin_role" value="0">

                                <span class="checkmark"></span>
                            </label>
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

@endsection


