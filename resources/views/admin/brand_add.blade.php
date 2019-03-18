@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-edit"></i><a href="#">Add Brand</a></li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
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
			<form class="form-horizontal" action="{{url('/brand-save')}}" method="post">
				{{csrf_field()}}
				<fieldset>
				    <div class="control-group">
					    <label class="control-label" for="brand_name"> Brand Name </label>
					    <div class="controls">
                            <input type="text" class="span4" name="brand_name" id="brand_name" placeholder="Brand Name here" required="">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="brand_description">Brand Description </label>
					    <div class="controls">
					        <textarea  class="span4" name="brand_description" id="brand_description" placeholder="Brand Description here" rows="3" required=""></textarea>
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
					    <button type="submit" id="" class="btn btn-primary">Add Brand</button>
					    <button type="reset" class="btn">Cancel</button>
				    </div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection