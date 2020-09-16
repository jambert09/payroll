@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

    @include('admin.includes.sidebar')
        <div class="">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center btn-block btn-lg btn-dark">
                        <a class="btn-lg btn-lg btn-warning" href="#"data-position="center">Salary Date</a>



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
                    <div class="col-md-2">

                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lists of Salary Dates</h5>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered salarylist">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Date of Salary</th>



                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($show as $salarysched)
                                            <tr>
                                                <td>{{$loop -> index+1 }}-{{$salarysched->id }}</td>
                                                <td>{{$salarysched -> salary_date }}</td>

                                                <td>
                                                        {{--<a href="" class="btn btn-sm btn-dark">Edit</a>--}}
                                                <a href="{{route('viewpay',$salarysched->id)}}" class="btn btn-sm btn-primary">View Salary</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach

                                    </table>
                                    {{--{{ $sallists->links() }}--}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#zero_config').DataTable( {
                            dom: 'Bfrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        } );
                    } );
                </script>

            </div>

            @include('admin.includes.footer')

        </div>
    </div>

@endsection
