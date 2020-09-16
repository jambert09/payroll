@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

    @include('admin.includes.sidebar')
        <div class="">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center btn-block btn-lg btn-dark">
                        <a class="btn-sm btn-warning" href="{{route('view.list',$users1->id)}}"data-position="center">Back </a>
                        <a class="btn-lg btn-success" href="{{route('view.list',$users1->id)}}"data-position="center">Summary for {{$users1->salary_date}} </a>

                    </div>
                </div>
            </div>
            </div>



            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


            <div class="container-fluid">


                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                          <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th> <strong></strong> </th>
                                        <th>Employee Name</th>
                                        <th>Monthly Salary</th>
                                        <th>Semi-Monthly Salary</th>
                                        <td>Liquidation</td>
                                        <td>Tardiness</td>
                                        <td>Undertime</td>
                                        <td>Overtime</td>
                                        <td>OT Meal</td>
                                        <td>Others</td>
                                        <td>Salaries and Wages</td>
                                        <td>Monthly Professional Fee</td>
                                        <td>SSS-Employee</td>
                                        <td>PHIC-Employee</td>
                                        <td>HDMF</td>
                                        <td>1601-C</td>
                                        <td>1601-E</td>
                                        <td>Sub-Total-1</td>
                                        <td>Other Deductions(Advances)</td>
                                        <td>Take Home Salary</td>
                                        <td>SSS-Employer</td>
                                        <td>EC-Employer</td>
                                        <td>PHIC-Employer</td>
                                        <td>HDMF-Employer</td>
                                        <td>Sub-Total-2</td>
                                        <td>Total Employee Cost</td><br>
                                    </tr>
                                    </thead>
                                    <tbody>




                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $loop->index+1 }} </td>
                                                <td>{{ $user->username }} </td>
                                                <td>{{ $user->salary }} </td>
                                                <td>{{ $user->newsemi }} </td>
                                                <td>{{ $user->liquidation }} </td>
                                                <td>{{ $user->totde }} </td>
                                                <td>{{ $user->untot }} </td>
                                                <td>{{ $user->ovat }} </td>
                                                <td>{{ $user->mealph }} </td>
                                                <td>{{ $user->etc1 }} </td>
                                                <td>{{ $user->salarywages }} </td>
                                                <td>{{ $user->mpf }} </td>
                                                <td>{{ $user->sssdeduc }} </td>
                                                <td>{{ $user->phicdeduc }} </td>
                                                <td>{{ $user->hdmfdeduc }} </td>
                                                <td>{{ $user->birc }} </td>
                                                <td>{{ $user->bire }} </td>
                                                <td>{{ $user->totaldeduc }} </td>
                                                <td>{{ $user->etcdeduc }} </td>
                                                <td>{{ $user->ths }} </td>
                                                <td>{{ $user->sssemp }} </td>
                                                <td>{{ $user->ecemp }} </td>
                                                <td>{{ $user->phicemp }} </td>
                                                <td>{{ $user->hdmfemp }} </td>
                                                <td>{{ $user->totalemp }} </td>
                                                <td><font color="blue"> {{ $user->totalempcost }}</font> </td>

                                            </tr>

                                        @endforeach
                                        <tr>
                                            <td>Total</td>
                                            <td></td>

                                            <td>{{ $users->sum('salary')}} </td>
                                            <td>{{ $users->sum('newsemi') }} </td>
                                            <td>{{ $users->sum('liquidation') }} </td>
                                            <td>{{ $users->sum('totde') }} </td>
                                            <td>{{ $users->sum('untot') }} </td>
                                            <td>{{ $users->sum('ovat') }} </td>
                                            <td>{{ $users->sum('mealph') }} </td>
                                            <td>{{ $users->sum('etc1') }} </td>
                                            <td>{{ $users->sum('salarywages') }} </td>
                                            <td>{{ $users->sum('mpf') }} </td>
                                            <td>{{ $users->sum('sssdeduc') }} </td>
                                            <td>{{ $users->sum('phicdeduc') }} </td>
                                            <td>{{ $users->sum('hdmfdeduc') }} </td>
                                            <td>{{ $users->sum('birc') }} </td>
                                            <td>{{ $users->sum('bire') }} </td>
                                            <td>{{ $users->sum('totaldeduc')}} </td>
                                            <td>{{ $users->sum('etcdeduc')}} </td>
                                            <td>{{ $users->sum('ths') }} </td>
                                            <td>{{ $users->sum('sssemp') }} </td>
                                            <td>{{ $users->sum('ecemp') }} </td>
                                            <td>{{ $users->sum('phicemp') }} </td>
                                            <td>{{ $users->sum('hdmfemp') }} </td>
                                            <td>{{ $users->sum('totalemp')}} </td>
                                            <td><font color="blue">{{ $users->sum('totalempcost') }} </font></td>


                                        </tr>



                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
              <script>
                    $('.view-data').click(function(){
                        var username=$(this).attr('username');
                        var role=$(this).attr('role');
                        var email=$(this).attr('email');
                        var salary=$(this).attr('salary');
                        var phone=$(this).attr('phone');
                        var address=$(this).attr('address');
                        var gender=$(this).attr('gender');
                        var dob=$(this).attr('dob');
                        var join_date=$(this).attr('join_date');
                        var job_type=$(this).attr('job_type');
                        var city=$(this).attr('city');
                        var age=$(this).attr('age');
                        $('#username').text(username);
                        $('#role').text(role);
                        $('#email').text(email);
                        $('#salary').text(salary);
                        $('#phone').text(phone);
                        $('#address').text(address);
                        $('#gender').text(gender);
                        $('#dob').text(dob);
                        $('#join_date').text(join_date);
                        $('#job_type').text(job_type);
                        $('#city').text(city);
                        $('#age').text(age);
                        $('#show-data').modal();
                    })
                </script>

                {{--sweetalert box for deleting start--}}
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

                <script type="text/javascript">
                    function deletePost(id)

                    {
                        const swalWithBootstrapButtons = swal.mixin({
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger',
                            buttonsStyling: false,
                        })

                        swalWithBootstrapButtons({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {
                                event.preventDefault();
                                document.getElementById('delete-form-'+id).submit();
                            } else if (
                                // Read more about handling dismissals
                                result.dismiss === swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons(
                                    'Cancelled',
                                    'Your file is safe :)',
                                    'error'
                                )
                            }
                        })
                    }

                </script>
                {{--sweetalert box for deleting end--}}

                <div id="show-data" class="modal fade" id="view-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="username"></p>
                                <p id="role"></p>
                                <p id="email"></p>
                                <p id="salary"></p>
                                <p id="phone"></p>
                                <p id="address"></p>
                                <p id="gender"></p>
                                <p id="dob"></p>
                                <p id="join_date"></p>
                                <p id="job_type"></p>
                                <p id="city"></p>
                                <p id="age"></p>
                                <p id="phone"></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{--@section('js')--}}
                {{--@endsection--}}


            </div>

            @include('admin.includes.footer')

        </div>
    </div>

@endsection
