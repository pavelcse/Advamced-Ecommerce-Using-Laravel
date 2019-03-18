<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\http\Requests;
use Session;
session_start();

class CategoryController extends Controller
{    
    public function index()
    {
        $this->adminAuth(); // For UnAuthorizing Login
    	return view('admin.category_add');
    }

    public function categoryList()
    {
        $this->adminAuth(); // For UnAuthorizing Login
        $get_category = DB::table('tbl_category')->get();

        /*$category = view('admin.category_list')
                    ->with('category_data', $get_category);
        return view('admin_layout')
                ->with('admin.category_list', $category);*/
        // Same as...................
        return view('admin.category_list')->with('category_data', $get_category);
    }

    public function categorySave(Request $request)
    {
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_category')->insert($data);
    	Session::put('message', 'Category Added Successfully.....');
    	return Redirect('/category-add');
    }

    public function unpublish($category_id)
    {
    	DB::table('tbl_category')
    	    ->where('category_id', $category_id)
    	    ->update(['publication_status' => 0]);
    	Session::put('message', 'Category UnPublished Successfully.....');
    	return redirect()->back();
    }

    public function publish($category_id)
    {
    	DB::table('tbl_category')
    	    ->where('category_id', $category_id)
    	    ->update(['publication_status' => 1]);
    	Session::put('message', 'Category Published Successfully.....');
    	return redirect()->back();
    }

    public function categoryEdit($category_id)
    {
        $this->adminAuth(); // For UnAuthorizing Login
    	$edit_category = DB::table('tbl_category')
    	                    ->where('category_id', $category_id)
    	                    ->first();
        return view('admin.category_edit')->with('category_info', $edit_category);
    }

    public function categoryUpdate(Request $request, $category_id)
    {
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;

        DB::table('tbl_category')
    	    ->where('category_id', $category_id)
    	    ->update($data);
    	Session::put('message', 'Category Updated Successfully.....');
    	return redirect()->back();
    }

    public function categoryDelete($category_id)
    {
    	DB::table('tbl_category')
    	    ->where('category_id', $category_id)
    	    ->delete();
    	Session::put('message', 'Category Deleted Successfully.....');
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
