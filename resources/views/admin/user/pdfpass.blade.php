@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

    <div class="">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Set PDF Password</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user')}}">User</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <form action="{{route('pdfpass.store',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{--@method('PUT')--}}

                            <div class="card-body">
                                <h4 class="card-title">Details</h4>




                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="pdfpass" class="form-control" id="salary" onkeyup="calc()" value="{{$user->pdfpass}}" >


                                    </div>
                                </div>
                                <p> Note: Changing/updating this New Password for PDF will not change the ecnrypted password to all previous download reports.</p>




                                <!-- <div class="form-group row">
                                    <label for="age" class="col-sm-3 text-right control-label col-form-label">Connectivity:</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1" checked>Slack account <br>
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1" >Trello account <br>
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1" >Ipage account <br>
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1" >Others
                                    </div>
                                </div> -->

                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    function calc(){
                        var f,g,h,i,j,k,l,m,n,o,q,r,s,t,u;
                        f=Number(document.getElementById("salary").value);
                        g=Number(document.getElementById("salary2").value);

                        l= (f )/g;
                        document.getElementById("semisalary").value= l.toFixed(2);
                        h= f/24/8;
                        document.getElementById("rate").value= h.toFixed(2);
                        k= h/60;
                        document.getElementById("pmin").value= k.toFixed(2);

                        r= l;
                        document.getElementById("a").innerHTML = r.toFixed(2);
                        s= h;
                        document.getElementById("e").innerHTML = s.toFixed(2);
                        t= k;
                        document.getElementById("c").innerHTML = t.toFixed(2);


                    }
                </script>
            </div>
        </div>
            @include('admin.includes.footer')
    </div>

@endsection
