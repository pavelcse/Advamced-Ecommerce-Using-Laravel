@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-edit"></i><a href="#">Add Product</a></li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Products</h2>
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
			<form class="form-horizontal" action="{{url('/product-save')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>
				    <div class="control-group">
					    <label class="control-label" for="product_name">Product Name</label>
					    <div class="controls">
					        <input type="text" class="span4" id="product_name" name="product_name" placeholder="Enter Product Name Here">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="selectError">Category</label>
					    <div class="controls">
						    <select id="selectError" name="category_id" data-rel="chosen">
						    	<option value="0">Select Category</option>
						    	<?php
                                    $cat_list = DB::table('tbl_category')
                                                ->where('publication_status', 1)
                                                ->get();
						    	?>
						    	@foreach ($cat_list as $all_cat)
						        <option value="{{ $all_cat->category_id }}">{{ $all_cat->category_name }}</option>
						        @endforeach
						    </select>
					    </div>
				    </div>	    
				    <div class="control-group">
					    <label class="control-label" for="selectbrand">Brand</label>
					    <div class="controls">
						    <select id="selectbrand" name="brand_id" data-rel="chosen">
						    	<option value="0">Select Brand</option>
						    	<?php
                                    $bnd_list = DB::table('tbl_brand')
                                                ->where('publication_status', 1)
                                                ->get();
						    	?>
						    	@foreach ($bnd_list as $all_bnd)
						        <option value="{{ $all_bnd->brand_id }}">{{ $all_bnd->brand_name }}</option>
						        @endforeach
						    </select>
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="product_short_description">Product Info</label>
					    <div class="controls">
					        <textarea class="span4" id="product_short_description" name="product_short_description" rows="3" placeholder="Enter Product Info Here"></textarea>
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="product_long_description">Product Description</label>
					    <div class="controls">
					        <textarea class="cleditor" id="product_long_description" name="product_long_description" rows="3" placeholder="Enter Product Description Here"></textarea>
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="product_price">Product Price</label>
					    <div class="controls">
					        <input type="text" class="span4" id="product_price" name="product_price" placeholder="Enter Product Price Here">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="fileInput">Product Image</label>
					    <div class="controls">
					        <input class="input-file uniform_on" id="fileInput" type="file" name="product_image">
					    </div>
				    </div> 
                    <div class="control-group">
					    <label class="control-label" for="product_size">Product Size</label>
					    <div class="controls">
					        <input type="text" class="span4" id="product_size" name="product_size" placeholder="Enter Product Size Here">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="product_color">Product Color</label>
					    <div class="controls">
					        <input type="text" class="span4" id="product_color" name="product_color" placeholder="Enter Product Color Here">
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
					    <button type="submit" class="btn btn-primary">Save changes</button>
					    <button type="reset" class="btn">Cancel</button>
				    </div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection