@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-edit"></i><a href="#">Update Category</a></li>
</ul>

<p class="alert-success">
	<?php
        $message = Session::get('message');
        if ($message) {
            echo $message;
        }
        Session::put('message', null);
	?>
</p>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
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
			<form class="form-horizontal" action="{{url('/category-update', $category_info->category_id)}}" method="post">
				{{csrf_field()}}
				<fieldset>
				    <div class="control-group">
					    <label class="control-label" for="category_name"> Category Name </label>
					    <div class="controls">
                            <input type="text" class="span4" name="category_name" id="category_name" value="{{ $category_info->category_name }}" required="">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="category_description">Category Description </label>
					    <div class="controls">
					        <textarea class="span4" name="category_description" id="category_description" rows="3" required="">{{ $category_info->category_description }}</textarea>
					    </div>
				    </div>  
				    <div class="form-actions">
					    <button type="submit" class="btn btn-primary">Update Category</button>
					    <a class="btn btn-danger" href="{{ URL::to('/category-list') }}">Back to List</a>
				    </div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection