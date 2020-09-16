<style type="text/css">
    table td, table th{
        border:1px solid grey;
    }
</style>
<div class="container">

    <img src="admin-panel/assets/images/payslip.png" height="50%"width="30%">

    <table style="position: center " >


        <tbody>
        <tr>
           <td> <strong>Date Covered</strong> </td>
            <td>Employee Name</td>
            <td>Monthly Salary</td>
            <td>Semi-Monthly Salary</td>
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
        @foreach($users as $user)

            <tr>

          <td>{{ $user->date_cover }} </td>
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
