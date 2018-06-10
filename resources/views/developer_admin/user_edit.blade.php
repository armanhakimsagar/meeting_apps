<!--header start-->
@include('developer_admin.layout.header')
<!--header end-->
<!--sidebar start-->
@include('developer_admin.layout.sidebar')
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <div class="panel-body">
                        <form role="form" class="form-horizontal tasi-form" enctype="multipart/form-data" method="post" action="{{ url('developer/user_update') }}">
                            <div class="form-group">
                                <label for="name" class="col-lg-2 col-sm-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{ $user_data->name }}" class="form-control" id="user_name" name="user_name" placeholder="Type Name">
                                </div>

                            </div>
                            <input type="hidden" value="{{ $user_data->id }}" name="update_user_id">
                            @if ($errors->has('user_name'))

                            <div class="alert alert-danger">{{ $errors->first('user_name') }}</div>
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
                                    <input type="password" value="" class="form-control" id="passwords" name="passwords" placeholder="Type Password">
                                    <input type="hidden" name="old_picture" value="{{ $user_data->picture }}">
                                    <input type="hidden" name="old_password" value="{{ $user_data->passwords }}">
                                </div>
                            </div>

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

                            <div class="form-group">
                                <label for="exampleInputFile" class="col-lg-2 col-sm-2 control-label">Profile picture</label>
                                <div class="col-lg-10">
                                    <input type="file" name="picture" id="exampleInputFile" class="form-control">
                                </div>
                            </div>
                            <img src="{{ url('images/'.$user_data->picture) }}" width="200px">
                            @if ($errors->has('picture'))

                            <div class="alert alert-danger">{{ $errors->first('picture') }}</div>

                            @endif

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button class="btn btn-success" style="float: right" type="submit">Update</button>
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
@include('developer_admin.layout.right_sidebar')
<!-- Right Slidebar end -->
<!--footer start-->
@include('developer_admin.layout.footer')
<!--footer end-->
<script type="text/javascript">
    $("#new_admin").hide();
    $("#old_admin").hide();
    $("#old_check").click(function () {
        $("#old_admin").show();
        $("#new_admin").hide();
    });
    $("#new_check").click(function () {
        $("#new_admin").show();
        $("#old_admin").hide();
    });
</script>