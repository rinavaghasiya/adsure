<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;

class usercontroller extends Controller
{
    function userlogin(Request $req)
    {
        $data = DB::table('user')->where('username', $req->username)->where('password', $req->password)->first();
        if ($data == "") {
            return redirect()->back()->with('loginerror', 'Invalid Username or Password');
        } else {
            Session::put('username', $data->username);
            Session::put('name', $data->name);
            Session::put('password', $data->password);
            return redirect('dashboad');
        }


        $admin = DB::table('admin')->where('adminname', $req->username)->where('password', $req->password)->first();
        if ($admin == "") {
            return redirect()->back()->with('loginerror', 'Invalid Admin Username or Password');
        } else {
            Session::put('adminname', $admin->adminname);
            Session::put('aname', $admin->name);
            return redirect('home');
        }
    }

    // function getreport(Request $req)
    // {
    //     $items = $req->items ?? 10;
    //     $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
    //     $search = $req->input('search');

    //     // $date_search=$req->input('date_search');
    //     // echo $date_search;
    //     // die;

    //     $data = DB::table('user')
    //         ->join('package', 'package.username', '=', 'user.username')
    //         ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
    //         ->where('user.username', Session::get('username'))
    //         ->where(function ($q) use ($requestData, $search) {
    //             foreach ($requestData as $field)
    //                 $q->orWhere($field, 'like', "%{$search}%");
    //         })
    //         ->select('user.*', 'package.*', 'report.*')
    //         ->orderBy('report.days', 'DESC')
    //         ->paginate($items);
    //     return view('Client.report', ['data' => $data, 'search' => $search, 'items' => $items]);
    // }


    function getreport(Request $req)
    {
        $items = $req->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $req->input('search');

        $date_search = $req->input('date_search');
        // echo $date_search;
        // die;

        if ($date_search == 'todays') {
            $data = DB::table('user')
                ->join('package', 'package.username', '=', 'user.username')
                ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                ->where('user.username', Session::get('username'))
                ->whereDate('report.days', Carbon::now()->format('Y-m-d'))

                ->where(function ($q) use ($requestData, $search) {
                    foreach ($requestData as $field)
                        $q->orWhere($field, 'like', "%{$search}%");
                })
                ->select('user.*', 'package.*', 'report.*')
                ->orderBy('report.days', 'DESC')
                ->paginate($items);
        } elseif ($date_search == 'yesterdays') {
            $yesterday = date("y-m-d", strtotime('-1 days'));

            $data = DB::table('user')
                ->join('package', 'package.username', '=', 'user.username')
                ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                ->where('user.username', Session::get('username'))

                ->whereDate('report.days', $yesterday)

                ->where(function ($q) use ($requestData, $search) {
                    foreach ($requestData as $field)
                        $q->orWhere($field, 'like', "%{$search}%");
                })
                ->select('user.*', 'package.*', 'report.*')
                ->orderBy('report.days', 'DESC')
                ->paginate($items);
        } elseif ($date_search == 'thismonth') {
            $data = DB::table('user')
                ->join('package', 'package.username', '=', 'user.username')
                ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                ->where('user.username', Session::get('username'))

                ->whereMonth('report.days', Carbon::now()->month)

                ->where(function ($q) use ($requestData, $search) {
                    foreach ($requestData as $field)
                        $q->orWhere($field, 'like', "%{$search}%");
                })
                ->select('user.*', 'package.*', 'report.*')
                ->orderBy('report.days', 'DESC')
                ->paginate($items);
        } elseif ($date_search == 'thisweek') {
            $last7date = \Carbon\Carbon::now()->subDays(7)->format('Y-m-d');
            $today = \Carbon\Carbon::now()->format('Y-m-d');
            // echo $last7date;
            // echo $today;
            // die;

            $data = DB::table('user')
                ->join('package', 'package.username', '=', 'user.username')
                ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                ->where('user.username', Session::get('username'))

                ->where('report.days', '>=', $last7date)
                ->where('report.days', '<=', $today)

                ->where(function ($q) use ($requestData, $search) {
                    foreach ($requestData as $field)
                        $q->orWhere($field, 'like', "%{$search}%");
                })
                ->select('user.*', 'package.*', 'report.*')
                ->orderBy('report.days', 'DESC')
                ->paginate($items);
        } else {
            $data = DB::table('user')
                ->join('package', 'package.username', '=', 'user.username')
                ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                ->where('user.username', Session::get('username'))
                ->where(function ($q) use ($requestData, $search) {
                    foreach ($requestData as $field)
                        $q->orWhere($field, 'like', "%{$search}%");
                })
                ->select('user.*', 'package.*', 'report.*')
                ->orderBy('report.days', 'DESC')
                ->paginate($items);
        }
        return view('Client.report', ['data' => $data, 'search' => $search, 'items' => $items]);
    }

    function datewise(Request $req)
    {
        $items = $req->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $req->input('search');

        $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))

            ->whereBetween('report.days', [$req->fromdate, $req->todate])
            ->where(function ($q) use ($requestData, $search) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$search}%");
            })

            // ->where('report.date', '>=', Carbon::now()->subMonth(2))

            ->select('user.*', 'package.*', 'report.*')
            ->orderBy('report.days', 'DESC')
            ->paginate($items);

        return view('Client.report', ['data' => $data, 'search' => $search, 'items' => $items]);
    }

    function today(Request $req)
    {
        $items = $req->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $req->input('search');

        $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->whereDate('report.days', Carbon::now()->format('Y-m-d'))

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

        return view('Client.report', ['data' => $data, 'search' => $search, 'items' => $items]);
    }

    function yesterday(Request $req)
    {
        $items = $req->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $req->input('search');

        $yesterday = date("y-m-d", strtotime('-1 days'));

        $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))

            ->whereDate('report.days', $yesterday)

            ->where(function ($q) use ($requestData, $search) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$search}%");
            })
            ->select('user.*', 'package.*', 'report.*')
            ->orderBy('report.days', 'DESC')
            ->paginate($items);

        return view('Client.report', ['data' => $data, 'search' => $search, 'items' => $items]);
    }


    function thismonth(Request $req)
    {
        $items = $req->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $req->input('search');
        $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))

            ->whereMonth('report.days', Carbon::now()->month)

            ->where(function ($q) use ($requestData, $search) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$search}%");
            })
            ->select('user.*', 'package.*', 'report.*')
            ->orderBy('report.days', 'DESC')
            ->paginate($items);

        // echo "<pre>";
        // print_r(Carbon::now()->month);
        // die;

        return view('Client.report', ['data' => $data, 'search' => $search, 'items' => $items]);
    }


    function last7days(Request $req)
    {
        $items = $req->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $req->input('search');

        $last7date = \Carbon\Carbon::now()->subDays(7)->format('Y-m-d');
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        // echo $last7date;
        // echo $today;
        // die;

        $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))

            ->where('report.days', '>=', $last7date)
            ->where('report.days', '<=', $today)

            ->where(function ($q) use ($requestData, $search) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$search}%");
            })
            ->select('user.*', 'package.*', 'report.*')
            ->orderBy('report.days', 'DESC')
            ->paginate($items);


        return view('Client.report', ['data' => $data, 'search' => $search, 'items' => $items]);
    }

    public function export()
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }
    public function importExport()
    {
        return view('Client.import');
    }
    public function import(Request $req)
    {
        Excel::import(new ImportUsers, $req->file('file'));

        return back();
    }





    public function searchdata(Request $request)
    {
        $items = $request->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $request->input('search');
        $date_search = $request->input('date_search');

        if ($request->ajax()) {
            if ($date_search == 'todays') {
                $data = DB::table('user')
                    ->join('package', 'package.username', '=', 'user.username')
                    ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                    ->where('user.username', Session::get('username'))
                    ->whereDate('report.days', Carbon::now()->format('Y-m-d'))

                    ->select('user.*', 'package.*', 'report.*')
                    ->orderBy('report.days', 'DESC')
                    ->get();
            } elseif ($date_search == 'yesterdays') {
                $yesterday = date("y-m-d", strtotime('-1 days'));

                $data = DB::table('user')
                    ->join('package', 'package.username', '=', 'user.username')
                    ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                    ->where('user.username', Session::get('username'))

                    ->whereDate('report.days', $yesterday)


                    ->select('user.*', 'package.*', 'report.*')
                    ->orderBy('report.days', 'DESC')
                    ->get();
            } elseif ($date_search == 'thismonth') {
                $data = DB::table('user')
                    ->join('package', 'package.username', '=', 'user.username')
                    ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                    ->where('user.username', Session::get('username'))

                    ->whereMonth('report.days', Carbon::now()->month)


                    ->select('user.*', 'package.*', 'report.*')
                    ->orderBy('report.days', 'DESC')
                    ->get();
            } elseif ($date_search == 'thisweek') {
                $last7date = \Carbon\Carbon::now()->subDays(7)->format('Y-m-d');
                $today = \Carbon\Carbon::now()->format('Y-m-d');
                // echo $last7date;
                // echo $today;
                // die;

                $data = DB::table('user')
                    ->join('package', 'package.username', '=', 'user.username')
                    ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                    ->where('user.username', Session::get('username'))

                    ->where('report.days', '>=', $last7date)
                    ->where('report.days', '<=', $today)


                    ->select('user.*', 'package.*', 'report.*')
                    ->orderBy('report.days', 'DESC')
                    ->get();
            } else {
                $data = DB::table('user')
                    ->join('package', 'package.username', '=', 'user.username')
                    ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                    ->where('user.username', Session::get('username'))
                    ->where(function ($q) use ($requestData, $search) {
                        foreach ($requestData as $field)
                            $q->orWhere($field, 'like', "%{$search}%");
                    })
                    ->select('user.*', 'package.*', 'report.*')
                    ->orderBy('report.days', 'DESC')
                    ->get();

                // echo "<pre>";
                // print_r($data);
                // die;
            }






            $output = "";
            $i = 0;
            $impression = 0;
            $clicks = 0;
            $ctr = 0;
            $ad = 0;
            $match = 0;
            $revenue = 0;
            $aecpm = 0;
            if ($data) {

                foreach ($data as $key => $user) {
                    $impression += str_replace(',', '', $user->adimpressions);
                    $clicks += str_replace(',', '', $user->clicks);
                    $ctr += str_replace('%', '', $user->ctr);
                    $ad += str_replace(',', '', $user->adrequests);
                    $match += str_replace(',', '', $user->matchedrequests);
                    $revenue += str_replace(',', '', $user->estimatedrevenue);
                    $aecpm += $user->adecpm;

                    $output .= '<tr>' .
                        '<td>' . $user->days . '</td>' .
                        '<td>' . $user->mobileappid . '</td>' .
                        '<td>' . $user->dfpadunits . '</td>' .
                        '<td>' . $user->adrequests  . '</td>' .
                        '<td>' . $user->matchedrequests . '</td>' .
                        '<td>' . $user->clicks  . '</td>' .
                        '<td>' . $user->ctr . '</td>' .
                        '<td>' . $user->estimatedrevenue  . '</td>' .
                        '<td>' . $user->adimpressions . '</td>' .
                        '<td>' . $user->adecpm  . '</td>' .
                        '</tr>';

                    $i++;
                }
                $output .= '<tr>' .
                    '<td colspan="3"><strong>Total:</strong></td>' .
                    '<td>' . $ad . '</td>' .
                    '<td>' . $match . '</td>' .
                    '<td>' . $clicks . '</td>' .
                    '<td>' . round($ctr / $i, 2)  . '</td>' .
                    '<td>' . $revenue . '</td>' .
                    '<td>' . $impression  . '</td>' .
                    '<td>' . round($aecpm / $i, 2)  . '</td>' .
                    '</tr>';
            }
            return Response($output);
        } else {
            $data = DB::table('user')
                ->join('package', 'package.username', '=', 'user.username')
                ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                ->where('user.username', Session::get('username'))
                ->select('user.*', 'package.*', 'report.*')
                ->orderBy('report.days', 'DESC')
                ->paginate($items);
            // echo "<pre>";
            // print_r($data);
            // die;
            return view('Client.report1', ['data' => $data, 'search' => $search, 'items' => $items]);
        }
    }

    public function demo(Request $request)
    {
        $items = $request->items ?? 10;
        $requestData = ['report.mobileappid', 'dfpadunits', 'adrequests', 'matchedrequests', 'clicks', 'estimatedrevenue', 'adimpressions', 'adecpm', 'ctr'];
        $search = $request->input('search');
        // $date_search = $request->input('date_search');
        $mylist = $request->input('mylist');
        if (!empty($mylist)) {
            $data = DB::table('user')
                ->join('package', 'package.username', '=', 'user.username')
                ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
                ->where('user.username', Session::get('username'))
                ->where('report.adrequests', $mylist)
                ->where(function ($q) use ($requestData, $search) {
                    foreach ($requestData as $field)
                        $q->orWhere($field, 'like', "%{$search}%");
                })
                ->select('user.*', 'package.*', 'report.*')
                ->orderBy('report.days', 'DESC')
                ->paginate(100);    
        }
        else{
            $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->where(function ($q) use ($requestData, $search) {
                foreach ($requestData as $field)
                    $q->orWhere($field, 'like', "%{$search}%");
            })
            ->select('user.*', 'package.*', 'report.*')
            ->orderBy('report.days', 'DESC')
            ->paginate(100);
        }
        return view('Client.report1', ['data' => $data, 'search' => $search, 'items' => $items]);
    }
    
    // public function filter(Request $request)
    // {   $items = $request->items ?? 10;
    //     $mylist = $request->input('mylist');
    //     // $filter = [$location->location, $gender->gender];

    //     // echo "<pre>";
    //     // print_r($mylist);
    //     // die;
    //     dd($mylist);

       

    //     if (!empty($mylist)) {
    //         $data = DB::table('user')
    //             ->join('package', 'package.username', '=', 'user.username')
    //             ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
    //             ->where('user.username', Session::get('username'))
    //             ->where('report.adrequests', $mylist)
    //             ->select('user.*', 'package.*', 'report.*')
    //             ->orderBy('report.days', 'DESC')
    //             ->paginate($items);
               
    //     } else {
    //         $data = DB::table('user')
    //             ->join('package', 'package.username', '=', 'user.username')
    //             ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
    //             ->where('user.username', Session::get('username'))
    //             ->select('user.*', 'package.*', 'report.*')
    //             ->orderBy('report.days', 'DESC')
    //             ->paginate($items);

            
    //     }
    //     return view('Client.report1', ['data' => $data, 'items' => $items]);
    // }
}
