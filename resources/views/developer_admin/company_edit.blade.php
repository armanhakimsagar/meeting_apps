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
                        <form role="form" enctype="multipart/form-data" class="form-horizontal tasi-form" method="post" action="{{ url('developer/company_update') }}">
                            <h4> Company Information </h4>
                            {{ csrf_field() }}

                            @if ($errors->has('company_name'))

                            <div class="alert alert-danger">{{ $errors->first('company_name') }}</div>

                            @endif
                            <input type="hidden" value="{{ $company_data->id }}" name="update_company_id">
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Company name</label>
                                <div class="col-lg-10">
                                    <input type="text" name="company_name" value="{{$company_data->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Company name">
                                </div>
                            </div>
                            <div class="form-group ">                                            
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Company Admin</label>
                                <div class="col-lg-10">
                                    <select name="user_id" class="form-control myselect2">
                                        <option value="">Select Admin</option>
                                            @foreach($registrations as $registration)
                                            <option value="{{ $registration->id }}"  <?php if ($registration->id == $company_data->user_id) {
                                            echo 'selected';
                                        } ?>>{{ $registration->name }}</option> 
                                            @endforeach
                                    </select>                                          
                                </div>                                           
                            </div>
                            <div class="form-group ">                                            
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Parent Company</label>
                                <div class="col-lg-10">
                                    <select name="parent_company" id="company_name" class="form-control myselect2">
                                        <option value="">Select Parent Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}" <?php if ($company->id == $company_data->parent_company) {
                                            echo 'selected';
                                        } ?>>{{ $company->name }}
                                        </option> 
                                        @endforeach
                                    </select>                                         
                                </div>                                           
                            </div>
                            @if ($errors->has('address_1'))

                            <div class="alert alert-danger">{{ $errors->first('address_1') }}</div>

                            @endif
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Address 1</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="address_1" id="exampleInputEmail1" placeholder="Enter Addtess">{{$company_data->address_1}}</textarea>
                                </div>
                            </div>
                            @if ($errors->has('address_2'))

                            <div class="alert alert-danger">{{ $errors->first('address_2') }}</div>

                            @endif
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Address 2</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="address_2" id="exampleInputEmail1" placeholder="Enter Addtess">{{$company_data->address_2}}</textarea>
                                </div>
                            </div>
                            @if ($errors->has('company_logo'))

                            <div class="alert alert-danger">{{ $errors->first('company_logo') }}</div>

                            @endif
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Logo</label>
                                <div class="col-lg-10">
                                    <input type="file" name="company_logo" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                
                                <div class="col-lg-10">
                                    <img src="{{ url('images/'.$company_data->company_logo) }}" width="200px"/>
                                    <input type="hidden" value="{{ $company_data->company_logo }}" name="old_picture">
                                </div>
                            </div>
                            
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
<script>
    $(function () {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#tags").autocomplete({
            source: availableTags
        });
    });
</script>

