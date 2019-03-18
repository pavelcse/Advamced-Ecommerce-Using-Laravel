<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use App\http\Requests;
use Session;
session_start();

class CheckoutController extends Controller
{
    public function index()
    {
    	$this->loginCheck();
    	$this->shippingCheck();

    	$cart = Cart::total();
    	if ($cart == 0) {
    		return Redirect::to('/show-cart');
    	}

        return view('pages.checkout');
    }


    public function shippingDetails(Request $request)
    {
        $data = array();
        $data['first_name']     = $request->first_name;
        $data['last_name']      = $request->last_name;
        $data['email_address']  = $request->email_address;
        $data['mobile_number']  = $request->mobile_number;
        $data['address']        = $request->address;
        $data['city']           = $request->city;

        $shipping = DB::table('tbl_shipping')
                    ->insertGetId($data);

        Session::put('shipping_id', $shipping);
        return Redirect::to('/payment');
    }

    public function payment()
    {
    	$user = Session::get('shipping_id');
    	if ($user) {
    		return view('pages.payment');
    	}else{
    		return Redirect::to('/checkout');
    	}

    }

    public function loginCheck()
    {
    	$user = Session::get('user_id');
    	if(!$user){
    		return Redirect::to('/login')->send();
    	}
    }

    public function shippingCheck()
    {
    	$user = Session::get('shipping_id');
    	if($user){
    		return Redirect::to('/payment')->send();
    	}
    }

    public function paymentGateway(Request $request)
    {
    	//For Payment Confirm
    	$geteway = $request->payment_gateway;
        $payment_data = array();
        $payment_data['payment_method'] = $geteway;

        $payment_id = DB::table('tbl_payment')
                        ->insertGetId($payment_data);

        //For Order Confirm

        $order_data = array();
        $order_data['user_id']      = Session::get('user_id');
        $order_data['shipping_id']  = Session::get('shipping_id');
        $order_data['payment_id']   = $payment_id;
        $order_data['order_total']  = Cart::total(); 

        $order_id = DB::table('tbl_order')
                        ->insertGetId($order_data); 

        //For Order Details 

        $content = Cart::content();
        $order_details = array();

        foreach ($content as $data) {
        	$order_details['order_id']                  = $order_id;
        	$order_details['product_id']                = $data->id;
        	$order_details['product_name']              = $data->name;
        	$order_details['product_price']             = $data->price;
        	$order_details['product_sales_quantity']    = $data->qty;

        	DB::table('tbl_order_details')
        	    ->insert($order_details);
        }

        if ($geteway == 'on_delivery') {
        	Cart::destroy();
            Session::put('shipping_id', null);
        	return view('pages.on_cash');
        }elseif ($geteway == 'paypal') {
        	Cart::destroy();
            Session::put('shipping_id', null);
        	echo "Order Confirm. Please pay bill to Paypal.";
        }elseif ($geteway == 'mastercard') {
        	Cart::destroy();
            Session::put('shipping_id', null);
        	echo "Order Confirm. Please pay bill to MasterCard.";
        }elseif ($geteway == 'bkash') {
        	Cart::destroy();
            Session::put('shipping_id', null);
        	echo "Order Confirm. Please pay bill to bkash.";
        }

    }
}
