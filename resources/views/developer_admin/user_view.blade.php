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
            <!-- page start-->
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Duplicate Question</h4>
                        </div>
                        <div class="modal-body">
                            <div class="ui-widget">
                                <input type="text" class="form-control" placeholder="Type meeting title" name="" id="meeting_for_radio">
                            </div>
                            <br>
                            <div class="ui-widget">
                                <input type="text" class="form-control" placeholder="Type agenda title" name="" id="agenda_for_radio">
                            </div>
                            <br>
                            <input type="text" class="form-control" placeholder="Single Choice Question Title">
                            <div class="panel">
                                <h4> Post question on behalf of </h4>
                                <label class="container" style="font-size: 14px; font-weight: normal">Company
                                    <input type="radio" name="check">
                                    <span class="checkmark"></span>
                                </label>

                                <label class="container" style="font-size: 14px; font-weight: normal">Personal
                                    <input type="radio" name="check">
                                    <span class="checkmark"></span>
                                </label>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Company Name</th>
                        <th>Designation</th>
                        <th>Phone Number</th>

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


                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->company_name }}</td>
                    <td>{{ $user->designation }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a  class="btn btn-success" href="{{ url('developer/user_edit/'.$user->id) }}"  ><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger delete" href="{{ url('developer/user_delete/'.$user->id) }}"><i class="fa fa-trash-o"></i></a>
                    </td>

                </tr>

                @endforeach

                </tbody>
                
            </table>
            {{$users->links()}}
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