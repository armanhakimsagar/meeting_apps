<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="index.html">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-laptop"></i>
                    <span>User</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ url('developer/user_registration_view') }}">Register</a></li> <li>
                </ul>
                <ul class="sub">
                    <li><a  href="{{ url('developer/user_view') }}">List</a></li> <li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-laptop"></i>
                    <span>Department</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ url('developer/department_view') }}">Add Department</a></li> <li>
                </ul>
            </li>
            
            
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-laptop"></i>
                    <span>Company</span>
                </a>

                <ul class="sub">
                    <li><a  href="{{ url('developer/company_registration') }}">Add Company</a></li> <li>
                </ul>
                <ul class="sub">
                    <li><a  href="{{ url('developer/company_view') }}">List</a></li> <li>
                </ul>
            </li>
            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
