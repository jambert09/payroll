@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')
    @include('admin.includes.computescripts')

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
                <div class="col-12 d-flex no-block align-items-center btn-block btn-lg btn-dark">
                    <a class="btn-sm btn-outline-warning btn-warning" href="{{route('managesalary.salarylist2')}}"data-position="center">Salary Date</a>
                    <a class="btn-sm btn-lg btn-info" href="{{route('managesalary2')}}"data-position="center">Payroll Manager</a>


                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center btn-block btn-lg btn-dark">
                    <a class="btn-lg btn-warning" href="#"data-position="center">Create OTU</a>
                    <a class="btn-lg btn-lg btn-success" href="#"data-position="center">{{$user->last_name}}, {{$user->first_name}}</a>
                </div>
            </div>
        </div>
            <div id="app" class="container-fluid">
                <div class="row" v-for="(item, i) in items">
                    <div class="col-md-10">
                        <div class="card">
                            <form action="{{route('user.updateotu',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                {{--@method('PUT')--}}






                                <div class="card-body">
                                    <h4 class="card-title">Create OTU</h4>
                                    <div class="form-group row">
                                        <label for="job type" class="col-sm-3 text-right control-label col-form-label">Employee</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="job_type" value="{{$user->last_name}}, {{$user->first_name}}" disabled>
                                            <input type="text" name="username" class="form-control" id="job_type" value="{{$user->last_name}}, {{$user->first_name}}" hidden>
                                        </div>
                                    </div>

                                    <input type="text" name="emp_id" class="col-sm-3 form-control" id="emp_id" value="{{$user->id}}" hidden>
                                    <div class="form-group row">
                                        <label for="job type" class="col-sm-3 text-right control-label col-form-label">Department</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="job_type" value="{{$user->department}}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="job type" class="col-sm-3 text-right control-label col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control " id="job_type" value="{{$user->designation}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="job type" class="col-sm-3 text-right control-label col-form-label"><font color="blue">For the Period</font></label>
                                        <div class="col-sm-9">


                                            <input type="text" name="" class="form-control " id="job_type" value="{{$salarysched1->salary_date}}" disabled>

                                            <input type="text" name="salary_id" class="form-control " id="job_type" value="{{$salarysched1->id}}" hidden>
                                            <input type="text" name="otu_cover" class="form-control " id="job_type" value="{{$salarysched1->salary_date}}" hidden>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-9">
                                            <input type="text" name="pay_id" class="form-control " id="job_type" value="{{$salarysched1->id}}{{$user->id}}{{$user->last_name}}{{$user->first_name}}" hidden>
                                            <input type="text" name="salary" class="form-control " id="job_type" value="{{$user->salary}}" hidden>

                                        </div>
                                    </div>



                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>



                                    <h4 class="page-title"> <font color="red">Overtime Calculation</font></h4><input type="text" name="rate" class=" col-sm-3 form-control calc" id="rate" onkeyup="compute()"  value="{{$user->rate}}" placeholder="# of hrs" hidden>

                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>OT Type</th>
                                                <th>No.of Hours</th>
                                                <th>Amount</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <th>1 </th>
                                                <td>Regular Day OT(125%)</td>
                                                <td>  <input type="text" name="reghr" step="any" class=" col-sm-3 form-control calc" id="a1" onkeyup="compute()"  value="{{$user->reghr}}" placeholder="# of hrs" >
                                                    <input type="text" name="regph" step="any" class=" col-sm-3 form-control calc" id="a2" onkeyup="compute()"  value="{{$user->regph}}" placeholder="Amount" hidden></td>
                                                <td> Php <font color="blue"><span id="a3">{{$user->regph}} </span></font></td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>Night Diff (110%)</td>
                                                <td> <input type="text" name="ndhr" step="any" class=" col-sm-3 form-control calc" id="b1" onkeyup="compute()"  value="{{$user->ndhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="ndph" step="any" class=" col-sm-3 form-control calc" id="b2" onkeyup="compute()"  value="{{$user->ndph}}" placeholder="Amount" hidden></td>
                                                <td>Php <font color="blue"><span id="b3">{{$user->ndph}} </td>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td>Rest day OT w/in 8 Hrs (130%)</td>
                                                <td>  <input type="text" name="resthr" step="any" class=" col-sm-3 form-control calc" id="c1" onkeyup="compute()"  value="{{$user->resthr}}" placeholder="# of hrs" >
                                                    <input type="text" name="restph" step="any" class=" col-sm-3 form-control calc" id="c2" onkeyup="compute()"  value="{{$user->restph}}" placeholder="Amount" hidden></td>
                                                <td>Php <font color="blue"><span id="c3">{{$user->restph}} </td>
                                            </tr>
                                            <tr>
                                                <th>4</th>
                                                <td>Rest day OT in Excess of 8 Hrs (130%)</td>
                                                <td> <input type="text" name="restexhr"step="any"  class=" col-sm-3 form-control calc" id="d1" onkeyup="compute()"  value="{{$user->restexhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="restexph" step="any" class=" col-sm-3 form-control calc" id="d2" onkeyup="compute()"  value="{{$user->restexph}}" placeholder="Amount" hidden>
                                                <input type="text" name="resttot" step="any" class=" col-sm-3 form-control calc" id="d4" onkeyup="compute()"  value="{{$user->resttot}}" placeholder="Amount" hidden ></td>
                                                <td>Php <font color="blue"><span id="d3">{{$user->restexph}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>



                                    <h4 class="page-title"> <font color="blue"> Regular Holiday</font></h4>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>OT Type</th>
                                                <th>No.of Hours</th>
                                                <th>Amount</th>

                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr>
                                                <th>5</th>
                                                <td>NON Rest day OT w/in 8hrs(100%)</td>
                                                <td> <input type="text" name="rhnhr" step="any" class=" col-sm-3 form-control calc" id="e1" onkeyup="compute()"  value="{{$user->rhnhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="rhnph"step="any"  class=" col-sm-3 form-control calc" id="e2" onkeyup="compute()"  value="{{$user->rhnph}}" placeholder="Amount" hidden></td>
                                                <td>Php <font color="blue"><span id="e3">{{$user->rhnph}} </td>
                                            </tr>
                                            <tr>
                                                <th>6</th>
                                                <td>NON Rest day OT w/in Excess of 8hrs(160%)</td>
                                                <td>  <input type="text" name="rhnexhr" step="any" class=" col-sm-3 form-control calc" id="f1" onkeyup="compute()"  value="{{$user->rhnexhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="rhnexph" step="any" class=" col-sm-3 form-control calc" id="f2" onkeyup="compute()"  value="{{$user->rhnexph}}" placeholder="Amount" hidden ></td>
                                                <td>Php <font color="blue"><span id="f3">{{$user->rhnexph}} </td>
                                            </tr>
                                            <tr>
                                                <th>7</th>
                                                <td>Rest day OT w/in 8hrs(160%)</td>
                                                <td> <input type="text" name="rhhr" step="any" class=" col-sm-3 form-control calc" id="g1" onkeyup="compute()"  value="{{$user->rhhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="rhph" step="any" class=" col-sm-3 form-control calc" id="g2" onkeyup="compute()"  value="{{$user->rhph}}" placeholder="Amount" hidden></td>
                                                <td>Php <font color="blue"><span id="g3">{{$user->rhph}} </td>
                                            </tr>
                                            <tr>
                                                <th>8</th>
                                                <td>Rest day OT w/in Excess of 8hrs(238%)</td>
                                                <td>  <input type="text" name="rhexhr" step="any" class=" col-sm-3 form-control calc" id="h1" onkeyup="compute()"  value="{{$user->rhexhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="rhexph" step="any" class=" col-sm-3 form-control calc" id="h2" onkeyup="compute()"  value="{{$user->rhexph}}" placeholder="Amount" hidden>
                                                    <input type="text" name="rhtot" step="any" class=" col-sm-3 form-control calc" id="h4" onkeyup="compute()"  value="{{$user->rhtot}}" placeholder="Amount" hidden></td>
                                                <td>Php <font color="blue"><span id="h3">{{$user->rhexph}} </td>
                                            </tr>




                                            </tbody>
                                        </table>

                                    </div>


                                    <h4 class="page-title"> <font color="blue"> Special Holiday</font></h4>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>OT Type</th>
                                                <th>No.of Hours</th>
                                                <th>Amount</th>

                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr>
                                                <th>9</th>
                                                <td>NON Rest day OT w/in 8hrs(30%)</td>
                                                <td> <input type="text" name="shnhr" step="any" class=" col-sm-3 form-control calc" id="j1" onkeyup="compute()"  value="{{$user->shnhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="shnph" step="any" class=" col-sm-3 form-control calc" id="j2" onkeyup="compute()"  value="{{$user->shnph}}" placeholder="Amount"hidden ></td>
                                                <td>Php <font color="blue"><span id="j3">{{$user->shnph}} </td>
                                            </tr>
                                            <tr>
                                                <th>10</th>
                                                <td>NON Rest day OT w/in Excess of 8hrs(69%)</td>
                                                <td> <input type="text" name="shnexhr" step="any" class=" col-sm-3 form-control calc" id="k1" onkeyup="compute()"  value="{{$user->shnexhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="shnexph" step="any" class=" col-sm-3 form-control calc" id="k2" onkeyup="compute()"  value="{{$user->shnexph}}" placeholder="Amount"hidden ></td>
                                                <td>Php <font color="blue"><span id="k3">{{$user->shnexph}} </td>
                                            </tr>
                                            <tr>
                                                <th>11</th>
                                                <td>Rest day OT w/in 8hrs(50%)</td>
                                                <td> <input type="text" name="shhr" step="any" class=" col-sm-3 form-control calc" id="l1" onkeyup="compute()"  value="{{$user->shhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="shph" step="any" class=" col-sm-3 form-control calc" id="l2" onkeyup="compute()"  value="{{$user->shph}}" placeholder="Amount" hidden></td>
                                                <td>Php <font color="blue"><span id="l3">{{$user->shph}} </td>
                                            </tr>
                                            <tr>
                                                <th>12</th>
                                                <td>Rest day OT w/in Excess of 8hrs(95%)</td>
                                                <td><input type="text" name="shexhr" step="any" class=" col-sm-3 form-control calc" id="m1" onkeyup="compute()"  value="{{$user->shexhr}}" placeholder="# of hrs" >
                                                    <input type="text" name="shexph" step="any" class=" col-sm-3 form-control calc" id="m2" onkeyup="compute()"  value="{{$user->shexph}}" placeholder="Amount" hidden>
                                                    <input type="text" name="shtot" step="any" class=" col-sm-3 form-control calc" id="m4" onkeyup="compute()"  value="{{$user->shtot}}" placeholder="Amount" hidden></td>
                                                <td>Php <font color="blue"><span id="m3">{{$user->shexph}} </td>
                                            </tr>
                                            <tr>
                                                <th>Total OT</th>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="ovat" step="any" class=" col-sm-3 form-control calc" id="ovat" onkeyup="compute()"  value="{{$user->ovat}}" placeholder="Amount" hidden></td>
                                                <td>Php <font color="blue"><span id="ovat2">{{$user->ovat}} </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                    <h4 class="page-title"> <font color="red">Deductions</font></h4><input type="text" name="" class=" col-sm-3 form-control calc" id="rate" onkeyup="compute()"  value="{{$user->rate}}" placeholder="# of hrs" hidden>

                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>No.of Minutes  <input type="text" name="pmin" step="any" class=" col-sm-3 form-control calc" id="pmin" onkeyup="compute()"  value="{{$user->pmin}}" placeholder="# of hrs" hidden></th>
                                                <th>Amount</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <th>1 </th>
                                                <td>Late</td>
                                                <td>  <input type="text" name="latehr" step="any" class=" col-sm-3 form-control calc" id="n1" onkeyup="compute()"  value="{{$user->latehr}}" placeholder="# of mins." >
                                                    <input type="text" name="lateph" step="any" class=" col-sm-3 form-control calc" id="n2" onkeyup="compute()"  value="{{$user->lateph}}" placeholder="Amount" hidden></td>
                                                <td> Php <font color="blue"><span id="n3">{{$user->lateph}} </span></font></td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>Undertime</td>
                                                <td> <input type="text" name="unhr" step="any" class=" col-sm-3 form-control calc" id="o1" onkeyup="compute()"  value="{{$user->unhr}}" placeholder="# of mins." >
                                                    <input type="text" name="unph" step="any" class=" col-sm-3 form-control calc" id="o2" onkeyup="compute()"  value="{{$user->unph}}" placeholder="" hidden></td>
                                                <td>Php <font color="blue"><span id="o3">{{$user->unph}} </td>
                                            </tr>
                                           <tr>
                                                <th></th>
                                                <th>Absences</th>
                                                <th> No. of Day(s)</th>
                                                <th>Amount</th>

                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td>Remarks<textarea type="text" name="abmark" step="any" class=" col-5 row-2 form-control " id="" onkeyup="compute()" >{{$user->abmark}}</textarea> 
                                                </td>
                                                <td> <input type="text" name="abday" step="any" class=" col-sm-3 form-control calc" id="z1" onkeyup="compute()"  value="{{$user->abday}}" placeholder="# of day(s)" > 
                                                    <input type="text" name="abph" step="any" class=" col-sm-3 form-control calc" id="z2" onkeyup="compute()"  value="{{$user->abph}}" placeholder="" hidden>
                                                    <input type="text" name="untot" step="any" class=" col-sm-3 form-control calc" id="z4" onkeyup="compute()"  value="{{$user->untot}}" placeholder="" hidden></td>
                                                <td>Php <font color="blue"><span id="z3">{{$user->abph}} </td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="totde" step="any" class=" col-sm-3 form-control calc" id="p2" onkeyup="compute()"  value="{{$user->totde}}" placeholder="Amount" hidden ></td>
                                                <td>Php <font color="blue"><span id="p3">{{$user->totde}} </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                    </div>


                                    <h4 class="page-title"> <font color="red">OT Meal</font></h4>

                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Rate Per Meal</th>
                                                <th>No.of Meals <input type="text" name="" step="any" class=" col-sm-3 form-control calc" id="pmin" onkeyup="compute()"  value="{{$user->pmin}}" placeholder="# of hrs" hidden></th>
                                                <th>Amount</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <th>1 </th>
                                                <td><input type="text" name="rmeal" step="any" class=" col-sm-4 form-control calc" id="q1" onkeyup="compute()"  value="{{$user->rmeal}}" ></td>
                                                <td>  <input type="text" name="r2meal" step="any" class=" col-sm-3 form-control calc" id="q2" onkeyup="compute()"  value="{{$user->r2meal}}" placeholder="# of meals" >
                                                    <input type="text" name="mealph" step="any" class=" col-sm-3 form-control calc" id="q3" onkeyup="compute()"  value="{{$user->mealph}}" placeholder="Amount" hidden ></td>
                                                <td> Php <font color="blue"><span id="q4">{{$user->mealph}} </span></font></td>
                                            </tr>


                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>



                            </form>

                        </div>
                    </div>
                </div>
            </div>
             @include('admin.includes.footer')
    </div>
<script>
    function compute(){
        var f,g,h,i,j,k,l,m,n,o,q,p,r,s,t,u,tot,a,b,c,d,e,w,aa,bb,tat,v;
        var baserate;
        baserate=Number(document.getElementById("rate").value);
        g=Number(document.getElementById("a1").value);
        a =  baserate*1.25*g ;
        document.getElementById("a2").value= a.toFixed(2);
        a3= a;
        document.getElementById("a3").innerHTML = a3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        h=Number(document.getElementById("b1").value);
        i =  baserate*1.1*h ;
        document.getElementById("b2").value= i.toFixed(2);
        b3= i;
        document.getElementById("b3").innerHTML = b3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        j=Number(document.getElementById("c1").value);
        k =  baserate*1.3*j ;
        document.getElementById("c2").value= k.toFixed(2);
        c3= k;
        document.getElementById("c3").innerHTML = c3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        l=Number(document.getElementById("d1").value);
        m =  baserate*1.69*l ;
        document.getElementById("d2").value= m.toFixed(2);
        d3= m;
        document.getElementById("d3").innerHTML = d3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        maa =  k + m ;
        document.getElementById("d4").value= maa.toFixed(2);

        n=Number(document.getElementById("e1").value);
        o =  baserate*1*n ;
        document.getElementById("e2").value= o.toFixed(2);
        e3= o;
        document.getElementById("e3").innerHTML = e3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        p=Number(document.getElementById("f1").value);
        q =  baserate*1.6*p ;
        document.getElementById("f2").value= q.toFixed(2);
        f3= q;
        document.getElementById("f3").innerHTML = f3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        r=Number(document.getElementById("g1").value);
        s =  baserate*1.6*r ;
        document.getElementById("g2").value= s.toFixed(2);
        g3= s;
        document.getElementById("g3").innerHTML = g3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        t=Number(document.getElementById("h1").value);
        u =  baserate*2.38*t ;
        document.getElementById("h2").value= u.toFixed(2);
        h3= u;
        document.getElementById("h3").innerHTML = h3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        us =  u + o + q + s ;
        document.getElementById("h4").value= us.toFixed(2);

        v=Number(document.getElementById("j1").value);
        w =  baserate*0.3*v ;
        document.getElementById("j2").value= w.toFixed(2);
        j3= w;
        document.getElementById("j3").innerHTML = j3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        x=Number(document.getElementById("k1").value);
        y =  baserate*0.69*x ;
        document.getElementById("k2").value= y.toFixed(2);
        k3= y;
        document.getElementById("k3").innerHTML = k3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        z=Number(document.getElementById("l1").value);
        as =  baserate*0.5*z ;
        document.getElementById("l2").value= as.toFixed(2);
        l3= as;
        document.getElementById("l3").innerHTML = l3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        b=Number(document.getElementById("m1").value);
        c =  baserate*0.95*b ;
        document.getElementById("m2").value= c.toFixed(2);
        m3= c;
        document.getElementById("m3").innerHTML = m3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        ovat =  a + i +k +m +o +q +s +u +w +y + c +as;
        document.getElementById("ovat").value= ovat.toFixed(2);
        ovat2= ovat;
        document.getElementById("ovat2").innerHTML = ovat2.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        cs =  w + y + as + c ;
        document.getElementById("m4").value= cs.toFixed(2);

        min=Number(document.getElementById("pmin").value);
        dd=Number(document.getElementById("n1").value);
        n2 =  min*dd ;
        document.getElementById("n2").value= n2.toFixed(2);
        n3= n2;
        document.getElementById("n3").innerHTML = n3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        ee=Number(document.getElementById("o1").value);
        o2 =  min*ee ;
        document.getElementById("o2").value= o2.toFixed(2);
        o3= o2;
        document.getElementById("o3").innerHTML = o3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        p2 = o3 + n3;
        document.getElementById("p2").value= p2.toFixed(2);
        p3= p2;
        document.getElementById("p3").innerHTML = p3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        q1=Number(document.getElementById("q1").value);
        q2=Number(document.getElementById("q2").value);
        q3= q1*q2;
        document.getElementById("q3").value= q3.toFixed(2);
        q4= q3;
        document.getElementById("q4").innerHTML = q4.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        z1=Number(document.getElementById("z1").value);
        z2= z1*f;
        document.getElementById("z2").value= z2.toFixed(2);
        z3= z2;
        document.getElementById("z3").innerHTML = z3.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        z4= z2 + o2;
        document.getElementById("z4").value= z4.toFixed(2);
    }
</script>
<!--


-->
@endsection
