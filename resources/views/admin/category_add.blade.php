@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-edit"></i><a href="#">Add Category</a></li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
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
			<form class="form-horizontal" action="{{url('/category-save')}}" method="post">
				{{csrf_field()}}
				<fieldset>
				    <div class="control-group">
					    <label class="control-label" for="category_name"> Category Name </label>
					    <div class="controls">
                            <input type="text" class="span4" name="category_name" id="category_name" placeholder="Category Name here" required="">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="category_description">Category Description </label>
					    <div class="controls">
					        <textarea class="span4" name="category_description" id="category_description" rows="3" required=""></textarea>
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
					    <button type="submit" id="" class="btn btn-primary">Add Category</button>
					    <button type="reset" class="btn">Cancel</button>
				    </div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection