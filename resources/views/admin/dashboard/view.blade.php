@extends('admin.layout.master')

@section('content')

    <div class="">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center btn-block btn-lg btn-dark">
                    <a class="btn-lg btn-lg btn-warning" href="#"data-position="center">Summary </a>



                </div>
            </div>
        </div>
        <td>
            @if(Auth::user()->role=='admin')
                {{--{{$leave->is_approved}}--}}

                <div class="card-body">

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="" class="form-control" value="{{ $users->username }} " disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">For the Period</label>
                        <div class="col-sm-9">
                            <input type="text" name="" class="form-control" value="{{ $users->date_cover }}" disabled>
                        </div>
                    </div>

                </div>
                <a href="{{ url('pdf/pdfexport/' . $users->id) }}" class="btn btn-lg btn-success">Download in PDF</a>
                <a href="{{ route('pdfnew') }}" class="btn btn-lg float-right btn-primary">Set PDF Password</a>

                <div class="container-fluid">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th> </th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th>Basic Rate</th>
                                <td>{{ $users->newsemi }} </td>
                                <th>Tardiness</th>
                                <td>{{ $users->totde }} </td>
                            </tr>
                            <tr>
                                <th>Overtime (Reg)</th>
                                <td>{{ $users->regph }} </td>
                                <th>Undertime</th>
                                <td>{{ $users->untot }} </td>
                            </tr>
                            <tr>
                                <th>Night Diff</th>
                                <td>{{ $users->ndph }} </td>
                                <th>SSS</th>
                                <td>{{ $users->sssdeduc }} </td>
                            </tr>
                            <tr>
                                <th>Restday OT</th>
                                <td>{{ $users->resttot }} </td>
                                <th>Philhealth</th>
                                <td>{{ $users->phicdeduc }} </td>
                            </tr>
                            <tr>
                                <th>Legal Holiday</th>
                                <td>{{ $users->rhtot }} </td>
                                <th>Pag-ibig</th>
                                <td>{{ $users->hdmfdeduc }} </td>
                            </tr>
                            <tr>
                                <th>Special Holiday</th>
                                <td>{{ $users->shtot }} </td>
                                <th>W-Tax</th>
                                <td>{{ $users->birc }} </td>
                            </tr>
                            <tr>
                                <th>OT Meal</th>
                                <td>{{ $users->mealph }} </td>
                                <th></th>
                                <td>{{ $users->tot2 }} </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th> {{ $users->paytot }} </th>
                                <th></th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td></td>
                                <th></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Other Income</th>
                                <td>{{ $users->etc2 }} </td>
                                <th>Other Deductions</th>
                                <td>{{ $users->etcdeduc }} </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><strong><font color="blue"> {{ $users->etc3}} </font> </strong> </td>
                                <th></th>
                                <td><strong><font color="red"> {{ $users->tot4 }} </font> </strong>  </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td> </td>
                                <th>NET PAY</th>
                                <td><strong><font color="green"> {{ $users->net }} </font> </strong> </td>
                            </tr>


                            </tbody>
                        </table>

                    </div>



                </div>
                @else
                @if($users->user_id==$authu->id)
                <div class="card-body">
<!--
                <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">One Oasis Premier Holdings Corp</label>
                </div>
-->
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                                <input type="text" name="" class="form-control" value="{{ $users->username }} " disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">For the Period</label>
                        <div class="col-sm-9">
                            <input type="text" name="" class="form-control" value="{{ $users->salary_date }}" disabled>
                        </div>
                    </div>

                </div>
                <a href="{{ url('pdf/pdfexport/' . $users->id) }}" class="btn btn-lg btn-success">Download in PDF</a>
          <a href="{{ route('pdfnew') }}" class="btn btn-lg float-right btn-primary">Set PDF Password</a>

                    <div class="container-fluid">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th> </th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th>Basic Rate</th>
                                <td>{{ $users->newsemi }} </td>
                                <th>Tardiness</th>
                                <td>{{ $users->totde }} </td>
                            </tr>
                            <tr>
                                <th>Overtime (Reg)</th>
                                <td>{{ $users->regph }} </td>
                                <th>Undertime</th>
                                <td>{{ $users->untot }} </td>
                            </tr>
                            <tr>
                                <th>Night Diff</th>
                                <td>{{ $users->ndph }} </td>
                                <th>SSS</th>
                                <td>{{ $users->sssdeduc }} </td>
                            </tr>
                            <tr>
                                <th>Restday OT</th>
                                <td>{{ $users->resttot }} </td>
                                <th>Philhealth</th>
                                <td>{{ $users->phicdeduc }} </td>
                            </tr>
                            <tr>
                                <th>Legal Holiday</th>
                                <td>{{ $users->rhtot }} </td>
                                <th>Pag-ibig</th>
                                <td>{{ $users->hdmfdeduc }} </td>
                            </tr>
                            <tr>
                                <th>Special Holiday</th>
                                <td>{{ $users->shtot }} </td>
                                <th>W-Tax</th>
                                <td>{{ $users->birc }} </td>
                                </tr>
                            <tr>
                                <th>OT Meal</th>
                                <td>{{ $users->mealph }} </td>
                                <th>Total Deduction</th>
                                <td>{{ $users->tot2 }} </td>
                            </tr>
                            <tr>
                                <th>Gross Pay</th>
                                <th> {{ $users->paytot }} </th>
                                <th></th>
                                <td> </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td></td>
                                <th></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Other Income</th>
                                <td>{{ $users->etc2 }} </td>
                                <th>Other Deductions</th>
                                <td>{{ $users->etcdeduc }} </td>
                            </tr>
                            <tr>
                                <th>Gross Pay</th>
                                <td><strong><font color="blue">{{ $users->etc3}} </font> </strong> </td>
                                <th>Total Deductions</th>
                                <td><strong><font color="red"> {{ $users->tot4 }} </font> </strong>  </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td> </td>
                                <th>NET PAY</th>
                                <td><strong><font color="green"> {{ $users->net }} </font> </strong> </td>
                            </tr>


                            </tbody>
                        </table>

                    </div>



                </div>
                    @else
                    1

                    @endif

                @endif

                {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}

        </td>



        @include('admin.includes.footer')

    </div>

@endsection

@section('js')

    <script src="{{asset('admin-panel/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/chart/chart-page-init.js')}}"></script>

    <script src="{{asset('admin-panel/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/calendar/cal-init.js')}}"></script>

    @endsection
