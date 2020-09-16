<?php

namespace App\Http\Controllers;
use App\Payments;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Gate;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users = User::withCount(['leave', 'leave as approve_leave_count' => function($query){
            $query->where('is_approved',true);
        }])->paginate(15);

        return view('admin.user.index',compact('users'));
    }
    public function enterpass()
    {
       $user = Auth::user();

        return view('admin.enter_password_page',compact('user'));
    }
    public function passcheck(Request $request)
    {

        $request -> validate([


            'password' => 'required' ,
            //  'password' => 'required',
//            'status' => 'required',

        ]);
        $user = Auth::user();
        $password_to_website = $user->password;
        $password = $request -> password;

        if (Hash::check($password, Auth::user()->password))
          {

            Toastr::success('You can now update your PDF Security!', 'Success');
            return view('admin.dashboard.pdfpass', compact('user'));
        }
        else
            {


            return view('admin.enter_password_page', compact('user'));
        }
    }
    public function passokay()
    {
        $user = Auth::user();


        return view('admin.dashboard.pdfpass',compact('user'));
    }
    public function designation()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $users = User::withCount(['leave', 'leave as approve_leave_count' => function($query){
            $query->where('is_approved',true);
        }])->paginate(15);

        return view('admin.user.designation',compact('users'));
    }

    public function department()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $users = User::withCount(['leave', 'leave as approve_leave_count' => function($query){
            $query->where('is_approved',true);
        }])->paginate(15);

        return view('admin.user.department',compact('users'));
    }
    public function salary()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $users = User::withCount(['leave', 'leave as approve_leave_count' => function($query){
            $query->where('is_approved',true);
        }])->paginate(15);

        return view('admin.user.salary',compact('users'));
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
        return view('admin.user.create');
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

            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
          //  'password' => 'required',
//            'status' => 'required',

    ]);
        $user = new User();
        $user -> username = $request -> username;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $user->image = $filename;
        }else{
            $user->image = '';
        }
        $user -> first_name = $request -> fname;
        $user -> last_name = $request -> lname;
        $user -> role = $request -> role;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> address = $request -> address;
        $user -> gender = $request -> gender;
        $user -> dob = $request -> dob;
        $user -> join_date = $request -> dob;
        $user -> job_type = $request -> job_type;
        $user -> city = $request -> city;
        $user -> age = $request -> age;


 $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('Employee successfully added!','Success');
        return redirect()->route('designation.edit1',$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }
    public function updatedept($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        return view('admin.user.updept',compact('user'));
    }
    public function editsalary($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        return view('admin.user.upsalary',compact('user'));
    }
    public function updesig($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        return view('admin.user.updesig',compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([


            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',

          //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);
        $user -> username = $request -> username;
//        $user -> image = $request -> image;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
            $user->image = $filename;
        }else{
//            return $request;
            $user->image = '';
        }
        $user -> first_name = $request -> fname;
        $user -> last_name = $request -> lname;
        $user -> role = $request -> role;
        $user -> salary = $request -> salary;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> address = $request -> address;
        $user -> gender = $request -> gender;
        $user -> dob = $request -> dob;
        $user -> join_date = $request -> join_date;
        $user -> job_type = $request -> job_type;
        $user -> city = $request -> city;
        $user -> age = $request -> age;
        $user -> tin = $request -> tin;
        $user -> sss = $request -> sss;
        $user -> phic = $request -> phic;
        $user -> hmdf = $request -> hmdf;

       // $user -> password = $request -> password;
//        $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status;
    //    dd($user);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('user');
    }
    public function updateotu(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([




            //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);
        $user -> otu_cover = $request -> otu_cover;
        $user -> reghr = $request -> reghr;
        $user -> regph = $request -> regph;
        $user -> ndhr = $request -> ndhr;
        $user -> ndph = $request -> ndph;
        $user -> resthr = $request -> resthr;
        $user -> restph = $request -> restph;
        $user -> restexhr = $request -> restexhr;
        $user -> restexph = $request -> restexph;
        $user -> rhnhr = $request -> rhnhr;
        $user -> rhnph = $request -> rhnph;
        $user -> rhnexhr = $request -> rhnexhr;
        $user -> rhnexph = $request -> rhnexph;
        $user -> rhhr = $request -> rhhr;
        $user -> rhph = $request -> rhph;
        $user -> rhexhr = $request -> rhexhr;
        $user -> rhexph = $request -> rhexph;
        $user -> shnhr = $request -> shnhr;
        $user -> shnph = $request -> shnph;
        $user -> shnexhr = $request -> shnexhr;
        $user -> shnexph = $request -> shnexph;
        $user -> shhr = $request -> shhr;
        $user -> shph = $request -> shph;
        $user -> shexhr = $request -> shexhr;
        $user -> shexph = $request -> shexph;
        $user -> latehr = $request -> latehr;
        $user -> lateph = $request -> lateph;
        $user -> unhr = $request -> unhr;
        $user -> unph = $request -> unph;
        $user -> totde = $request -> totde;
        $user -> rmeal = $request -> rmeal;
        $user -> r2meal = $request -> r2meal;
        $user -> mealph = $request -> mealph;
        $user -> ovat = $request -> ovat;
        $user -> rhtot = $request -> rhtot;
        $user -> shtot = $request -> shtot;
        $user -> resttot = $request -> resttot;
        $user -> abday = $request -> abday;
        $user -> abph = $request -> abph;
        $user -> abmark = $request -> abmark;
        $user -> untot = $request -> untot;


        // $user -> password = $request -> password;
//        $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status;
        //    dd($user);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        try {
        $payment = new Payments();
            $payment -> salary_date = $request -> otu_cover;
        $payment -> username = $request -> username;
        $payment -> salary = $request -> salary;
        $payment -> rate = $request -> rate;
        $payment -> pmin = $request -> pmin;
        $payment -> user_id = $request -> emp_id;
        $payment -> salary_id = $request -> salary_id;
        $payment -> reghr = $request -> reghr;
        $payment -> regph = $request -> regph;
        $payment -> ndhr = $request -> ndhr;
        $payment -> ndph = $request -> ndph;
        $payment -> resthr = $request -> resthr;
        $payment -> restph = $request -> restph;
        $payment -> restexhr = $request -> restexhr;
        $payment -> restexph = $request -> restexph;
        $payment -> rhnhr = $request -> rhnhr;
        $payment -> rhnph = $request -> rhnph;
        $payment -> rhnexhr = $request -> rhnexhr;
        $payment -> rhnexph = $request -> rhnexph;
        $payment -> rhhr = $request -> rhhr;
        $payment -> rhph = $request -> rhph;
        $payment -> rhexhr = $request -> rhexhr;
        $payment -> rhexph = $request -> rhexph;
        $payment -> shnhr = $request -> shnhr;
        $payment -> shnph = $request -> shnph;
        $payment -> shnexhr = $request -> shnexhr;
        $payment -> shnexph = $request -> shnexph;
        $payment -> shhr = $request -> shhr;
        $payment -> shph = $request -> shph;
        $payment -> shexhr = $request -> shexhr;
        $payment -> shexph = $request -> shexph;
        $payment -> latehr = $request -> latehr;
        $payment -> lateph = $request -> lateph;
        $payment -> unhr = $request -> unhr;
        $payment -> unph = $request -> unph;
        $payment -> totde = $request -> totde;
        $payment -> rmeal = $request -> rmeal;
        $payment -> r2meal = $request -> r2meal;
        $payment -> mealph = $request -> mealph;
        $payment -> ovat = $request -> ovat;
        $payment -> rhtot = $request -> rhtot;
        $payment -> shtot = $request -> shtot;
        $payment -> resttot = $request -> resttot;
        $payment -> abday = $request -> abday;
        $payment -> abph = $request -> abph;
        $payment -> abmark = $request -> abmark;
        $payment -> untot = $request -> untot;
        $payment -> pay_id = $request ->pay_id;
        $payment -> save();
        } catch (QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                Toastr::error('Error! OTU For this employee already Exist','Duplicate');
                return redirect()->route('salary.otu',$user->id);
                }
            }
        $user -> salary_id = $payment->id;
        $user -> save();

        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('salary.editpay2',$user->id);

    }
    public function updateotu2(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([




            //  'password' => 'required',
//            'status' => 'required',
        ]);
             $payment = Payments::find($id);
        $payment1 = Payments::findOrFail($payment->salary_id);
            $payment -> rate = $request -> rate;
            $payment -> pmin = $request -> pmin;
            $payment -> reghr = $request -> reghr;
            $payment -> regph = $request -> regph;
            $payment -> ndhr = $request -> ndhr;
            $payment -> ndph = $request -> ndph;
            $payment -> resthr = $request -> resthr;
            $payment -> restph = $request -> restph;
            $payment -> restexhr = $request -> restexhr;
            $payment -> restexph = $request -> restexph;
            $payment -> rhnhr = $request -> rhnhr;
            $payment -> rhnph = $request -> rhnph;
            $payment -> rhnexhr = $request -> rhnexhr;
            $payment -> rhnexph = $request -> rhnexph;
            $payment -> rhhr = $request -> rhhr;
            $payment -> rhph = $request -> rhph;
            $payment -> rhexhr = $request -> rhexhr;
            $payment -> rhexph = $request -> rhexph;
            $payment -> shnhr = $request -> shnhr;
            $payment -> shnph = $request -> shnph;
            $payment -> shnexhr = $request -> shnexhr;
            $payment -> shnexph = $request -> shnexph;
            $payment -> shhr = $request -> shhr;
            $payment -> shph = $request -> shph;
            $payment -> shexhr = $request -> shexhr;
            $payment -> shexph = $request -> shexph;
            $payment -> latehr = $request -> latehr;
            $payment -> lateph = $request -> lateph;
            $payment -> unhr = $request -> unhr;
            $payment -> unph = $request -> unph;
            $payment -> totde = $request -> totde;
            $payment -> rmeal = $request -> rmeal;
            $payment -> r2meal = $request -> r2meal;
            $payment -> mealph = $request -> mealph;
            $payment -> ovat = $request -> ovat;
            $payment -> rhtot = $request -> rhtot;
            $payment -> shtot = $request -> shtot;
            $payment -> resttot = $request -> resttot;
            $payment -> abday = $request -> abday;
            $payment -> abph = $request -> abph;
            $payment -> abmark = $request -> abmark;
            $payment -> untot = $request -> untot;
            $payment -> pay_id = $request ->pay_id;
            $payment -> save();


        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('salary.editpay3',$payment->id);

    }
    public function updatepay(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([




            //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);
        $user -> liquidation = $request -> liquidation;
        $user -> newsemi = $request -> newsemi;
        $user -> etc1 = $request -> etc1;
        $user -> salarywages = $request -> salarywages;
        $user -> mpf = $request -> mpf;
        $user -> sssdeduc = $request -> sssdeduc;
        $user -> phicdeduc = $request -> phicdeduc;
        $user -> hdmfdeduc = $request -> hdmfdeduc;
        $user -> birc = $request -> birc;
        $user -> bire = $request -> bire;
        $user -> totaldeduc = $request -> totaldeduc;
        $user -> etcdeduc = $request -> etcdeduc;
        $user -> ths = $request -> ths;
        $user -> sssemp = $request -> sssemp;
        $user -> sssempval = $request -> sssempval;
        $user -> ecemp = $request -> ecemp;
        $user -> phicemp = $request -> phicemp;
        $user -> hdmfemp = $request -> hdmfemp;
        $user -> totalemp = $request -> totalemp;
        $user -> totalempcost = $request -> totalempcost;
        $user -> paytot = $request -> paytot;
        $user -> tot2 = $request -> tot2;
        $user -> etc2 = $request -> etc2;
        $user -> etc3 = $request -> etc3;
        $user -> tot4 = $request -> tot4;
        $user -> date_cover = $request -> date_cover;
        $user -> net = $request -> net;
        $user -> save();

        $payment = Payments::find($request -> sala);
        $payment -> user_id = $request -> emp_id;
        $payment -> salary_id = $request -> salary_id;
        $payment -> liquidation = $request -> liquidation;
        $payment -> newsemi = $request -> newsemi;
        $payment -> etc1 = $request -> etc1;
        $payment -> salarywages = $request -> salarywages;
        $payment -> mpf = $request -> mpf;
        $payment -> sssdeduc = $request -> sssdeduc;
        $payment -> phicdeduc = $request -> phicdeduc;
        $payment -> hdmfdeduc = $request -> hdmfdeduc;
        $payment -> birc = $request -> birc;
        $payment -> bire = $request -> bire;
        $payment -> totaldeduc = $request -> totaldeduc;
        $payment -> etcdeduc = $request -> etcdeduc;
        $payment -> ths = $request -> ths;
        $payment -> sssemp = $request -> sssemp;
        $payment -> sssempval = $request -> sssempval;
        $payment -> ecemp = $request -> ecemp;
        $payment -> phicemp = $request -> phicemp;
        $payment -> hdmfemp = $request -> hdmfemp;
        $payment -> totalemp = $request -> totalemp;
        $payment -> totalempcost = $request -> totalempcost;
        $payment -> paytot = $request -> paytot;
        $payment -> tot2 = $request -> tot2;
        $payment -> etc2 = $request -> etc2;
        $payment -> etc3 = $request -> etc3;
        $payment -> tot4 = $request -> tot4;
        $payment -> date_cover = $request -> date_cover;
        $payment -> net = $request -> net;
        $payment -> save();





        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('managesalary2');
    }
    public function updatepay3(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([




            //  'password' => 'required',
//            'status' => 'required',
        ]);
        $payment = Payments::find($id);
        $payment1 = Payments::findOrfail($payment->salary_id);
        $payment -> liquidation = $request -> liquidation;
        $payment -> newsemi = $request -> newsemi;
        $payment -> etc1 = $request -> etc1;
        $payment -> salarywages = $request -> salarywages;
        $payment -> mpf = $request -> mpf;
        $payment -> sssdeduc = $request -> sssdeduc;
        $payment -> phicdeduc = $request -> phicdeduc;
        $payment -> hdmfdeduc = $request -> hdmfdeduc;
        $payment -> birc = $request -> birc;
        $payment -> bire = $request -> bire;
        $payment -> totaldeduc = $request -> totaldeduc;
        $payment -> etcdeduc = $request -> etcdeduc;
        $payment -> ths = $request -> ths;
        $payment -> sssemp = $request -> sssemp;
        $payment -> sssempval = $request -> sssempval;
        $payment -> ecemp = $request -> ecemp;
        $payment -> phicemp = $request -> phicemp;
        $payment -> hdmfemp = $request -> hdmfemp;
        $payment -> totalemp = $request -> totalemp;
        $payment -> totalempcost = $request -> totalempcost;
        $payment -> paytot = $request -> paytot;
        $payment -> tot2 = $request -> tot2;
        $payment -> etc2 = $request -> etc2;
        $payment -> etc3 = $request -> etc3;
        $payment -> tot4 = $request -> tot4;
        $payment -> date_cover = $request -> date_cover;
        $payment -> net = $request -> net;
        $payment -> save();





        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('view.list',$payment1->id);
    }
    public function showpdfpass($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        return view('admin.user.pdfpass',compact('user'));
    }
    public function pdfpass(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([




            //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);

        $user -> pdfpass = $request -> pdfpass;


        // $user -> password = $request -> password;
//        $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status;
        //    dd($user);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('PDF-Pass successfully updated!','Success');
        return redirect()->route('managesalary2');
    }
    public function pdfpass2(Request $request, $id)
    {

        $request -> validate([




            //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);

        $user -> pdfpass = $request -> pdfpass;


        // $user -> password = $request -> password;
//        $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status;
        //    dd($user);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('PDF-Pass successfully updated!','Success');
        return redirect()->route('dashboard');
    }
    public function updatedesig(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'designation' => 'required',


            //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);

        $user -> designation = $request -> designation;


        // $user -> password = $request -> password;
//        $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status;
        //    dd($user);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('department.edit1',$user->id);
    }
    public function updating(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'department' => 'required',


            //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);

        $user -> department = $request -> department;


        // $user -> password = $request -> password;
//        $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status;
        //    dd($user);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('salary.edit1',$user->id);
    }
    public function updatesalary(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'salary' => 'required',
            'rate' => 'required',
            'semisalary' => 'required',
            'pmin' => 'required',
            //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);

        $user -> salary = $request -> salary;
        $user -> semisalary = $request -> semisalary;
        $user -> rate = $request -> rate;
        $user -> pmin = $request -> pmin;
        // $user -> password = $request -> password;
//        $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status;
        //    dd($user);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('salary1');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        $user -> delete();
        Toastr::error('Employee successfully deleted!','Deleted');
        return redirect()->route('user');
    }

    public function search(Request $request){
        $users =User::where('username', 'LIKE',"%{$request->search}%")->paginate();
        return view('admin.user.index',compact('users'));
    }

    public function payslip($id){

        $users = Payments::find($id);

        $authu = AUth::user();

        return view('admin.dashboard.view',compact('users','authu'));

    }


}
