<?php

namespace App\Http\Controllers;

use App\Download;
use App\Payments;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PDF;


class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.download.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Download $download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        //
    }
    public function pdfexport($id)
    {
        $user = Payments::find($id);
        $pdf = PDF::loadView('admin.pdfview', ['user' => $user])->setPaper('a5', 'landscape');
        $pass = Auth::user()->pdfpass;
        $pdf->setEncryption($pass);
        $fileName = $user->username;
        return $pdf->stream($fileName . '.pdf');
    }

    public function pdfview($id)
    {


        $user = Payments::find($id);
        view()->share('user',$user);



        if($request->has('id')){
            $customPaper = array(0,0,350.00,400.80);
            //$customPaper = array(0,0,800.00,2510.80);
            $pdf = PDF::loadView('admin.pdfview',compact('user'))->setPaper($customPaper, 'landscape');
            $pdf->setEncryption('cds');
            return $pdf->download('CDS_Payslip.pdf');
        }


        return view('admin.pdfview');
    }
    public function pdfviewall(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }

        $users = User::all();
$userad = Auth::user();
        $salary = DB::table('users')
            ->select(DB::raw('SUM(salary) as Sum'))
            ->get();

        $newsemi = DB::table('users')
            ->select(DB::raw('SUM(newsemi) as Sum'))
            ->get();

        $liqui = DB::table('users')
            ->select(DB::raw('SUM(liquidation) as Sum'))
            ->get();

        $totde = DB::table('users')
            ->select(DB::raw('SUM(totde) as Sum'))
            ->get();
        $untot = DB::table('users')
            ->select(DB::raw('SUM(untot) as Sum'))
            ->get();

        $ovat = DB::table('users')
            ->select(DB::raw('SUM(ovat) as Sum'))
            ->get();
        $mealph = DB::table('users')
            ->select(DB::raw('SUM(mealph) as Sum'))
            ->get();
        $etc1 = DB::table('users')
            ->select(DB::raw('SUM(etc1) as Sum'))
            ->get();
        $salarywages = DB::table('users')
            ->select(DB::raw('SUM(salarywages) as Sum'))
            ->get();
        $mpf = DB::table('users')
            ->select(DB::raw('SUM(mpf) as Sum'))
            ->get();
        $sssdeduc = DB::table('users')
            ->select(DB::raw('SUM(sssdeduc) as Sum'))
            ->get();
        $phicdeduc = DB::table('users')
            ->select(DB::raw('SUM(phicdeduc) as Sum'))
            ->get();
        $hdmfdeduc = DB::table('users')
            ->select(DB::raw('SUM(hdmfdeduc) as Sum'))
            ->get();
        $birc = DB::table('users')
            ->select(DB::raw('SUM(birc) as Sum'))
            ->get();
        $bire = DB::table('users')
            ->select(DB::raw('SUM(bire) as Sum'))
            ->get();
        $totaldeduc = DB::table('users')
            ->select(DB::raw('SUM(totaldeduc) as Sum'))
            ->get();
        $etcdeduc = DB::table('users')
            ->select(DB::raw('SUM(etcdeduc) as Sum'))
            ->get();
        $ths = DB::table('users')
            ->select(DB::raw('SUM(ths) as Sum'))
            ->get();
        $sssemp = DB::table('users')
            ->select(DB::raw('SUM(sssemp) as Sum'))
            ->get();
        $ecemp = DB::table('users')
            ->select(DB::raw('SUM(ecemp) as Sum'))
            ->get();
        $phicemp = DB::table('users')
            ->select(DB::raw('SUM(phicemp) as Sum'))
            ->get();
        $hdmfemp = DB::table('users')
            ->select(DB::raw('SUM(hdmfemp) as Sum'))
            ->get();
        $totalemp = DB::table('users')
            ->select(DB::raw('SUM(totalemp) as Sum'))
            ->get();
        $totalempcost = DB::table('users')
            ->select(DB::raw('SUM(totalempcost) as Sum'))
            ->get();

        view()->share('users',$users);


        if($request->has('download')){
            $customPaper = array(0,0,800.00,2510.80);
            $pdf = PDF::loadView('admin.pdfviewall',compact('salary',$salary,
                'newsemi',$newsemi,
                'liqui',$liqui,
                'totde',$totde,
                'untot',$untot,
                'ovat',$ovat,
                'mealph',$mealph,
                'etc1',$etc1,
                'salarywages',$salarywages,
                'mpf',$mpf,
                'sssdeduc',$sssdeduc,
                'phicdeduc',$phicdeduc,
                'hdmfdeduc',$hdmfdeduc,
                'birc',$birc,
                'bire',$bire,
                'totaldeduc',$totaldeduc,
                'etcdeduc',$etcdeduc,
                'ths',$ths,
                'sssemp',$sssemp,
                'ecemp',$ecemp,
                'phicemp',$phicemp,
                'hdmfemp',$hdmfemp,
                'totalemp',$totalemp,
                'totalempcost',$totalempcost
        ))->setPaper($customPaper, 'landscape');
            $pdf->setEncryption($userad->pdfpass);
            return $pdf->download('CDS_Overall_Payroll.pdf');
        };



        return view('admin.pdfviewall', compact('salary',$salary,
            'newsemi',$newsemi,
            'liqui',$liqui,
            'totde',$totde,
            'untot',$untot,
            'ovat',$ovat,
            'mealph',$mealph,
            'etc1',$etc1,
            'salarywages',$salarywages,
            'mpf',$mpf,
            'sssdeduc',$sssdeduc,
            'phicdeduc',$phicdeduc,
            'hdmfdeduc',$hdmfdeduc,
            'birc',$birc,
            'bire',$bire,
            'totaldeduc',$totaldeduc,
            'etcdeduc',$etcdeduc,
            'ths',$ths,
            'sssemp',$sssemp,
            'ecemp',$ecemp,
            'phicemp',$phicemp,
            'hdmfemp',$hdmfemp,
            'totalemp',$totalemp,
            'totalempcost',$totalempcost
        ));




    }
    public function pdfviewall1(Request $request,$id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }

        $users1 = Payments::find($id);
        $users = Payments::where('salary_id', $users1->id)->get();
        $userad = Auth::user();

        return view('admin.managesalary.summary',compact('users','users1'));




    }
}
