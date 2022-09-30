<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class countcontroller extends Controller
{
    public function counterning(Request $req)
    {
        $id = session::get('username');
        $todaysum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->whereDate('report.days', Carbon::now()->format('Y-m-d'))
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $todayavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->whereDate('report.days', Carbon::now()->format('Y-m-d'))
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');

        $yesterday = date("Y-m-d", strtotime('-1 days'));
        $yesterdaysum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->whereDate('report.days', $yesterday)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $yesterdayavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->whereDate('report.days', $yesterday)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');


        $last7date = \Carbon\Carbon::now()->subDays(7)->format('Y-m-d');
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        $last7daysum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->where('report.days', '>=', $last7date)
            ->where('report.days', '<=', $today)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $last7dayavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->where('report.days', '>=', $last7date)
            ->where('report.days', '<=', $today)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');


        // $date = now()->format('Y-m-d');
        $thismonthsum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->whereMonth('report.days', Carbon::now()->month)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $thismonthavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->whereMonth('report.days', Carbon::now()->month)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');

        $lastmonthsum = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->where('report.days', Carbon::now()->subMonth(1)->month)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->sum('report.estimatedrevenue');

        $lastmonthavg = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->where('report.days', Carbon::now()->subMonth(1)->month)
            ->select('package.*', 'report.days', 'report.estimatedrevenue')
            ->orderBy('report.days', 'DESC')
            ->avg('report.estimatedrevenue');

        return view('Client.dashboad', compact('todaysum', 'todayavg', 'yesterdaysum', 'yesterdayavg', 'last7daysum', 'last7dayavg', 'thismonthsum', 'thismonthavg', 'lastmonthsum', 'lastmonthavg'));
    }


    public function userprofile(Request $req)
    {
        $data = DB::table('user')->where('username', Session::get('username'))->first();
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('Client.profile', compact('data'));
    }

    public function editprofile(Request $req)
    {
        DB::table('user')->where('username', Session::get('username'))->update(['username' => $req['username'], 'name' => $req['name'], 'email' => $req['email'], 'contact' => $req['contact'], 'companyname' => $req['companyname']]);
        Session::put('name', $req['name']);
        Session::put('username', $req['username']);

        return redirect()->back();
    }

    public function editpassword(Request $req)
    {
        $old = Session::get('password');

        if ($old == $req['oldpassword']) {
            DB::table('user')->where('username', Session::get('username'))->update(['password' => $req['newpassword']]);
            Session::put('password', $req['newpassword']);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', "Old And New password are not Same");
        }
    }
}
