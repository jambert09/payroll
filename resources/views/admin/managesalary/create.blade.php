@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

    @include('admin.includes.sidebar')

        <div class="">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Salary Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('managesalary')}}">Manage Salary</a></li>
                                </ol>
                            </nav>
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
                    <div class="col-md-10">
                        <div class="card">
                            <form action="{{route('managesalary.salarystore')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf


                                <div class="card-body">
                                    <h4 class="card-title">Salary Date</h4>


                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 text-right control-label col-form-label">Date From:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="date_from" class="form-control {{ $errors->has('date_from') ? 'is-invalid' : '' }}" id="date_from" onblur="calc()" value="{{ old('date_from') }}" placeholder="January 1 - 15, 2019">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="job type" class="col-sm-3 text-right control-label col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="pay_id" class="form-control " id="job_type" value="{{$user->id}}{{$salary->id}}" >
                                        </div>
                                    </div>


                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.includes.footer')

        </div>
    </div>
    <script>
        function calc(){
            var f,g,h,i,j,k,l,m,n,o,q,r,s,t,u;
            f=Number(document.getElementById("date_from").value);
            g=Number(document.getElementById("date_to").value);

            var str = f;
            var res = str.valueOf();
            document.getElementById("demo").innerHTML = res;


        }
    </script>
@endsection
