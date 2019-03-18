<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\http\Requests;
use Session;
session_start();

class BrandController extends Controller
{
    public function index()
    {
        $this->adminAuth(); // For UnAuthorizing Login
    	return view('admin.brand_add');
    }

    public function brandSave(Request $request)
    {
    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_description'] = $request->brand_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_brand')->insert($data);
    	Session::put('message', 'Brand Added Successfully.....');
    	return Redirect('/brand-add');
    }

    public function brandList()
    {
        $this->adminAuth(); // For UnAuthorizing Login
        $get_brand = DB::table('tbl_brand')->get();
        return view('admin.brand_list')->with('brand_data', $get_brand);
    }

    public function unpublish($brand_id)
    {
    	DB::table('tbl_brand')
    	    ->where('brand_id', $brand_id)
    	    ->update(['publication_status' => 0]);
    	Session::put('message', 'Brand UnPublished Successfully.....');
    	return redirect()->back();
    }

    public function publish($brand_id)
    {
    	DB::table('tbl_brand')
    	    ->where('brand_id', $brand_id)
    	    ->update(['publication_status' => 1]);
    	Session::put('message', 'Brand Published Successfully.....');
    	return redirect()->back();
    }

    public function brandEdit($brand_id)
    {
        $this->adminAuth(); // For UnAuthorizing Login
    	$edit_brand = DB::table('tbl_brand')
    	                    ->where('brand_id', $brand_id)
    	                    ->first();
        return view('admin.brand_edit')->with('brand_info', $edit_brand);
    }

    public function brandUpdate(Request $request, $brand_id)
    {
    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_description'] = $request->brand_description;

        DB::table('tbl_brand')
    	    ->where('brand_id', $brand_id)
    	    ->update($data);
    	Session::put('message', 'Brand Updated Successfully.....');
    	return redirect()->back();
    }

    public function brandDelete($brand_id)
    {
    	DB::table('tbl_brand')
    	    ->where('brand_id', $brand_id)
    	    ->delete();
    	Session::put('message', 'Brand Deleted Successfully.....');
    	return redirect()->back();
    	//return Redirect::to('/category-list');
    }

    public function adminAuth() // For UnAuthorizing Login
    {
        $admin = Session::get('admin_id');
        if($admin){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }

    }

}
