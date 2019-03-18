<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\http\Requests;
use Session;
session_start();

class HeaderController extends Controller
{
    public function index(){
    	$get_links = DB::table('tbl_social')
    	                ->where('id', 1)
    	                ->get();
    	return view('admin.social_add')->with('all_links', $get_links);
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['facebook']       = $request->facebook;
        $data['twitter']        = $request->twitter;
        $data['linkedin']       = $request->linkedin;
        $data['google_plus']    = $request->google_plus;
        $data['youtube']        = $request->youtube;

        DB::table('tbl_social')
            ->where('id', 1)
            ->update($data);
        Session::put('message', 'Links Updated Successfully....');
        return Redirect::to('/social-add');
    }
}
