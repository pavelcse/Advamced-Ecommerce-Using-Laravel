<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\http\Requests;
use Session;
session_start();

class AdminController extends Controller
{
    public function index()
    {
        $this->loginCheck();
    	return view('admin_login');
    }

    public function login(Request $request)
    {
    	$admin_email    = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')
    	            ->where('admin_email', $admin_email)
    	            ->where('admin_password', $admin_password)
    	            ->first();
    	if ($result) {
    		Session::put('admin_name', $result->admin_name);
    		Session::put('admin_id', $result->admin_id);
    		return Redirect::to('/dashboard');
    	}else{
    		Session::put('message', 'Email or Password Invalid');
    		return Redirect::to('/admin');
    	}
    }

    public function loginCheck()
    {
        $admin = Session::get('admin_id');
        if(!$admin){
            return;
        }else{
            return Redirect::to('/dashboard')->send();
        }
    }
}
