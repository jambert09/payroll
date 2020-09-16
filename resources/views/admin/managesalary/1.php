@extends('admin.layout.master')

@section('content')

@include('admin.includes.sidebar')
@include('admin.includes.computescripts')

<div class="page-wrapper">
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
                <h4 class="page-title">Payroll Manager</h4>
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
    <div id="app" class="container-fluid">
        <div class="row" v-for="(item, i) in items">
            <div class="col-md-10">
                <div class="card">
                    <form action="{{route('user.update',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        {{--@method('PUT')--}}
                        <div class="card-body">
                            <h4 class="card-title">Create Payroll</h4> {{$user->last_name}}, {{$user->first_name}}

                            <input type="text" name="emp_id" class="col-sm-3 form-control" id="emp_id" value="{{$user->id}}" >

                            <div class="form-group row">
                                <label for="salary" class="col-sm-3 text-right control-label col-form-label">Salary</label>

                                <div class="col-sm-9">
                                    <input type="text"name="salary" class="form-control" id="salary" value="{{$user->salary}}" v-model="item.salary">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="job type" class="col-sm-3 text-right control-label col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" name="" class="form-control" id="job_type" value="{{$user->department}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="job type" class="col-sm-3 text-right control-label col-form-label">Designation</label>
                                <div class="col-sm-9">
                                    <input type="text" name="" class="form-control" id="job_type" value="{{$user->designation}}">
                                </div>
                            </div>


                            <h4 class="page-title"> <font color="red"> Computation</font></h4>
                            <div class="form-group row">
                                <label for="semisalary" class="col-sm-3 text-right control-label col-form-label">Semi-Monthly Salary </label>
                                <div class="col-sm-9">
                                    <input type="text"  name="semisalary" class="form-control" id="total1" >

                                    <input type="text" name="liquidation" class="form-control" id="divide" value="2" v-model="item.divide" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="liquidation" class="col-sm-3 text-right control-label col-form-label">For Liquidation</label>
                                <div class="col-sm-9">
                                    <input type="text" name="liquidation" class="form-control" id="liquidation"value="" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tardi_under" class="col-sm-3 text-right control-label col-form-label">Tardiness / Undertime</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tardi_under" class="form-control" id="tardi_under" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="overtime" class="col-sm-3 text-right control-label col-form-label">Overtime</label>
                                <div class="col-sm-9">
                                    <input type="text" name="overtime" class="form-control" id="overtime"  value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="otmeal" class="col-sm-3 text-right control-label col-form-label">OT Meal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="otmeal" class="form-control" id="otmeal" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="etc1" class="col-sm-3 text-right control-label col-form-label">Others</label>
                                <div class="col-sm-9">
                                    <input type="text" name="etc1" class="form-control" id="etc1" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="salarywages" class="col-sm-3 text-right control-label col-form-label"><font color="blue">Salary and Wages</font></label>
                                <div class="col-sm-9">
                                    <input type="text" name="salarywages" class="form-control" id="salarywages" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mpf" class="col-sm-3 text-right control-label col-form-label">Monthly Professional Fee</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mpf" class="form-control" id="mpf" value="">
                                </div>
                            </div>



                            <h4 class="page-title"> <font color="red"> Employee Share (Deductions)</font></h4>
                            <div class="form-group row">
                                <label for="sssdeduc" class="col-sm-3 text-right control-label col-form-label">SSS </label>
                                <div class="col-sm-9">
                                    <input type="text" name="sssdeduc" class="form-control" id="sssdeduc" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phicdeduc" class="col-sm-3 text-right control-label col-form-label">PHIC</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phicdeduc" class="form-control" id="phicdeduc" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hdmfdeduc" class="col-sm-3 text-right control-label col-form-label">HDMF</label>
                                <div class="col-sm-9">
                                    <input type="text" name="hdmfdeduc" class="form-control" id="hdmfdeduc" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birc" class="col-sm-3 text-right control-label col-form-label">1601-C</label>
                                <div class="col-sm-9">
                                    <input type="text" name="birc" class="form-control" id="birc" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bire" class="col-sm-3 text-right control-label col-form-label">1601-E</label>
                                <div class="col-sm-9">
                                    <input type="text" name="bire" class="form-control" id="bire" value="">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="totaldeduc" class="col-sm-3 text-right control-label col-form-label"><font color="blue">TOTAL</font></label>
                                <div class="col-sm-9">
                                    <input type="text" name="totaldeduc" class="form-control" id="totaldeduc" value="">
                                </div>
                            </div>


                            <h4 class="page-title"> <font color="red"> Other Deductions Advances</font></h4>
                            <div class="form-group row">
                                <label for="etcdeduc" class="col-sm-3 text-right control-label col-form-label">Amount </label>
                                <div class="col-sm-9">
                                    <input type="text" name="etcdeduc" class="form-control" id="etcdeduc" value="">
                                </div>
                            </div>
                            <h4 class="page-title"> <font color="red"> Take Home Salary</font></h4>
                            <div class="form-group row">
                                <label for="ths" class="col-sm-3 text-right control-label col-form-label">Amount </label>
                                <div class="col-sm-9">
                                    <input type="text" name="ths" class="form-control" id="ths" value="">
                                </div>
                            </div>

                            <h4 class="page-title"> <font color="red"> Employee Share</font></h4>
                            <div class="form-group row">
                                <label for="sssemp" class="col-sm-3 text-right control-label col-form-label">SSS</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sssemp" class="form-control" id="sssemp" value="">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ecemp" class="col-sm-3 text-right control-label col-form-label">EC</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ecemp" class="form-control" id="ecemp" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phicemp" class="col-sm-3 text-right control-label col-form-label">PHIC</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phicemp" class="form-control" id="phicemp" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hmdfemp" class="col-sm-3 text-right control-label col-form-label">HDMF</label>
                                <div class="col-sm-9">
                                    <input type="text" name="hmdfemp" class="form-control" id="hmdfemp" value="">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="totalemp" class="col-sm-3 text-right control-label col-form-label"><font color="blue">TOTAL</font></label>
                                <div class="col-sm-9">
                                    <input type="text" name="totalemp" class="form-control" id="totalemp" value="">
                                </div>
                            </div>
                            <h4 class="page-title"> <font color="red"> Total Employee Cost</font></h4>
                            <div class="form-group row">
                                <label for="totalempcost" class="col-sm-3 text-right control-label col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" name="totalempcost" class="form-control" id="totalempcost" value="">

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
    new Vue({
        el: '#app',

        data: {
            items: []
        },

        computed: {
            total1() {
                return this.items.reduce((total, item) => {
                    return total = Number(item.salary)/ Number(item.divide) ;
                }, 0);
            },

            totalPrice() {
                return this.items.reduce((total, item) => {
                    return total + Number(item.divide);
                }, 0);
            }
        },

        created() {
            this.addItem();
        },

        methods: {
            addItem() {
                this.items.push({
                    description: null,
                    qty: 0,
                    price: 0
                });
            }
        }
    });



</script>
@endsection
