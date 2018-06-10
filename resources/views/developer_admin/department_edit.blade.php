
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
                        <form role="form" enctype="multipart/form-data" class="form-horizontal tasi-form" method="post" action="{{ url('developer/department_update') }}">
                            <h4> Department Data Edit </h4>
                            {{ csrf_field() }}
                           
                            @foreach($department_edits as $department_edit)
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Department name</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $department_edit->name }}" placeholder="Enter Department Name">
                                    @if ($errors->has('name'))

                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                        <br>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" value="{{ $department_edit->id }}" name="id"/>  
                            <div class="form-group ">                                            
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Select Company</label>
                                <div class="col-lg-10">
                                    <select name="company_id" class="form-control myselect2">
                                        <option value="">Select Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}" <?php if ($company->id == $department_edit->company_id) {
                                                echo 'selected';
                                            } ?>>
                                            {{ $company->name }}
                                        </option> 
                                        @endforeach
                                    </select>                                         
                                </div>                                           
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-info">Update</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>


    <!--main content end-->
    <!-- Right Slidebar start -->
    @include('developer_admin.layout.right_sidebar')
    <!-- Right Slidebar end -->
    <!--footer start-->
    @include('developer_admin.layout.footer')


