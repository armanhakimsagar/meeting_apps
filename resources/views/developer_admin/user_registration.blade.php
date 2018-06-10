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
                        <form role="form" enctype="multipart/form-data" class="form-horizontal tasi-form" method="post" action="{{ url('developer/user_registration') }}">
                            {{ csrf_field() }}


                            <h4> Admin Information </h4>

                            
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Admin Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="user_name" id="exampleInputEmail1" placeholder="Enter name">
                                </div>
                            </div>
                            @if ($errors->has('user_name'))

                            <div class="alert alert-danger">{{ $errors->first('user_name') }}</div>

                            @endif
                            
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Email address</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control"name="email" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                            </div>
                            @if ($errors->has('email'))

                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>

                            @endif
                            
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" name="passwords" id="exampleInputEmail1" placeholder="Enter Password">
                                </div>
                            </div>
                            @if ($errors->has('passwords'))

                            <div class="alert alert-danger">{{ $errors->first('passwords') }}</div>

                            @endif
                            
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Phone Number</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            @if ($errors->has('phone'))

                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>

                            @endif
                            

                            
                            
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Designation</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="designation" id="exampleInputEmail1" placeholder="Enter Designation">
                                </div>
                            </div>
                            @if ($errors->has('designation'))

                            <div class="alert alert-danger">{{ $errors->first('designation') }}</div>

                            @endif
                            
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Profile picture</label>
                                <div class="col-lg-10">
                                    <input type="file" name="picture" id="exampleInputFile" class="form-control">
                                </div>
                            </div>

                            @if ($errors->has('picture'))

                            <div class="alert alert-danger">{{ $errors->first('picture') }}</div>

                            @endif
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
