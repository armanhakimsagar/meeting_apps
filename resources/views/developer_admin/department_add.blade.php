
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
                        <form role="form" enctype="multipart/form-data" class="form-horizontal tasi-form" method="post" action="{{ url('developer/department_add') }}">
                            <h4> Department Register </h4>
                            {{ csrf_field() }}
                            @if(session()->has('user_msg'))
                            <div class="alert alert-success">
                                {{ session()->get('user_msg') }}
                            </div>
                            @endif
                            @if(session()->has('user_update'))
                            <div class="alert alert-success">
                                {{ session()->get('user_update') }}
                            </div>
                            @endif
                                

                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Department name</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Department Name">
                                </div>
                            </div>
                            @if ($errors->has('name'))
                            <br>
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>

                            @endif
                            <div class="form-group ">                                            
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Select Company</label>
                                <div class="col-lg-10">
                                    <select name="company_id" class="form-control myselect2">
                                        <option value="">Select Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}">
                                            {{ $company->name }}
                                        </option> 
                                        @endforeach
                                    </select>                                         
                                </div>                                           
                            </div>
                            @if ($errors->has('company_id'))
                            <br>
                            <div class="alert alert-danger">{{ $errors->first('company_id') }}</div>

                            @endif
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>


    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    @if(session()->has('dep_msg'))
                    <div class="alert alert-success">
                        {{ session()->get('dep_msg') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Department name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                        <tbody>
                            
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a  class="btn btn-success" href="{{ url('developer/department_edit/'.$department->id) }}"  ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger delete" href="{{ url('developer/department_delete/'.$department->id) }}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </section>
    <!--main content end-->
    <!-- Right Slidebar start -->
    @include('developer_admin.layout.right_sidebar')
    <!-- Right Slidebar end -->
    <!--footer start-->
@include('developer_admin.layout.footer')
<!--footer end-->
<script src="{{ asset('js/sweetalert.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/sweetalert.css')}}">
<script type="text/javascript">

    $('.delete').click(function (e) {
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
        }, function () {
            // Redirect the user | linkURL is href url
            window.location.href = linkURL;
        });
    }
</script>
