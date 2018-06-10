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
                        <form role="form" enctype="multipart/form-data" class="form-horizontal tasi-form" method="post" action="{{ url('developer/registration') }}">
                            <h4> Company Register </h4>
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Company name</label>
                                <div class="col-lg-10">
                                    <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" value="{{ old('company_name') }}" placeholder="Enter Company name">
                                </div>
                            </div>
                            @if ($errors->has('company_name'))

                            <div class="alert alert-danger">{{ $errors->first('company_name') }}</div>

                            @endif
                            <div class="form-group ">                                            
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Parent Company (optional)</label>
                                <div class="col-lg-10">
                                    <select name="parent_company" id="company_name" class="form-control myselect2">
                                        <option>Select Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option> 
                                        @endforeach
                                    </select>                                          
                                </div>                                           
                            </div>
                           
                            <div class="form-group ">                                            
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Company Admin (optional)</label>
                                <div class="col-lg-10">
                                    <select name="user_id" class="form-control myselect2">
                                        <option>Select Admin</option>
                                            @foreach($registrations as $registration)
                                            <option value="{{ $registration->id }}">{{ $registration->name }}</option> 
                                            @endforeach
                                    </select>                                          
                                </div>                                           
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Address 1</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" value="{{ old('address_1') }}" name="address_1" id="exampleInputEmail1" placeholder="Enter Addtess"></textarea>
                                </div>
                            </div>
                             @if ($errors->has('address_1'))

                            <div class="alert alert-danger">{{ $errors->first('address_1') }}</div>

                            @endif
                            
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Address 2</label>
                                <div class="col-lg-10">
                                <textarea class="form-control" name="address_2" value="{{ old('address_2') }}" id="exampleInputEmail1" placeholder="Enter Addtess"></textarea>
                                </div>
                            </div>
                            
                            @if ($errors->has('address_2'))

                            <div class="alert alert-danger">{{ $errors->first('address_2') }}</div>

                            @endif
                            
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Logo</label>
                                <div class="col-lg-10">
                                <input type="file" name="company_logo" class="form-control">
                                </div>
                            </div>
                            @if ($errors->has('company_logo'))

                            <div class="alert alert-danger">{{ $errors->first('company_logo') }}</div>

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

