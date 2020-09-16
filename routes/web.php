<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});



Route::group(['middleware' => 'auth'], function (){

    Route::get('/dashboard',              [ 'as'=>'dashboard',            'uses' => 'DashboardController@index']);

    Route::get('user',                   [ 'as'=>'user',                 'uses' => 'UserController@index']);
    Route::get('user/create',            [ 'as'=>'user.create',          'uses' => 'UserController@create']);
    Route::post('user/store',            [ 'as'=>'user.store',           'uses' => 'UserController@store']);
    Route::get('user/view/{id}',         [ 'as'=>'user.view',            'uses' => 'UserController@view']);
    Route::get('user/edit/{id}',         [ 'as'=>'user.edit',            'uses' => 'UserController@edit']);
    Route::post('user/update/{id}',           [ 'as'=>'user.update',     'uses' => 'UserController@update']);
    Route::get('user/delete/{id}',       [ 'as'=>'user.delete',          'uses' => 'UserController@delete']);
    Route::get('user/search',       [ 'as'=>'user.search',      'uses' => 'UserController@index']);

    Route::get('employee',               [ 'as'=>'employee',              'uses' => 'EmployeeController@index']);
    Route::get('employee/create',        [ 'as'=>'employee.create',       'uses' => 'EmployeeController@create']);
    Route::post('employee/store',        [ 'as'=>'employee.store',        'uses' => 'EmployeeController@store']);
    Route::get('employee/edit/{id}',     [ 'as'=>'employee.edit',         'uses' => 'EmployeeController@edit']);
    Route::post('employee/update/{id}',  [ 'as'=>'employee.update',       'uses' => 'EmployeeController@update']);
    Route::get('employee/delete/{id}',   [ 'as'=>'employee.delete',       'uses' => 'EmployeeController@delete']);

    Route::get('designation1',               [ 'as'=>'designation1',              'uses' => 'UserController@designation']);
    Route::get('designation/create',        [ 'as'=>'designation.create',       'uses' => 'DesignationController@create']);
    Route::post('designation/store',        [ 'as'=>'designation.store',        'uses' => 'DesignationController@store']);
    Route::get('designation/edit1/{id}',     [ 'as'=>'designation.edit1',         'uses' => 'UserController@updatedept']);
    Route::post('designation/update1/{id}',  [ 'as'=>'user.updatedesig',       'uses' => 'UserController@updatedesig']);
    Route::get('designation/delete/{id}',   [ 'as'=>'designation.delete',       'uses' => 'DesignationController@delete']);

    Route::get('department1',               [ 'as'=>'department1',              'uses' => 'UserController@department']);
    Route::get('department/create',        [ 'as'=>'department.create',       'uses' => 'DepartmentController@create']);
    Route::post('department/store',        [ 'as'=>'department.store',        'uses' => 'DepartmentController@store']);
    Route::get('department/edit1/{id}',     [ 'as'=>'department.edit1',         'uses' => 'UserController@updesig']);
    Route::post('department/update1/{id}',  [ 'as'=>'department.update1',       'uses' => 'UserController@updating']);
    Route::get('department/delete/{id}',   [ 'as'=>'department.delete',       'uses' => 'DepartmentController@delete']);

    Route::get('designation',               [ 'as'=>'designation',              'uses' => 'DesignationController@index']);
    Route::get('designation/create',        [ 'as'=>'designation.create',       'uses' => 'DesignationController@create']);
    Route::post('designation/store',        [ 'as'=>'designation.store',        'uses' => 'DesignationController@store']);
    Route::get('designation/edit/{id}',     [ 'as'=>'designation.edit',         'uses' => 'DesignationController@edit']);
    Route::post('designation/update/{id}',  [ 'as'=>'designation.update',       'uses' => 'DesignationController@update']);
    Route::get('designation/delete/{id}',   [ 'as'=>'designation.delete',       'uses' => 'DesignationController@delete']);


    Route::get('salary1',               [ 'as'=>'salary1',              'uses' => 'UserController@salary']);
    Route::get('salary/create',        [ 'as'=>'salary.create',       'uses' => 'SalaryController@create']);
    Route::post('salary/store',        [ 'as'=>'salary.store',        'uses' => 'SalaryController@store']);
    Route::get('salary/edit1/{id}',     [ 'as'=>'salary.edit1',         'uses' => 'UserController@editsalary']);
    Route::post('salary/update1/{id}',  [ 'as'=>'salary.update1',       'uses' => 'UserController@updatesalary']);
    Route::get('salary/delete/{id}',   [ 'as'=>'salary.delete',       'uses' => 'SalaryController@delete']);

    Route::get('city',               [ 'as'=>'city',              'uses' => 'CityController@index']);
    Route::get('city/create',        [ 'as'=>'city.create',       'uses' => 'CityController@create']);
    Route::post('city/store',        [ 'as'=>'city.store',        'uses' => 'CityController@store']);
    Route::get('city/edit/{id}',     [ 'as'=>'city.edit',         'uses' => 'CityController@edit']);
    Route::post('city/update/{id}',  [ 'as'=>'city.update',       'uses' => 'CityController@update']);
    Route::get('city/delete/{id}',   [ 'as'=>'city.delete',       'uses' => 'CityController@delete']);

    Route::get('shift',               [ 'as'=>'shift',              'uses' => 'ShiftController@index']);
    Route::get('shift/create',        [ 'as'=>'shift.create',       'uses' => 'ShiftController@create']);
    Route::post('shift/store',        [ 'as'=>'shift.store',        'uses' => 'ShiftController@store']);
    Route::get('shift/edit/{id}',     [ 'as'=>'shift.edit',         'uses' => 'ShiftController@edit']);
    Route::post('shift/update/{id}',  [ 'as'=>'shift.update',       'uses' => 'ShiftController@update']);
    Route::get('shift/delete/{id}',   [ 'as'=>'shift.delete',       'uses' => 'ShiftController@delete']);

    Route::get('leave',               [ 'as'=>'leave',              'uses' => 'LeaveController@index']);
    Route::get('leave/create',        [ 'as'=>'leave.create',       'uses' => 'LeaveController@create']);///
    Route::post('leave/store',        [ 'as'=>'leave.store',        'uses' => 'LeaveController@store']);
    Route::get('leave/search',       [ 'as'=>'leave.search',      'uses' => 'LeaveController@index']);
//    Route::get('leave/edit/{id}',     [ 'as'=>'leave.edit',         'uses' => 'LeaveController@edit']);
//    Route::post('leave/update/{id}',  [ 'as'=>'leave.update',       'uses' => 'LeaveController@update']);
//    Route::get('leave/delete/{id}',   [ 'as'=>'leave.delete',       'uses' => 'LeaveController@delete']);
    Route::post('leave/approve/{id}',        [ 'as'=>'leave.approve',        'uses' => 'LeaveController@approve']);
    Route::post('leave/paid/{id}',        [ 'as'=>'leave.paid',        'uses' => 'LeaveController@paid']);
//    Route::post('leave/pending/{id}',        [ 'as'=>'leave.pending',        'uses' => 'LeaveController@pending']);
//    Route::post('leave/reject/{id}',        [ 'as'=>'leave.reject',        'uses' => 'LeaveController@reject']);

    Route::get('total-leave',               [ 'as'=>'total-leave',              'uses' => 'TotalLeaveController@index']);
    Route::get('total-leave/create',        [ 'as'=>'total-leave.create',       'uses' => 'TotalLeaveController@create']);
    Route::post('total-leave/store',        [ 'as'=>'total-leave.store',        'uses' => 'TotalLeaveController@store']);
    Route::get('total-leave/edit/{id}',     [ 'as'=>'total-leave.edit',         'uses' => 'TotalLeaveController@edit']);
    Route::post('total-leave/update/{id}',  [ 'as'=>'total-leave.update',       'uses' => 'TotalLeaveController@update']);
    Route::get('total-leave/delete/{id}',   [ 'as'=>'total-leave.delete',       'uses' => 'TotalLeaveController@delete']);

    Route::get('managesalary',                    [ 'as'=>'managesalary',                   'uses' => 'ManagesalaryController@index']);


    Route::get('managesalary/detail/{id}',        [ 'as'=>'managesalary.detail',           'uses' => 'ManagesalaryController@detail']);
    Route::post('managesalary/store',             [ 'as'=>'managesalary.store',           'uses' => 'ManagesalaryController@store']);
    Route::get('managesalary/salarylist',         [ 'as'=>'managesalary.salarylist',           'uses' => 'SalaryschedController@index']);
    Route::get('managesalary/generate',         [ 'as'=>'managesalary.generate',           'uses' => 'SalaryschedController@generate']);
    Route::get('managesalary/makepayment',        [ 'as'=>'managesalary.makepayment',               'uses' => 'ManagesalaryController@makepayment']);
    Route::post('managesalary/make-advance',      [ 'as'=>'managesalary.makeadvance',               'uses' => 'ManagesalaryController@makeAdvance']);
//    Route::post('managesalary/search',            [ 'as'=>'managesalary.search',               'uses' => 'ManagesalaryController@search']);
    Route::get('managesalary/salarylist2',         [ 'as'=>'managesalary.salarylist2',           'uses' => 'SalaryschedController@indexnew']);

    Route::get('event', ['as'=>'event', 'uses' => 'EventController@event']);
    Route::post('event/store', ['as'=>'event.store', 'uses' => 'EventController@store']);

    Route::get('calendar',['as'=>'calendar', 'uses' => 'CalendarController@index']);
    Route::get('calendar/add',['as'=>'calendar.add', 'uses' =>'CalendarController@add']);
    Route::post('calendar/store',['as'=>'calendar.store', 'uses' =>'CalendarController@store']);

    Route::get('profile',                   [ 'as'=>'profile',                   'uses' => 'ProfileController@index']);
    Route::get('change-password',           [ 'as'=>'change.password',           'uses' => 'ProfileController@changePassword']);

    Route::match(['get','match'],        'update-password',           [ 'as'=>'update.password',           'uses' => 'ProfileController@updatePassword']);

    Route::get('downloads',                 [ 'as'=>'download',                   'uses' => 'DownloadController@index']);


    Route::get('managesalary2',                    [ 'as'=>'managesalary2',                   'uses' => 'SalaryschedController@viewall']);
    Route::get('manage/payroll/{id}',         [ 'as'=>'salary.editpay',            'uses' => 'SalaryschedController@show']);

    Route::get('view/{id}',                    [ 'as'=>'viewpay',                   'uses' => 'UserController@payslip']);

    Route::get('pdfview',array('as'=>'pdfview','uses'=>'DownloadController@pdfview'));

     Route::get('managesalary/create',                    [ 'as'=>'managesalary.create',                   'uses' => 'SalaryschedController@create']);
    Route::post('managesalary/create/store',                    [ 'as'=>'managesalary.salarystore',                   'uses' => 'SalaryschedController@store']);
    Route::get('pdfviewall',array('as'=>'pdfviewall','uses'=>'DownloadController@pdfviewall'));
    Route::get('pdf/pdfexport/{id}',              'DownloadController@pdfexport');

    Route::get('pdfpass/{id}',                    [ 'as'=>'pdfpass',                   'uses' => 'UserController@showpdfpass']);
    Route::post('pdfpass/store/{id}',                    [ 'as'=>'pdfpass.store',                   'uses' => 'UserController@pdfpass']);
    Route::post('pdfpass2/store/{id}',                    [ 'as'=>'pdfpass2.store',                   'uses' => 'UserController@pdfpass2']);


    Route::get('managesalary/create2',                    [ 'as'=>'managesalary.create2',                   'uses' => 'SalaryschedController@create2']);
    Route::post('managesalary/create2/store',                    [ 'as'=>'managesalary.salarystore2',                   'uses' => 'SalaryschedController@store2']);
    Route::get('managesalary/viewlist/{id}',         [ 'as'=>'view.list',            'uses' => 'SalaryschedController@show2']);
    Route::get('manage/otu/{id}',         [ 'as'=>'salary.otu',            'uses' => 'SalaryschedController@showotu']);

    Route::get('managesalary/payroll2/{id}',         [ 'as'=>'salary.editpay2',            'uses' => 'SalaryschedController@showpay']);
    Route::post('managesalary/updateotu/store/{id}',           [ 'as'=>'user.updateotu',     'uses' => 'UserController@updateotu']);
    Route::post('managesalary/updatepay/store/{id}',           [ 'as'=>'user.updatepay',     'uses' => 'UserController@updatepay']);
    Route::get('managesalary/edit-otu/{id}',         [ 'as'=>'salary.edit.otu',            'uses' => 'SalaryschedController@editotu']);
    Route::post('managesalary/edit-otu/store/{id}',           [ 'as'=>'user.updateotu2',     'uses' => 'UserController@updateotu2']);
    Route::get('managesalary/edit-payroll2/{id}',         [ 'as'=>'salary.editpay3',            'uses' => 'SalaryschedController@editpay3']);
    Route::post('managesalary/edit-payroll2/store/{id}',           [ 'as'=>'user.updatepay3',     'uses' => 'UserController@updatepay3']);
    Route::get('managesalary/summary/{id}',         [ 'as'=>'pdfviewall1',            'uses' => 'DownloadController@pdfviewall1']);

    Route::get('user/salarylist/',         [ 'as'=>'mysalary',            'uses' => 'SalaryschedController@indexsalary']);
    Route::get('pdf/set/',         [ 'as'=>'pdfnew',            'uses' => 'UserController@enterpass']);
    Route::post('pdf/set/check',           [ 'as'=>'pdfnew.set',     'uses' => 'UserController@passcheck']);


    Route::get('pass', function () {
        $user = Auth::user();
        if (session('password_entered')) {
            return view('admin.dashboard.pdfpass',compact('user'));
        }

        return view('admin.enter_password_page');
    });

    Route::post('pass/okay', function () {
        $user = Auth::user();
        $password_to_website = Auth::user()->password;
        $password = request('password');
        if (Hash::check($password, Auth::user()->password)) {
            // The passwords match...

            session(['password_entered' => true]);
            return view('admin.dashboard.pdfpass',compact('user'));
        }

        return back()->withInput()->withErrors(['password' => 'Password is incorect']);
    });

});
Auth::routes();
Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/errors/405', 'LeaveController@error405')->name('error405');





