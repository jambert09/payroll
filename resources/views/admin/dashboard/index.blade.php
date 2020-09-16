@extends('admin.layout.master')

@section('content')

    <div >

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <td>
            @if(Auth::user()->role=='admin')
                {{--{{$leave->is_approved}}--}}

                <div class="container-fluid">
                    <div class="card">
                        <div class="alert-success">

                            <h6 class="card-title m-b-0">New Update:</h6>
                            <p> <strong> 1.</strong> You can now see the history of your salary.<br>
                                <strong> 2.</strong> Set first your PDF Password before downloading each salary.<br>
                                <strong> Any previous salary posted will not be included from today's history Nov. 13, 2019</strong><br>


                            </p>
                        </div>
                    </div>
                    @if(Auth::user()->role=='admin')
                        <div class="card">
                            <div class="alert-primary">

                                <h6 class="card-title m-b-0">Admin Features (Phase 2) Update:</h6>
                                <p> <strong> 1.</strong> Payroll Management is now ready for bulk and history of payrolls.<br>
                                    <strong> 2.</strong> Editing of payrolls if error computation occurs.<br>
                                    <strong> 3.</strong> Same before of creating OTU and Payroll, but now having history in each salary dates.<br>


                                </p>
                            </div>
                        </div>
                    @else
                        @endif


                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover"><a href="{{ route('mysalary')  }}">
                                <div class="box bg-primary text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                    <h5 class="m-b-0 m-t-5 text-white"></h5>
                                    <h6 class="text-white"  >Salary History</h6>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover"><a href="{{ route('pdfnew')  }}">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                    <h5 class="m-b-0 m-t-5 text-white"></h5>
                                    <h6 class="text-white"  >PDF Security</h6>
                                </div>
                            </a></div>
                    </div>
                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                    <h5 class="m-b-0 m-t-5 text-white">{{ $users->total() }}</h5>
                                    <h6 class="text-white">Total employees</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                    <h5 class="m-b-0 m-t-5 text-white"></h5>
                                    <h6 class="text-white">Total leaves</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                    <h5 class="m-b-0 m-t-5 text-white"></h5>
                                    <h6 class="text-white">On leave</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-2 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-cyan text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                    <h5 class="m-b-0 m-t-5 text-white"></h5>
                                    <h6 class="text-white">Designation</h6>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Calendar</h4>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" style="background: #2e642e; color: white">
                                                            Company Calendar
                                                        </div>
                                                        <div class="panel-body">
                                                            {!! $calendar->calendar() !!}
                                                            {!! $calendar->script() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body b-l calender-sidebar">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else


                <div class="container-fluid">
                    <div class="card">
                        <div class="alert-success">

                            <h6 class="card-title m-b-0">New Update:</h6>
                            <p> <strong> 1.</strong> You can now see the history of your salary.<br>
                                <strong> 2.</strong> Set first your PDF Password before downloading each salary.<br>
                                <strong> Any previous salary posted will not be included from today's history Nov. 13, 2019</strong><br>


                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover"><a href="{{ route('mysalary')  }}">
                                <div class="box bg-primary text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                    <h5 class="m-b-0 m-t-5 text-white"></h5>
                                    <h6 class="text-white"  >Salary History</h6>
                                </div>
                            </a></div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover"><a href="{{ route('pdfnew')  }}">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                    <h5 class="m-b-0 m-t-5 text-white"></h5>
                                    <h6 class="text-white"  >PDF Security</h6>
                                </div>
                            </a></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Calendar</h4>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" style="background: #2e642e; color: white">
                                                            Full calendar
                                                        </div>
                                                        <div class="panel-body">
                                                            {!! $calendar->calendar() !!}
                                                            {!! $calendar->script() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body b-l calender-sidebar">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
            {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
            {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}

        </td>



        @include('admin.includes.footer')

    </div>

@endsection
