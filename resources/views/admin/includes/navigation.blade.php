<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->

            <a class="navbar-brand" href="{{route('dashboard')}}">

                <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="{{asset('admin-panel/assets/images/logo-text.png')}}" alt="homepage" class="light-logo" width="50%" />

                        </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-menu"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                        <ul class="list-style-none">
                            <ul id="sidebarnav" class="p-t-30">
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                                @can('isAdmin')
                                    {{--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('employee')}}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Employee Management</span></a></li>--}}
                                @endcan
                                @can('isAdmin')
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('user')}}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">User Management</span></a></li>
                                    {{--<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="{{route('user')}}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">User Management</span></a>--}}
                                    {{--<ul aria-expanded="false" class="collapse  first-level">--}}
                                    {{--<li class="sidebar-item"><a href="{{route('user')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> User </span></a></li>--}}
                                    {{--<li class="sidebar-item"><a href="{{route('user.create')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add </span></a></li>--}}
                                    {{--</ul>--}}
                                    {{--</li>--}}
                                @endcan

                                @can('isAdmin')

                                            <li class="sidebar-item"><a href="{{route('designation1')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Designation </span></a></li>
                                            <li class="sidebar-item"><a href="{{route('department1')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Department </span></a></li>
                                            <li class="sidebar-item"><a href="{{route('salary1')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Salary </span></a></li>
                                            {{--<li class="sidebar-item"><a href="{{route('city')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> City </span></a></li>--}}
                                            {{--<li class="sidebar-item"><a href="{{route('shift')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Shift </span></a></li>--}}


                                @endcan


                                        @can('isEmployee')
                                            <li class="sidebar-item"><a href="{{route('leave.create')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Apply Leave</span></a></li>
                                        @endcan
                                        <li class="sidebar-item"><a href="{{route('leave')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Leave list</span></a></li>
                                        {{--<li class="sidebar-item"><a href="{{route('total-leave')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Total leave list</span></a></li>--}}



                                @can('isAdmin')

                                            {{--<li class="sidebar-item"><a href="{{route('managesalary')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Manage salary details </span></a></li>--}}
                                            <li class="sidebar-item"><a href="{{route('managesalary.salarylist2')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Payroll management</span></a></li>
                                            {{--<li class="sidebar-item"><a href="{{route('payroll.list')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Employee salary list </span></a></li>--}}
                                            {{--<li class="sidebar-item"><a href="{{route('payroll.payment')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Make payment </span></a></li>--}}
                                            {{--<li class="sidebar-item"><a href="{{route('payroll.payslip')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Generate payslip </span></a></li>--}}


                                @endcan

                                {{--<li class="sidebar-item"><a href="{{route('event')}}" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar </span></a></li>--}}
                                <li class="sidebar-item"><a href="{{route('calendar')}}" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar </span></a></li>


                                {{--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('download')}}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Downloads</span></a></li>--}}

                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Settings</span></a>

                                        <li class="sidebar-item"><a href="{{route('profile')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> My profile </span></a></li>
                                        {{--<li class="sidebar-item"><a href="{{route('change.password')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Change Password </span></a></li>--}}

                                </li>
                            </ul>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav float-right">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('admin-panel/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="{{route('profile')}}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>

                        {{--<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>--}}

                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <div class="dropdown-divider"></div>
                        <div class="p-l-30 p-10"><a href="{{route('profile')}}" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
