<?php

namespace App\Http\Controllers;

use App\Payments;
use App\Salarysched;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class SalaryschedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $salaryscheds = Salarysched::orderBy('salary_date', 'desc')->paginate(10);
        $users = User::all();

        return view('admin.managesalary.salarylist',compact('salaryscheds', 'users' ));
    }
    public function indexnew()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }

        $users = User::all();

        $show = Payments::where('showall', 1)->orderBy('id', 'desc')->get();
        $show1 = Payments::all('id','salary_id')->get('id');
        $salary1 = Payments::where('salary_id', $show1)->get();
         $salarytot = count($salary1);


        return view('admin.managesalary.salarylist2',compact( 'users','show','salarytot'));
    }
    public function indexsalary()
    {

        $users = Auth::user();

        $show = Payments::where('user_id', $users->id)->orderBy('id', 'desc')->get();
        $show3 = Payments::find($show);
        $show1 = Payments::all('id','salary_id')->get('id');
        $salary1 = Payments::where('salary_id', $show1)->get();
        $salarytot = count($salary1);


        return view('admin.dashboard.salarylist3',compact( 'users','show','show3','salarytot'));
    }
    public function viewall()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }

        $users = User::orderBy('id', 'asc')->paginate(10);
        $salaryscheds = Payments::all();
        return view('admin.managesalary.viewall',compact('salaryscheds', 'users' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $salaryscheds = Salarysched::all();
        $users = User::all();

        return view('admin.managesalary.create',compact('salaryscheds', 'users' ));
    }
    public function create2()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $salaryscheds = Payments::where('showall', 1)->get()->last();
        $users = User::all();

        return view('admin.managesalary.create2',compact('salaryscheds', 'users' ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'date_from' => 'required'



            //  'password' => 'required',
//            'status' => 'required',

        ]);
        $salarysched = new Salarysched();
        $salarysched -> salary_date = $request ->date_from;
        $salarysched -> pay_id = $request ->pay_id;



        $salarysched -> save();
        Toastr::success('Salary Date successfully added!','Success');
        return redirect()->route('managesalary.salarylist');
    }
    public function store2(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'date_from' => 'required',
            'pay_id' => 'distinct'


            //  'password' => 'required',
//            'status' => 'required',

        ]);

        $salarysched = new Payments();
        $salarysched -> salary_date = $request ->date_from;
        $salarysched -> showall = 1;
            $salarysched -> save();




        Toastr::success('Salary Date successfully added!','Success');
        return redirect()->route('managesalary.salarylist2');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        $salaryscheds = Salarysched::all()->last()->salary_date;

        return view('admin.managesalary.editpay',compact('user', 'salaryscheds'));

    }
    public function showpay($id)
    {

        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        $salaryscheds = Payments::findOrFail($user->salary_id);
        $salarysched1 = Payments::findOrFail($salaryscheds->salary_id);


        return view('admin.managesalary.editpay2',compact('user', 'salaryscheds','salarysched1'));

    }
    public function editpay3($id)
    {

        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = Payments::find($id);
        $salarysched1 = Payments::findOrFail($user->salary_id);
        $salarysched2 = Payments::all()->last()->salary_date;
        $salarysched3 = Payments::all()->last()->id;
        $salaryscheds = Payments::where('showall', 1)->orderBy('salary_date', 'asc')->get();
        $salaryschedrr = Payments::where('showall', 1)->get()->last();
        return view('admin.managesalary.editpay3',compact('user', 'salaryscheds','salarysched1'));

    }
    public function show2($id)
    {

        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $payment = Payments::find($id);
        $users = User::where('status', 1)->get('id');
        $users1 = User::all();


        $payment4 = Payments::where('salary_id', $id)->get();

        return view('admin.managesalary.viewlist',compact('users','payment','payment4','users1'));

    }
    public function showotu($id)
    {

        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);

        $salarysched2 = Payments::all()->last()->salary_date;
        $salarysched3 = Payments::all()->last()->id;
        $salaryscheds = Payments::where('showall', 1)->orderBy('salary_date', 'asc')->get();
        $salarysched1 = Payments::where('showall', 1)->get()->last();
        return view('admin.managesalary.otu',compact('user','salaryscheds','salarysched1'));

    }
    public function editotu($id)
    {

        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = Payments::find($id);
        $salarysched1 = Payments::findOrFail($user->salary_id);
        $salarysched2 = Payments::all()->last()->salary_date;
        $salarysched3 = Payments::all()->last()->id;
        $salaryscheds = Payments::where('showall', 1)->orderBy('salary_date', 'asc')->get();
        $salaryschedrr = Payments::where('showall', 1)->get()->last();
        return view('admin.managesalary.editotu',compact('user','salaryscheds','salarysched1'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
