<!--BERT NEW PAYROLL Computation -->
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
                    <a class="btn-sm btn-warning" href="{{route('salary.otu',$user->id)}}"data-position="center">OTU</a>
                    <a class="btn-lg btn-primary" href="#"data-position="center">Payroll</a>
                    <a class="btn-lg btn-lg btn-success" href="#"data-position="center">{{$user->last_name}}, {{$user->first_name}}</a>
                </div>
            </div>
        </div>
            <div id="app" class="container-fluid">
                <div class="row" v-for="(item, i) in items">
                    <div class="col-md-10">
                        <div class="card">
                            <form action="{{route('user.updatepay',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                {{--@method('PUT')--}}
                                <div class="card-body">
                                    <h4 class="card-title">Create Payroll</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="text" name="sala" class="form-control" id="job_type" value="{{$salaryscheds->id}}" hidden>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="job type" class="col-sm-3 text-right control-label col-form-label"><font color="blue">For the Period</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="job_type" value="{{$salarysched1->salary_date}}" disabled>
                                            <input type="text" name="date_cover" class="form-control" id="job_type" value="{{$salarysched1->salary_date}}" hidden>
                                            <input type="text" name="salary_id" class="form-control" id="job_type" value="{{$salaryscheds->salary_id}}" hidden>

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="job type" class="col-sm-3 text-right control-label col-form-label">Employee</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="job_type" value="{{$user->last_name}}, {{$user->first_name}}" disabled>
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
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                                    <input type="text" name="etc3" class="form-control" onkeyup="compute()"id="etc3"value="{{$user->etc3}}" hidden>
                                    <input type="text" name="tot2" class="form-control" onkeyup="compute()"id="rh7"value="{{$user->tot2}}" hidden >
                                    <input type="text" name="" class="form-control" onkeyup="compute()"id="rh8"value="{{$user->untot}}" hidden>

                                    <input type="text" name="tot4" class="form-control" onkeyup="compute()"id="tot4"value="{{$user->tot4}}" hidden>

                                    <input type="text" name="net" class="form-control" onkeyup="compute()"id="net"value="{{$user->net}}" hidden>



                                    <input type="text" name="" class="form-control" onkeyup="compute()"id="rh1"value="{{$user->regph}}" hidden>
                                    <input type="text" name="" class="form-control" onkeyup="compute()"id="rh2"value="{{$user->ndph}}" hidden>
                                    <input type="text" name="" class="form-control" onkeyup="compute()"id="rh3"value="{{$user->resttot}}" hidden>
                                    <input type="text" name="" class="form-control" onkeyup="compute()"id="rh4"value="{{$user->rhtot}}" hidden>
                                    <input type="text" name="" class="form-control" onkeyup="compute()"id="rh5"value="{{$user->shtot}}" hidden>
                                    <input type="text" name="paytot" class="form-control" onkeyup="compute()"id="rh6"value="{{$user->paytot}}" hidden>

                                    <h4 class="page-title"> <font color="red"> Computation</font></h4>
                                    <div class="form-group row">

                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control calc" id="salary" onkeyup="compute()"  value="{{$user->salary}}" hidden >

                                            <input type="text" name="semisalary" class="form-control calc" id="semisalary" onkeyup="compute()"  value="{{$user->semisalary}}" hidden >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="liquidation" class="col-sm-3 text-right control-label col-form-label">For Liquidations</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="liquidation" class="form-control" onkeyup="compute()"id="liquidation"value="{{$user->liquidation}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-9">
                                            <input type="text" name="newsemi" class="form-control" id="newsemi" onkeyup="compute()" value="{{$user->newsemi}}" hidden>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tardi_under" class="col-sm-3 text-right control-label col-form-label"><font color="blue">Tardiness / Undertime</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="tardi_under" onkeyup="compute()" value="{{$user->totde}}" disabled>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="overtime" class="col-sm-3 text-right control-label col-form-label"><font color="blue">Overtime</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="overtime" onkeyup="compute()" value="{{$user->ovat}}" disabled >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="otmeal" class="col-sm-3 text-right control-label col-form-label"><font color="blue">OT Meal</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="otmeal" onkeyup="compute()"value="{{$user->mealph}}" disabled >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="etc1" class="col-sm-3 text-right control-label col-form-label">Others</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="etc1" class="form-control" id="etc1" onkeyup="compute()"value="{{$user->etc1}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="salarywages" class="col-sm-3 text-right control-label col-form-label"><font color="blue">Salary and Wages</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" onkeyup="compute()" id="salarywages2" value="{{$user->salarywages}}" disabled>
                                            <input type="text" name="salarywages" class="form-control" onkeyup="compute()" id="salarywages" value="{{$user->salarywages}}" hidden>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mpf" class="col-sm-3 text-right control-label col-form-label">Monthly Professional Fee</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mpf" class="form-control" onkeyup="compute()"id="mpf" value="{{$user->mpf}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="etc1" class="col-sm-3 text-right control-label col-form-label">Other Income</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="etc2" class="form-control" id="etc2" onkeyup="compute()"value="{{$user->etc2}}">
                                        </div>
                                    </div>



                                    <h4 class="page-title"> <font color="red"> Employee Share (Deductions)</font></h4>
                                    <div class="form-group row">
                                        <label for="sssdeduc" class="col-sm-3 text-right control-label col-form-label">SSS </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sssdeduc" class="form-control" id="sssdeduc" onkeyup="compute()" value="{{$user->sssdeduc}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phicdeduc" class="col-sm-3 text-right control-label col-form-label"><font color="blue">PHIC</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="phicdeduc2" onkeyup="compute()" value="{{$user->phicdeduc}}" disabled>
                                            <input type="text" name="phicdeduc" class="form-control" id="phicdeduc" onkeyup="compute()" value="{{$user->phicdeduc}}" hidden>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="hdmfdeduc" class="col-sm-3 text-right control-label col-form-label">HDMF</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="hdmfdeduc" class="form-control" id="hdmfdeduc"onkeyup="compute()"  value="{{$user->hdmfdeduc}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="birc" class="col-sm-3 text-right control-label col-form-label">1601-C</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="birc" class="form-control" id="birc"onkeyup="compute()" value="{{$user->birc}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bire" class="col-sm-3 text-right control-label col-form-label">1601-E</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bire" class="form-control" id="bire" onkeyup="compute()" value="{{$user->bire}}">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="totaldeduc" class="col-sm-3 text-right control-label col-form-label"><font color="blue">TOTAL</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="totaldeduc2" onkeyup="compute()" value="{{$user->totaldeduc}}" disabled>
                                            <input type="text" name="totaldeduc" class="form-control" id="totaldeduc" onkeyup="compute()" value="{{$user->totaldeduc}}" hidden>
                                        </div>
                                    </div>


                                    <h4 class="page-title"> <font color="red"> Other Deductions Advances</font></h4>
                                    <div class="form-group row">
                                        <label for="etcdeduc" class="col-sm-3 text-right control-label col-form-label">Amount </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="etcdeduc" class="form-control" id="etcdeduc"onkeyup="compute()" value="{{$user->etcdeduc}}">
                                        </div>
                                    </div>
                                    <h4 class="page-title"> <font color="red"> Take Home Salary</font></h4>
                                    <div class="form-group row">
                                        <label for="ths" class="col-sm-3 text-right control-label col-form-label"><font color="blue">Amount</font> </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="ths2" value="{{$user->ths}}" disabled>
                                            <input type="text" name="ths" class="form-control" id="ths" value="{{$user->ths}}" hidden>
                                        </div>
                                    </div>

                                    <h4 class="page-title"> <font color="red"> Employer Share</font></h4>

                                    <div class="form-group row">
                                        <label for="sssemp" class="col-sm-3 text-right control-label col-form-label">SSS</label>
                                        <div class="col-sm-9">

                                            <input type="text" name="sssemp" class="form-control" onkeyup="compute()"id="sssemp" value="{{$user->sssemp}}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ecemp" class="col-sm-3 text-right control-label col-form-label">EC</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ecemp" class="form-control"onkeyup="compute()" id="ecemp" value="{{$user->ecemp}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phicemp" class="col-sm-3 text-right control-label col-form-label"><font color="blue">PHIC</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="phicemp2" onkeyup="compute()" value="{{$user->phicemp}}" disabled>
                                            <input type="text" name="phicemp" class="form-control" onkeyup="compute()"id="phicemp" value="{{$user->phicemp}}"hidden>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hmdfemp" class="col-sm-3 text-right control-label col-form-label">HDMF</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="hdmfemp" class="form-control"onkeyup="compute()" id="hdmfemp" value="{{$user->hdmfemp}}">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="totalemp" class="col-sm-3 text-right control-label col-form-label"><font color="blue">TOTAL</font></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control"onkeyup="compute()" id="totalemp2" value="{{$user->totalemp}}" disabled>
                                            <input type="text" name="totalemp" class="form-control"onkeyup="compute()" id="totalemp" value="{{$user->totalemp}}" hidden>
                                        </div>
                                    </div>
                                    <h4 class="page-title"> <font color="red"> Total Employee Cost</font></h4>
                                    <div class="form-group row">
                                        <label for="totalempcost" class="col-sm-3 text-right control-label col-form-label">Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="" class="form-control" id="totalempcost2" value="{{$user->totalempcost}}" disabled>
                                            <input type="text" name="totalempcost" class="form-control" id="totalempcost" value="{{$user->totalempcost}}" hidden>

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
<script>
    function compute(){
        /*var f,g,h,i,j,k,l,m,n,o,q,p,r,s,t,u,tot,a,b,c,d,e,w,aa,bb,tat,rr2,overr,v,ow,rh1,rh2,rh3,rh4,rh5,over,qw,mw,wa,iu,da,po,z,z2;*/
        var h,i,j,k,l,m,n,o,q,p,r,s,t,u,tot,a,b,c,d,e,w,aa,bb,tat,rr2,overr,v,ow,rh1,rh2,rh3,rh4,rh5,over,qw,mw,wa,iu,da,po,z,z2;
        
        var semisalary,liquidation,tardi_under,overtime,otmeal,etc1,mpf,sssdeduc,salary,hdmfdeduc,birc,bire,rh8;
        var semisalary1,newsemi,salarywages,salarywages2,phicdeduc,phicdeduc2,phicemp2,totaldeduc,totaldeduc2,etcdeduc,ths,ths2,phicemp;
        var sssemp,ecemp,hdmfemp,totalemp,totalemp2,totalempcost,totalempcost2;

        semisalary=Number(document.getElementById("semisalary").value);
        liquidation=Number(document.getElementById("liquidation").value);
        tardi_under=Number(document.getElementById("tardi_under").value);
        overtime=Number(document.getElementById("overtime").value);
        otmeal=Number(document.getElementById("otmeal").value);
        etc1=Number(document.getElementById("etc1").value);
        mpf=Number(document.getElementById("mpf").value);
        sssdeduc=Number(document.getElementById("sssdeduc").value);
        salary=Number(document.getElementById("salary").value);
        hdmfdeduc=Number(document.getElementById("hdmfdeduc").value);
        birc=Number(document.getElementById("birc").value);
        bire=Number(document.getElementById("bire").value);
        rh8=Number(document.getElementById("rh8").value);
        etc2=Number(document.getElementById("etc2").value);
        rh1=Number(document.getElementById("rh1").value);
        rh2=Number(document.getElementById("rh2").value);
        rh3=Number(document.getElementById("rh3").value);
        rh4=Number(document.getElementById("rh4").value);
        rh5=Number(document.getElementById("rh5").value);
        newsemi =  semisalary - liquidation ;
        document.getElementById("newsemi").value= newsemi.toFixed(2);
        salarywages =  semisalary - liquidation + overtime + otmeal + etc1 - tardi_under  ;
        document.getElementById("salarywages").value= salarywages.toFixed(2);
        salarywages2 =  salarywages ;
        document.getElementById("salarywages2").value= salarywages2.toFixed(2);

        var phicval = 0.01375;

        phicdeduc = salary * phicval / 2   ;
        document.getElementById("phicdeduc").value= phicdeduc.toFixed(2);
        phicdeduc2 =  phicdeduc ;
        document.getElementById("phicdeduc2").value= phicdeduc2.toFixed(2);
        phicemp2 =  phicdeduc ;
        document.getElementById("phicemp2").value= phicemp2.toFixed(2);

        totaldeduc =  sssdeduc + phicdeduc + hdmfdeduc + birc + bire   ;
        document.getElementById("totaldeduc").value= totaldeduc.toFixed(2);
        totaldeduc2 = totaldeduc  ;
        document.getElementById("totaldeduc2").value= totaldeduc2.toFixed(2);
        overr =  i + rh8 + sssdeduc + phicdeduc + r + birc ;
        document.getElementById("rh7").value= overr.toFixed(2);
        rh6=  rh1 + rh2 + rh3 + rh4 + rh5 + newsemi + k ;
        document.getElementById("rh6").value= rh6.toFixed(2);

        etcdeduc=Number(document.getElementById("etcdeduc").value);

        ths =  salarywages + mpf - totaldeduc - etcdeduc ;
        document.getElementById("ths").value= ths.toFixed(2);
        ths2 =  ths ;
        document.getElementById("ths2").value= ths2.toFixed(2);
        phicemp =  phicdeduc;
        document.getElementById("phicemp").value= phicemp.toFixed(2);

        sssemp=Number(document.getElementById("sssemp").value);

        ecemp=Number(document.getElementById("ecemp").value);
        hdmfemp=Number(document.getElementById("hdmfemp").value);
        totalemp = ecemp + hdmfemp + phicemp + sssemp;
        document.getElementById("totalemp").value= totalemp.toFixed(2);
        totalemp2 = totalemp;
        document.getElementById("totalemp2").value= totalemp2.toFixed(2);

        totalempcost = salarywages + mpf + totalemp;
        document.getElementById("totalempcost").value= totalempcost.toFixed(2);
        totalempcost = totalempcost;
        document.getElementById("totalempcost2").value= totalempcost.toFixed(2);
        etc3 = etc2 + rh6 ;
        document.getElementById("etc3").value= etc3.toFixed(2);
        tot4 = overr + etcdeduc ;
        document.getElementById("tot4").value= tot4.toFixed(2);
        net = etc3 - tot4 ;
        document.getElementById("net").value= net.toFixed(2);

    }
</script>




@endsection
