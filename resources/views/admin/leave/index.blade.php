@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
        @include('admin.includes.sidebar')
        <div class="">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Leave Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('leave')}}">Leave</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        @can('isEmployee')
                            <a class="btn btn-lg btn-dark" href="{{route('leave.create')}}">Apply leave</a>
                        @endcan
                        @can('isAdmin')
                            <a class="btn btn-lg btn-dark" href="{{route('leave.create')}}">Apply my own leave</a>
                        @endcan
                    </div>
                    @can('isAdmin')
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Leave(s) For Approval</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Employee name</th>
                                            <th>Leave type</th>
                                            <th>Date from</th>
                                            <th>Date to</th>
                                            <th>No. of days</th>
                                            <th>Reason</th>
                                            <th>Leave type offer</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leaves as $leave)
                                            <tr>
                                                <td>{{$loop -> index+1 }}</td>
                                                <td>{{$leave->users->last_name}},<br>{{$leave->users->first_name}}</td>
                                                <td>{{$leave->leave_type}}</td>
                                                <td>{{$leave->date_from}}</td>
                                                <td>{{$leave->date_to}}</td>
                                                <td>{{$leave->days}}</td>
                                                <td>{{$leave->reason}}</td>
                                                <td>
                                                    @if(Auth::user()->role=='admin')
                                                        {{--{{$leave->is_approved}}--}}
                                                        @if(Auth::user()->restr==2)
                                                            @if($leave->leave_type_offer==0)
                                                                @if($leave->leave_type_offer==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                @endif
                                                            @else
                                                                @if($leave->leave_type_offer==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if($leave->leave_type_offer==0)
                                                                <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-cyan" name="paid" value="1">Paid</button>
                                                                </form>
                                                                <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-danger" name="paid" value="2">Unpaid</button>
                                                                </form>
                                                            @elseif($leave->leave_type_offer==1)
                                                                @if($leave->leave_type_offer==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                @endif
                                                                <br>
                                                                <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-warning" onclick="return confirm('Are you sure want to unpaid for leave?')" type="submit" name="paid" value="2">Change to Unpaid</button>
                                                                </form>
                                                            @else
                                                                @if($leave->leave_type_offer==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                @endif

                                                                <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-warning" onclick="return confirm('Are you sure want to piad for leave?')" type="submit" name="paid" value="1">Change to Paid</button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                        {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                        {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                        {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                    @else
                                                        @if($leave->leave_type_offer==0)
                                                            <span class="badge badge-pill badge-warning">Pending</span>
                                                        @elseif($leave->leave_type_offer==1)
                                                            <span class="badge badge-pill badge-success">Paid</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">Unpaid</span>
                                                        @endif
                                                    @endif
                                                </td>

                                                <td>
                                                    @if(Auth::user()->role=='admin')
                                                        @if(Auth::user()->restr==2)
                                                            {{--{{$leave->is_approved}}--}}
                                                            @if($leave->is_approved==0)
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif
                                                            @elseif($leave->is_approved==1)
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif



                                                            @else
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif

                                                            @endif
                                                        @else
                                                            @if($leave->is_approved==0)
                                                                <form id="approve-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>
                                                                </form>
                                                                <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-gray" name="approve" value="2">Reject</button>
                                                                </form>
                                                            @elseif($leave->is_approved==1)
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif

                                                                <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-dark" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Change to Reject</button>
                                                                </form>
                                                            @else
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif
                                                                <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-dark" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Change to Approve</button>
                                                                </form>
                                                            @endif

                                                        @endif

                                                        {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                        {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                        {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                    @else
                                                        @if($leave->is_approved==0)
                                                            <span class="badge badge-pill badge-warning">Pending</span>
                                                        @elseif($leave->is_approved==1)
                                                            <span class="badge badge-pill badge-success">Approved</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">Rejected</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $leaves->links() }}
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Leave Over-all List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Employee name</th>
                                            <th>Leave type</th>
                                            <th>Date from</th>
                                            <th>Date to</th>
                                            <th>No. of days</th>
                                            <th>Reason</th>
                                            <th>Leave type offer</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leaves2 as $leave)
                                            <tr>
                                                <td>{{$loop -> index+1 }}</td>
                                                <td>{{$leave->users->last_name}},<br>{{$leave->users->first_name}}</td>
                                                <td>{{$leave->leave_type}}</td>
                                                <td>{{$leave->date_from}}</td>
                                                <td>{{$leave->date_to}}</td>
                                                <td>{{$leave->days}}</td>
                                                <td>{{$leave->reason}}</td>
                                                <td>
                                                    @if(Auth::user()->role=='admin')
                                                        {{--{{$leave->is_approved}}--}}
                                                        @if(Auth::user()->restr==2)
                                                            @if($leave->leave_type_offer==0)
                                                                @if($leave->leave_type_offer==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                @endif
                                                            @else
                                                                @if($leave->leave_type_offer==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if($leave->leave_type_offer==0)
                                                                <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-cyan" name="paid" value="1">Paid</button>
                                                                </form>
                                                                <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-danger" name="paid" value="2">Unpaid</button>
                                                                </form>
                                                            @elseif($leave->leave_type_offer==1)
                                                                @if($leave->leave_type_offer==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                @endif
                                                                <br>
                                                                <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-warning" onclick="return confirm('Are you sure want to unpaid for leave?')" type="submit" name="paid" value="2">Change to Unpaid</button>
                                                                </form>
                                                            @else
                                                                @if($leave->leave_type_offer==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                @endif

                                                                <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-warning" onclick="return confirm('Are you sure want to piad for leave?')" type="submit" name="paid" value="1">Change to Paid</button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                        {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                        {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                        {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                    @else
                                                        @if($leave->leave_type_offer==0)
                                                            <span class="badge badge-pill badge-warning">Pending</span>
                                                        @elseif($leave->leave_type_offer==1)
                                                            <span class="badge badge-pill badge-success">Paid</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">Unpaid</span>
                                                        @endif
                                                    @endif
                                                </td>

                                                <td>
                                                    @if(Auth::user()->role=='admin')
                                                        @if(Auth::user()->restr==2)
                                                            {{--{{$leave->is_approved}}--}}
                                                            @if($leave->is_approved==0)
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif
                                                            @elseif($leave->is_approved==1)
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif



                                                            @else
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif

                                                            @endif
                                                        @else
                                                            @if($leave->is_approved==0)
                                                                <form id="approve-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>
                                                                </form>
                                                                <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-gray" name="approve" value="2">Reject</button>
                                                                </form>
                                                            @elseif($leave->is_approved==1)
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif

                                                                <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-dark" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Change to Reject</button>
                                                                </form>
                                                            @else
                                                                @if($leave->is_approved==0)
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                @endif
                                                                <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-dark" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Change to Approve</button>
                                                                </form>
                                                            @endif

                                                        @endif

                                                        {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                        {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                        {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                    @else
                                                        @if($leave->is_approved==0)
                                                            <span class="badge badge-pill badge-warning">Pending</span>
                                                        @elseif($leave->is_approved==1)
                                                            <span class="badge badge-pill badge-success">Approved</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger">Rejected</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $leaves2->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('isEmployee')
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Leave(s) </h5>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Employee name</th>
                                                <th>Leave type</th>
                                                <th>Date from</th>
                                                <th>Date to</th>
                                                <th>No. of days</th>
                                                <th>Reason</th>
                                                <th>Leave type offer</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($leaves as $leave)
                                                <tr>
                                                    <td>{{$loop -> index+1 }}</td>
                                                    <td>{{$leave->users->last_name}},<br>{{$leave->users->first_name}}</td>
                                                    <td>{{$leave->leave_type}}</td>
                                                    <td>{{$leave->date_from}}</td>
                                                    <td>{{$leave->date_to}}</td>
                                                    <td>{{$leave->days}}</td>
                                                    <td>{{$leave->reason}}</td>
                                                    <td>
                                                        @if(Auth::user()->role=='admin')
                                                            {{--{{$leave->is_approved}}--}}
                                                            @if(Auth::user()->restr==2)
                                                                @if($leave->leave_type_offer==0)
                                                                    @if($leave->leave_type_offer==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->leave_type_offer==1)
                                                                        <span class="badge badge-pill badge-success">Paid</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                    @endif
                                                                @else
                                                                    @if($leave->leave_type_offer==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->leave_type_offer==1)
                                                                        <span class="badge badge-pill badge-success">Paid</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if($leave->leave_type_offer==0)
                                                                    <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                        @csrf
                                                                        {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                        <button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-cyan" name="paid" value="1">Paid</button>
                                                                    </form>
                                                                    <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                        @csrf
                                                                        {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                        <button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-danger" name="paid" value="2">Unpaid</button>
                                                                    </form>
                                                                @elseif($leave->leave_type_offer==1)
                                                                    @if($leave->leave_type_offer==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->leave_type_offer==1)
                                                                        <span class="badge badge-pill badge-success">Paid</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                    @endif
                                                                    <br>
                                                                    <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-sm btn-warning" onclick="return confirm('Are you sure want to unpaid for leave?')" type="submit" name="paid" value="2">Change to Unpaid</button>
                                                                    </form>
                                                                @else
                                                                    @if($leave->leave_type_offer==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->leave_type_offer==1)
                                                                        <span class="badge badge-pill badge-success">Paid</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Unpaid</span>
                                                                    @endif

                                                                    <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-sm btn-warning" onclick="return confirm('Are you sure want to piad for leave?')" type="submit" name="paid" value="1">Change to Paid</button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                            {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                            {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                            {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                        @else
                                                            @if($leave->leave_type_offer==0)
                                                                <span class="badge badge-pill badge-warning">Pending</span>
                                                            @elseif($leave->leave_type_offer==1)
                                                                <span class="badge badge-pill badge-success">Paid</span>
                                                            @else
                                                                <span class="badge badge-pill badge-danger">Unpaid</span>
                                                            @endif
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if(Auth::user()->role=='admin')
                                                            @if(Auth::user()->restr==2)
                                                                {{--{{$leave->is_approved}}--}}
                                                                @if($leave->is_approved==0)
                                                                    @if($leave->is_approved==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->is_approved==1)
                                                                        <span class="badge badge-pill badge-success">Approved</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                                                    @endif
                                                                @elseif($leave->is_approved==1)
                                                                    @if($leave->is_approved==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->is_approved==1)
                                                                        <span class="badge badge-pill badge-success">Approved</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                                                    @endif



                                                                @else
                                                                    @if($leave->is_approved==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->is_approved==1)
                                                                        <span class="badge badge-pill badge-success">Approved</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                                                    @endif

                                                                @endif
                                                            @else
                                                                @if($leave->is_approved==0)
                                                                    <form id="approve-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                        @csrf
                                                                        {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                        <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>
                                                                    </form>
                                                                    <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                        @csrf
                                                                        {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                        <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-gray" name="approve" value="2">Reject</button>
                                                                    </form>
                                                                @elseif($leave->is_approved==1)
                                                                    @if($leave->is_approved==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->is_approved==1)
                                                                        <span class="badge badge-pill badge-success">Approved</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                                                    @endif

                                                                    <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-sm btn-dark" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Change to Reject</button>
                                                                    </form>
                                                                @else
                                                                    @if($leave->is_approved==0)
                                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                                    @elseif($leave->is_approved==1)
                                                                        <span class="badge badge-pill badge-success">Approved</span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                                                    @endif
                                                                    <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-sm btn-dark" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Change to Approve</button>
                                                                    </form>
                                                                @endif

                                                            @endif

                                                            {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                            {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                            {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                        @else
                                                            @if($leave->is_approved==0)
                                                                <span class="badge badge-pill badge-warning">Pending</span>
                                                            @elseif($leave->is_approved==1)
                                                                <span class="badge badge-pill badge-success">Approved</span>
                                                            @else
                                                                <span class="badge badge-pill badge-danger">Rejected</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                        {{ $leaves->links() }}
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endcan


                </div>
            </div>
           {{--sweetalert box for deleting start--}}
            {{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>--}}

            {{--<script type="text/javascript">--}}
            {{--function rejectLeave(id)--}}

            {{--{--}}
            {{--const swalWithBootstrapButtons = swal.mixin({--}}
            {{--confirmButtonClass: 'btn btn-success',--}}
            {{--cancelButtonClass: 'btn btn-danger',--}}
            {{--buttonsStyling: false,--}}
            {{--})--}}

            {{--swalWithBootstrapButtons({--}}
            {{--title: 'Are you sure?',--}}
            {{--text: "You won't be able to do again this!",--}}
            {{--type: 'warning',--}}
            {{--showCancelButton: true,--}}
            {{--confirmButtonText: 'Yes, reject it!',--}}
            {{--cancelButtonText: 'No, cancel!',--}}
            {{--reverseButtons: true--}}
            {{--}).then((result) => {--}}
            {{--if (result.value) {--}}
            {{--event.preventDefault();--}}
            {{--document.getElementById('reject-leave-'+id).submit();--}}
            {{--} else if (--}}
            {{--// Read more about handling dismissals--}}
            {{--result.dismiss === swal.DismissReason.cancel--}}
            {{--) {--}}
            {{--swalWithBootstrapButtons(--}}
            {{--'Cancelled',--}}
            {{--'You have not cancel yet ! Your are safe :)',--}}
            {{--'error'--}}
            {{--)--}}
            {{--}--}}
            {{--})--}}
            {{--}--}}

            {{--</script>--}}
            {{--<script type="text/javascript">--}}
            {{--function approveLeave(id)--}}

            {{--{--}}
            {{--const swalWithBootstrapButtons = swal.mixin({--}}
            {{--confirmButtonClass: 'btn btn-success',--}}
            {{--cancelButtonClass: 'btn btn-danger',--}}
            {{--buttonsStyling: false,--}}
            {{--})--}}

            {{--swalWithBootstrapButtons({--}}
            {{--title: 'Are you sure?',--}}
            {{--text: "You want to approve leave!",--}}
            {{--type: 'warning',--}}
            {{--showCancelButton: true,--}}
            {{--confirmButtonText: 'Yes, approve leave!',--}}
            {{--cancelButtonText: 'No, cancel!',--}}
            {{--reverseButtons: true--}}
            {{--}).then((result) => {--}}
            {{--if (result.value) {--}}
            {{--event.preventDefault();--}}
            {{--document.getElementById('approve-leave-'+id).submit();--}}
            {{--} else if (--}}
            {{--// Read more about handling dismissals--}}
            {{--result.dismiss === swal.DismissReason.cancel--}}
            {{--) {--}}
            {{--swalWithBootstrapButtons(--}}
            {{--'Cancelled',--}}
            {{--'You are safe.You can approve later :)',--}}
            {{--'error'--}}
            {{--)--}}
            {{--}--}}
            {{--})--}}
            {{--}--}}

            {{--</script>--}}
            {{--sweetalert box for deleting end--}}
            @include('admin.includes.footer')
        </div>
    </div>

@endsection
