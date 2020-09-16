@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

    @include('admin.includes.sidebar')
        <div class="">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center btn-block btn-lg btn-dark">
                        <a class="btn-sm btn-lg btn-warning" href="{{route('managesalary.salarylist2')}}"data-position="center">Salary Date</a>
                        <a class="btn-sm btn-outline-info btn-warning" href="{{route('managesalary2')}}"data-position="center">Payroll Manager</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center btn-block btn-lg btn-dark">
                        <a class="btn-lg btn-lg btn-success" href="#"data-position="center">As of {{$payment->salary_date}}</a>
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
                <div class="card">
                <div class="alert-danger">

                    <h6 class="card-title m-b-0">Note:</h6>
                    <p> 1. Edit/Update any <strong>OTU</strong> of an Employee, mandatory to Edit/update also the her/his <strong>Payroll</strong>.<br>
                        2. If you only need to Edit/Update the Employee's <strong>Payroll</strong>, <strong>no need to update his/her OTU</strong>.<br>
                    </p>
                    </div>
                </div>


                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                          <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Employee Name</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>    <h5 class="card-title m-b-0">Count of Employees in this section: {{$payment4->count()}}</h5>




                                        @foreach($payment4 as $user)
                                            <tr>
                                                <th>{{$loop->index+1}}</th>
                                                <td>{{$user->username}}</td>

                                                <td>
                                                    <a href="{{route('salary.edit.otu',$user->id)}}" class="btn btn-sm btn-warning">Edit OTU</a>
                                                    <a href="{{route('salary.editpay3',$user->id)}}" class="btn btn-sm btn-primary">Edit Payroll</a>

                                                </td>


                                            </tr>

                                        @endforeach



                                    </tbody>
                                </table>
                              <a href="{{ route('pdfviewall1',$payment->id) }}" class="btn btn-lg btn-purple">View Summary</a>

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
