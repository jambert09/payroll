<!-- LELIS PDF VIEW -->

@if($user->user_id==Auth::user()->id)<style type="text/css">
    table td, table th{
        border:1px solid grey;
    }
</style>
<div class="container">
    
    <img src="admin-panel/assets/images/payslip.png" height="5%"width="20%">
    <div STYLE="float: right"> <font size="smaller"> <strong> Name:  {{ $user->username }}</strong> <br> <strong> For the Period:</strong> {{ $user->salary_date }}</font> </div>





    <table style="position: left">
        <thead>

        </thead>
        <tbody>

        <tr>
            <th>Basic Rate</th>
             <th>{{$user->newsemi}}</th>
            <br>
        </tr>
        <tr>
            <th>Tardiness</th>
            <th>{{ $user->totde }} </th>
            <br>
        </tr>
     
            <th>Overtime (Reg)</th>
            <td>{{ $user->regph }} </td>
            <th>Undertime</th>
            <td>{{ $user->untot }} </td>
        </tr>
        <tr>
            <th>Night Diff</th>
            <td>{{ $user->ndph }} </td>
            <th>SSS</th>
            <td>{{ $user->sssdeduc }} </td>
        </tr>
        <tr>
            <th>Restday OT</th>
            <td>{{ $user->resttot }} </td>
            <th>Philhealth</th>
            <td>{{ $user->phicdeduc }} </td>
        </tr>
        <tr>
            <th>Legal Holiday</th>
            <td>{{ $user->rhtot }} </td>
            <th>Pag-ibig</th>
            <td>{{ $user->hdmfdeduc }} </td>
        </tr>
        <tr>
            <th>Special Holiday</th>
            <td>{{ $user->shtot }} </td>
            <th>W-Tax</th>
            <td>{{ $user->birc }} </td>
        </tr>
        <tr>
            <th>OT Meal</th>
            <td>{{ $user->mealph }} </td>
            <th></th>
            <th>{{ $user->tot2 }} </th>
        </tr>
        <tr>
            <th></th>
            <th> {{ $user->paytot }} </th>
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
            <td>{{ $user->etc2 }} </td>
            <th>Other Deductions</th>
            <td>{{ $user->etcdeduc }} </td>
        </tr>
        <tr>
            <th></th>
            <td><strong><font color="blue"> {{ $user->etc3}} </font> </strong> </td>
            <th></th>
            <td><strong><font color="red"> {{ $user->tot4 }} </font> </strong>  </td>
        </tr>
        <tr>
            <th></th>
            <td> </td>
            <th>NET PAY</th>
            <td><strong><font color="green"> {{ $user->net }} </font> </strong> </td>
        </tr>

        </tbody>
    </table>
</div>
@else
RESTRICTED, DATA PRIVACY ACT OF 2012 == R.A. 10173
    @endif
