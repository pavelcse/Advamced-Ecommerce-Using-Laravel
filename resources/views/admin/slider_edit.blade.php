@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-edit"></i><a href="#">Update Slider</a></li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Slider</h2>
		</div>
		<div class="box-content">
			<p class="alert-success">
				<?php
                    $message = Session::get('message');
                    if ($message) {
                    	echo $message;
                    }
                    Session::put('message', null);
				?>
			</p>
			<form class="form-horizontal" action="{{url('/slider-update', $slider_info->slider_id)}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>
					<div class="control-group">
					    <label class="control-label" for="slider_title">Slider Title</label>
					    <div class="controls">
					        <input type="text" class="span4" id="slider_title" name="slider_title" value="{{ $slider_info->slider_title }}">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="slider_name">Slider Name</label>
					    <div class="controls">
					        <input type="text" class="span4" id="slider_name" name="slider_name" value="{{ $slider_info->slider_name }}">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="slider_description">Slider Description</label>
					    <div class="controls">
					        <textarea class="span4" id="slider_description" name="slider_description" rows="3">{{ $slider_info->slider_description }}</textarea>
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="fileInput">Slider Image</label>
					    <div class="controls">
					        <input class="input-file uniform_on" id="fileInput" type="file" name="slider_image">
					    </div>
				    </div> 
                    <div class="control-group">
					    <label class="control-label">Publication Status</label>
					    <div class="controls">
						    <label class="radio">
						        <input type="radio" name="publication_status" id="optionsRadios1" value="1" checked="">
						        Published
						    </label>
						    <label class="radio">
						        <input type="radio" name="publication_status" id="optionsRadios2" value="0">
						        UnPublished
						    </label>
					    </div>
					</div>
				    <div class="form-actions">
					    <button type="submit" class="btn btn-primary">Update Slider</button>
					    <button type="reset" class="btn">Cancel</button>
				    </div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection