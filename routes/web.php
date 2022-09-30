<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('Mainsite.mainsite');
});
Route::post('addcontact', 'Main\mainsitecontroller@addcontact');

Route::get('userlogin', function () {
    return view('Client.signin');
});

Route::post('userlogin', 'Client\usercontroller@userlogin');

Route::group(['middleware' => 'client'], function () {
    Route::get('userlogout', function () {
        if (Session::has('username')) {
            Session::forget('username');
            Session::forget('name');
            return redirect('userlogin');
        }
    });
    Route::get('dashboad', 'Client\countcontroller@counterning');
    // Route::get('report', 'Client\usercontroller@getreport');
    Route::get('profile', function () {
        return view('Client.profile');
    });

    Route::get('userprofile', 'Client\countcontroller@userprofile');
    Route::post('editprofile', 'Client\countcontroller@editprofile');
    Route::post('editpassword', 'Client\countcontroller@editpassword');

    Route::get('datewise', 'Client\usercontroller@datewise');
    Route::get('today', 'Client\usercontroller@today')->name('today');
    Route::get('yesterday', 'Client\usercontroller@yesterday')->name('yesterday');
    Route::get('thismonth', 'Client\usercontroller@thismonth');
    Route::get('last7days', 'Client\usercontroller@last7days');

    Route::get('export', 'Client\usercontroller@export');

    Route::get('report', 'Client\usercontroller@getreport');
    
    
});
// Route::get('import-export', 'Client\usercontroller@importExport');
// Route::post('import', 'Client\usercontroller@import');


// ==================================Admin=====================
Route::get('signin', function () {
    return view('Admin.signin');
});
Route::post('adminlogin', 'Admin\createusercontroller@adminlogin');

Route::group(['middleware' => 'admin'], function () {
    Route::get('logout', function () {
        if (Session::has('adminname')) {
            Session::forget('adminname');
            Session::forget('name');
            return redirect('signin');
        }
    });

    Route::get('home', 'Admin\createusercontroller@home');
    Route::get('usercard', 'Admin\createusercontroller@getuser');
    Route::get('getuserdetail', 'Admin\createusercontroller@getuserdetail');
    Route::get('createpackage', 'Admin\createusercontroller@finduser');
    Route::get('createuser', 'Admin\createusercontroller@usercreate');
    Route::post('createuser', 'Admin\createusercontroller@createuser');
    Route::post('createpackage', 'Admin\createusercontroller@createpackage');
    Route::get('showpackage', 'Admin\createusercontroller@showpackage');
});



Route::get('searchdata', 'Client\usercontroller@searchdata');
Route::get('demo', 'Client\usercontroller@demo')->name('demo');


Route::get('mydemo', function () {
    return view('Client.demo');
});
