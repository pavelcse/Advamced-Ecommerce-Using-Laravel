<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use App\http\Requests;
use Session;
session_start();

class OrderController extends Controller
{
    public function index()
    {
    	$order_info = DB::table('tbl_order')
    	                ->join('tbl_user', 'tbl_order.user_id', '=', 'tbl_user.user_id')
    	                ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
    	                ->select('tbl_order.*', 'tbl_user.user_name', 'tbl_payment.payment_method')
    	                ->latest('order_id')
    	                ->get();
    	return view('admin.order_manage')->with('order_info', $order_info);
    }

    public function orderDetails($order_id)
    {
        $order_details = DB::table('tbl_order')
    	                ->join('tbl_user', 'tbl_order.user_id', '=', 'tbl_user.user_id')
    	                ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
    	                ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
    	                ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
    	                ->select('tbl_order.*', 'tbl_user.*', 'tbl_order_details.*', 'tbl_shipping.*', 'tbl_shipping.*')
    	                //->where('order_id', $order_id)
    	                ->get();



        echo "<pre>";
        print_r($order_details); exit();
        echo "</pre>";


    	//return view('admin.order_details')->with('order_details', $order_details);
    }

    public function confrm($order_id)
    {
    	DB::table('tbl_order')
    	    ->where('order_id', $order_id)
    	    ->update(['order_status' => 1]);
    	Session::put('message', 'Order Confirmed Successfully.....');
    	return Redirect::to('/manage-order');
    }

    public function orderDelete($order_id)
    {
        DB::table('tbl_order')
    	    ->join('tbl_user', 'tbl_order.user_id', '=', 'tbl_user.user_id')
    	    ->join('tbl_payment', 'tbl_order.payment_id', '=', 'tbl_payment.payment_id')
    	    ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
    	    ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
    	    ->select('tbl_order.*', 'tbl_user.*', 'tbl_payment.payment_method', 'tbl_order_details.*', 'tbl_shipping.*')
    	    ->where('tbl_order.order_id', $order_id)
    	    ->delete();

    	Session::put('message', 'Order Deleted Successfully.....');
    	return Redirect::to('/manage-order');
    }
}
