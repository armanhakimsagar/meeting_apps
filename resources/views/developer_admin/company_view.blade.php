<!--header start-->
@include('developer_admin.layout.header')
<!--header end-->
<!--sidebar start-->
@include('developer_admin.layout.sidebar')
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <table class="table">
                <thead>
                    <tr>
                        <th>Company Name</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(session()->has('user_msg'))
                <div class="alert alert-success">
                    {{ session()->get('user_msg') }}
                </div>
                @endif

                @if(session()->has('alert_msg'))
                <div class="alert alert-danger">
                    {{ session()->get('alert_msg') }}
                </div>
                @endif


                @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>
                        <a  class="btn btn-success" href="{{ url('developer/company_edit/'.$company->id) }}"  ><i class="fa fa-edit"></i></a>
                        <a class="delete btn btn-danger" href="{{ url('developer/company_delete/'.$company->id) }}"><i class="fa fa-trash-o"></i></a>
                    </td>

                </tr>
                
                @endforeach

                </tbody>
                

            </table>
            <!-- page end-->
        </div>
    </section>
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

