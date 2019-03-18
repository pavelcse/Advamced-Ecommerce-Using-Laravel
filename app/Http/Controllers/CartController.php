<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use App\http\Requests;
use Session;
session_start();

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
    	$quantity   = $request->quantity;
    	$product_id = $request->product_id;

    	$product = DB::table('tbl_product')
    	            ->where('product_id', $product_id)
    	            ->first();

        $data['id']                 = $product->product_id;
        $data['name']               = $product->product_name;
        $data['qty']                = $quantity;
        $data['price']              = $product->product_price;
        $data['options']['image']   = $product->product_image;

        Cart::add($data);
        return Redirect::to('/show-cart');
    }

    public function showCart(){
    	$category = DB::table('tbl_category')
    	            ->where('publication_status', 1)
    	            ->get();

    	return view('pages.cart')->with('get_category', $category);
    }

    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/show-cart');
    }

    public function increaseCartQuantity($rowId, $qty)
    {
        $qty = $qty + 1;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }

    public function decreaseCartQuantity($rowId, $qty)
    {
        $qty = $qty - 1;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
}
