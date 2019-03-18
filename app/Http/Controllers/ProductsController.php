<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\http\Requests;
use Session;
session_start();

class ProductsController extends Controller
{
    public function index()
    {
        $this->adminAuth(); // For UnAuthorizing Login
        $get_product = DB::table('tbl_product')
                        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                        ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                        ->get();
        return view('admin.product_list')->with('product_data', $get_product);
    }


    public function create()
    {
        $this->adminAuth(); // For UnAuthorizing Login
        return view('admin.product_add');
    }


    public function store(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;

        $image = $request->file('product_image');
        if($image){
            $image_name         = str_random(20);
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'upload/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['product_image'] = $image_url;
                DB::table('tbl_product')->insert($data);
                Session::put('message', 'Product Added Successfully.....');
                return Redirect('/product-add');
            }
        }

        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Product Added Successfully Without Image.....');
        return Redirect('/product-add');


    }

    public function unpublish($product_id)
    {
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 0]);
        Session::put('message', 'Product UnPublished Successfully.....');
        return redirect()->back();
    }

    public function publish($product_id)
    {
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 1]);
        Session::put('message', 'Product Published Successfully.....');
        return redirect()->back();
    }


    public function edit($product_id)
    {
        $this->adminAuth(); // For UnAuthorizing Login
        $edit_product = DB::table('tbl_product')
                            ->where('product_id', $product_id)
                            ->first();
        return view('admin.product_edit')->with('product_info', $edit_product);
    }

    public function update(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;

        $image = $request->file('product_image');
        if($image){
            $image_name         = str_random(20);
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'upload/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['product_image'] = $image_url;
                DB::table('tbl_product')
                ->where('product_id', $product_id)
                ->update($data);
                Session::put('message', 'Product Updated Successfully.....');
                return Redirect('/product-list');
            }
        }

        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update($data);
        Session::put('message', 'Product Updated Successfully.....');
        //return redirect()->back();
        return Redirect('/product-list');
    }


    public function destroy($product_id)
    {
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->delete();
        Session::put('message', 'Product Deleted Successfully.....');
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
