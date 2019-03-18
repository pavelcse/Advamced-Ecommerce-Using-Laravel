<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\http\Requests;
use Session;
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $get_product = DB::table('tbl_product')
                        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                        ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                        ->where('tbl_product.publication_status', 1)
                        ->limit(9)
                        ->latest('product_id')
                        ->get();
        return view('pages.home_content')->with('product_data', $get_product);
    }

    public function productByCategory($category_id)
    {
        $get_product_by_category = DB::table('tbl_product')
                        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                        ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                        ->where('tbl_product.publication_status', 1)
                        ->where('tbl_category.category_id', $category_id)
                        ->limit(18)
                        ->latest('product_id')
                        ->get();
        return view('pages.product_by_category')->with('product_data_by_category', $get_product_by_category);
    }
    public function productByBrand($brand_id)
    {
        $get_product_by_brand = DB::table('tbl_product')
                        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                        ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                        ->where('tbl_product.publication_status', 1)
                        ->where('tbl_brand.brand_id', $brand_id)
                        ->limit(18)
                        ->latest('product_id')
                        ->get();
        return view('pages.product_by_brand')->with('product_data_by_brand', $get_product_by_brand);
    }

    public function productByID($product_id)
    {
        $get_product_by_id = DB::table('tbl_product')
                        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                        ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                        ->where('tbl_product.publication_status', 1)
                        ->where('tbl_product.product_id', $product_id)
                        ->limit(1)
                        ->first(); 
        return view('pages.product_by_id')->with('prduct_info', $get_product_by_id);
        // In the view page, do not use loop. coz here showing only one data. Loop use when showing multiple data.
    }

}
