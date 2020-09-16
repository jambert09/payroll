<style type="text/css">
    table td, table th{
        border:1px solid grey;
    }
</style>
<div class="container">

    <img src="admin-panel/assets/images/payslip.png" height="10%"width="30%">

    <table style="position: center " width="1000">


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
            <td>{{ $user->last_name }}, {{ $user->first_name }} </td>
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
            <td>{{ $user->totalempcost }} </td>


        </tr>


        @endforeach
        <tr>
            <td>Total</td>
            <td></td>
            <td>{{ $salary }}</td>
            <td>{{ $newsemi }}</td>
            <td>{{ $liqui }}</td>
            <td>{{ $totde }}</td>
            <td>{{ $untot }}</td>
            <td>{{ $ovat }}</td>
            <td>{{ $mealph }}</td>
            <td>{{ $etc1 }}</td>
            <td> {{ $salarywages }}</td>
            <td>{{ $mpf }}</td>
            <td>{{ $sssdeduc }}</td>
            <td>{{ $phicdeduc }}</td>
            <td>{{ $hdmfdeduc }}</td>
            <td>{{ $birc }}</td>
            <td>{{ $bire }}</td>
            <td>{{ $totaldeduc }}</td>
            <td>{{ $etcdeduc }}</td>
            <td>{{ $ths }}</td>
            <td>{{ $sssemp }}</td>
            <td>{{ $ecemp }}</td>
            <td>{{ $phicemp }}</td>
            <td>{{ $hdmfemp }}</td>
            <td>{{ $totalemp }}</td>
            <td>{{ $totalempcost }}</td><br>


        </tr>
        </tbody>


    </table>
</div>
