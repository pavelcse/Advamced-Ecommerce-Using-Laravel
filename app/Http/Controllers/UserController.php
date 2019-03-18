<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use App\http\Requests;
use Session;
session_start();

class UserController extends Controller
{
    public function index()
    {
    	$this->loginCheck();
        return view('pages.login');
    }

    public function login(Request $request)
    {
    	$user_email    = $request->user_email;
    	$user_password = md5($request->user_password);

    	$result = DB::table('tbl_user')
    	            ->where('user_email', $user_email)
    	            ->where('user_password', $user_password)
    	            ->first();

    	if ($result) {
    		Session::put('user_name', $result->user_name);
    		Session::put('user_id', $result->user_id);
    		return Redirect::to('/checkout');
    	}else{
    		Session::put('message', 'Email or Password Invalid');
    		return Redirect::to('/login');
    	}
    }

    public function signUp(Request $request)
    {
        $data = array();
        $data['user_name']      = $request->user_name;
        $data['user_email']     = $request->user_email;
        $data['user_phome']     = $request->user_phome;
        $data['user_password']  = md5($request->user_password);

        $insert = DB::table('tbl_user')
                    ->insertGetId($data);

    	if ($insert) {
    		Session::put('user_id', $insert);
    		Session::put('user_name', $request->user_name);
    		return Redirect::to('/checkout');
    	}
    }

    public function logout()
    {
    	Session::flush();
    	return Redirect::to('/login');
    }

    public function loginCheck()
    {
    	$user = Session::get('user_id');
    	if($user){
    		return Redirect::to('/checkout')->send();
    	}
    }


}
