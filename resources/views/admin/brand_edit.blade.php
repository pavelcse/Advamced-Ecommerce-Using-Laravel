@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-edit"></i><a href="#">Update Brand</a></li>
</ul>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Brand</h2>
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
			<form class="form-horizontal" action="{{url('/brand-update', $brand_info->brand_id)}}" method="post">
				{{csrf_field()}}
				<fieldset>
				    <div class="control-group">
					    <label class="control-label" for="brand_name"> Brand Name </label>
					    <div class="controls">
                            <input type="text" class="span4" name="brand_name" id="brand_name" value="{{ $brand_info->brand_name }}" required="">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="brand_description">Brand Description </label>
					    <div class="controls">
					        <textarea class="span4" name="brand_description" id="brand_description" rows="3" required="">{{ $brand_info->brand_description }}</textarea>
					    </div>
				    </div>  
				    <div class="form-actions">
					    <button type="submit" class="btn btn-primary">Update Brand</button>
					    <a class="btn btn-danger" href="{{ URL::to('/brand-list') }}">Back to List</a>
				    </div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection