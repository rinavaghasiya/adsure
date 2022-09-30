<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class createusercontroller extends Controller
{
    function home(Request $req)
    {
        $todaysum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->whereDate('report.days', Carbon::now()->format('Y-m-d'))
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $todayavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->whereDate('report.days', Carbon::now()->format('Y-m-d'))
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');

        $yesterday = date("Y-m-d", strtotime('-1 days'));
        $yesterdaysum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->whereDate('report.days', $yesterday)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $yesterdayavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->whereDate('report.days', $yesterday)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');

        $last7date = \Carbon\Carbon::now()->subDays(7)->format('Y-m-d');
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        $last7daysum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('report.days', '>=', $last7date)
            ->where('report.days', '<=', $today)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $last7dayavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('report.days', '>=', $last7date)
            ->where('report.days', '<=', $today)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');


        $thismonthsum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->whereMonth('report.days', Carbon::now()->month)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $thismonthavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->whereMonth('report.days', Carbon::now()->month)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');


        $lastmonthsum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('report.days', Carbon::now()->subMonth(1)->month)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $lastmonthavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('report.days', Carbon::now()->subMonth(1)->month)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');


        return view('Admin.home', compact('todaysum', 'todayavg', 'yesterdaysum', 'yesterdayavg', 'last7daysum', 'last7dayavg', 'thismonthsum', 'thismonthavg', 'lastmonthsum', 'lastmonthavg'));
    }

    function adminlogin(Request $req)
    {
        $admin = DB::table('admin')->where('adminname', $req->adminname)->where('password', $req->password)->first();
        if ($admin == "") {
            return redirect()->back()->with('loginerror', 'Invalid Admin Username or Password');
        } else {
            Session::put('adminname', $admin->adminname);
            Session::put('name', $admin->name);

            return redirect('home');
        }
    }

    public function usercreate(Request $req)
    {
        $data = DB::table('user')->paginate(7);
        return view('Admin.createuser', compact('data'));
    }

    function createuser(Request $req)
    {
        $email = DB::table('user')->where('email', $req['email'])->first();
        if ($email == "") {
            $in = DB::table('user')->insert(['username' => $req['username'], 'name' => $req['name'], 'password' => $req['password'], 'email' => $req['email'], 'contact' => $req['contact'], 'companyname' => $req['companyname']]);
            return redirect()->back()->with('createuser', 'User Created!');
        } else {
            return redirect()->back()->with('emailerror', 'Entered Email Already Exist!');
        }
    }

    public function finduser()
    {
        $user = DB::table('user')->get();
        $package = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->orderBy('package.created_at', 'DESC')
            ->paginate(7);

        return view('Admin.createpackage', compact('user', 'package'));
    }
    public function createpackage(Request $req)
    {
        $package = DB::table('package')->where('mobileappid', $req['packagename'])->first();
        if ($package == "") {
            $in = DB::table('package')->insert(['mobileappid' => $req['packagename'], 'username' => $req['username']]);
            return redirect()->back()->with('createpackage', 'Package Created!');
        } else {
            return redirect()->back()->with('createpackageerror', 'Package Already Exist!');
        }
    }

    public function getuser()
    {
        $user = DB::table('user')->get();
        return view('Admin.usercard', ['user' => $user]);
    }

    public function getuserdetail(Request $req)
    {
        $u_id = $_REQUEST['uid'];
        $items = $req->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $req->input('search');

        $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', $u_id)
            ->where(function ($q) use ($requestData, $search) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$search}%");
            })
            ->select('user.*', 'package.*', 'report.*')
            ->orderBy('report.days', 'DESC')
            ->paginate($items);


        // echo "<pre>";
        // print_r($data);
        // die;

        return view('Admin.edituser')->with(['uid' => $u_id, 'data' => $data, 'items' => $items, "search" => $search]);
    }


    public function showpackage(Request $req)
    {
        $u_id = $_REQUEST['uid'];

        $items = $req->items ?? 10;
        $search = $req->input('search');
        $requestData = ['package.mobileappid', 'package.username'];
        $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->where('user.username', $u_id)
            ->where(function ($q) use ($requestData, $search) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$search}%");
            })
            ->paginate($items);



        // echo "<pre>";
        // print_r($data);
        // die;
        return view('Admin.showpackage')->with(['uid' => $u_id, 'data' => $data, "search" => $search, 'items' => $items]);
    }
}
