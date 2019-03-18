<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\http\Requests;
use Session;
session_start();

class SliderController extends Controller
{
    public function index()
    {
        $get_slider = DB::table('tbl_slider')->get();
        return view('admin.slider_list')->with('slider_data', $get_slider);
    }

    public function create()
    {
        return view('admin.slider_add');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['slider_title'] = $request->slider_title;
        $data['slider_name'] = $request->slider_name;
        $data['slider_description'] = $request->slider_description;
        $data['publication_status'] = $request->publication_status;

        $image = $request->file('slider_image');
        if($image){
            $image_name         = str_random(20);
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'upload/slider/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['slider_image'] = $image_url;
                DB::table('tbl_slider')->insert($data);
                Session::put('message', 'Slider Added Successfully.....');
                return Redirect('/slider-add');
            }
        }else{
            Session::put('message', 'Failed to Added Slider. Please Try Again...!!!');
            return Redirect('/slider-add');
        }
    }

    public function unpublish($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->update(['publication_status' => 0]);
        Session::put('message', 'Slider UnPublished Successfully.....');
        return redirect()->back();
    }

    public function publish($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->update(['publication_status' => 1]);
        Session::put('message', 'Slider Published Successfully.....');
        return redirect()->back();
    }

    public function edit($slider_id)
    {
        $edit_slider = DB::table('tbl_slider')
                            ->where('slider_id', $slider_id)
                            ->first();
        return view('admin.slider_edit')->with('slider_info', $edit_slider);
    }

    public function update(Request $request, $slider_id)
    {
        $data = array();
        $data['slider_title'] = $request->slider_title;
        $data['slider_name'] = $request->slider_name;
        $data['slider_description'] = $request->slider_description;
        $data['publication_status'] = $request->publication_status;

        $image = $request->file('slider_image');
        if($image){
            $image_name         = str_random(20);
            $ext                = strtolower($image->getClientOriginalExtension());
            $image_full_name    = $image_name.'.'.$ext;
            $upload_path        = 'upload/slider/';
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['slider_image'] = $image_url;
                DB::table('tbl_slider')
                    ->where('slider_id', $slider_id)
                    ->update($data);
                Session::put('message', 'Slider Updated Successfully.....');
                return redirect()->back();
            }
        }

        //$data['slider_image'] = '';
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->update($data);
        Session::put('message', 'Slider Updated Successfully  Without Image .....');
        return redirect()->back();
    }

    public function destroy($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->delete();
        Session::put('message', 'Slider Deleted Successfully.....');
        return redirect()->back();
        //return Redirect::to('/category-list');
    }
}
