<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class mainsitecontroller extends Controller
{
    public function addcontact(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('Mainsite.mainsite');
        } else {
            $data = $request->all();

            if ($data['fname'] != '' && $data['lname'] != '' && $data['email'] != '' && $data['contact'] != '' && $data['message'] != '') {
                $ans = DB::table('contact')->insert(["fname" => $data['fname'], "lname" => $data['lname'], "email" => $data['email'], "contact" => $data['contact'], "companyname" => $data['companyname'], "message" => $data['message']]);
                return redirect()->back()->with('message', ' Message Send Sucessfully!');
            } else {
                return redirect()->back()->with('error', 'Please Fill All Fields');
            }
        }
    }
}
