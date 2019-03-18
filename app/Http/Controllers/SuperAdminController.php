<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\http\Requests;
use Session;
session_start();

class SuperAdminController extends Controller
{
    public function index()
    {
    	$this->adminAuth();
    	return view('admin.dashboard');
    }

    public function adminAuth()
    {
    	$admin = Session::get('admin_id');
    	if($admin){
    		return;
    	}else{
    		return Redirect::to('/admin')->send();
    	}

    }

    public function logout()
    {
    	Session::flush();
    	return Redirect::to('/admin');
    }
}
