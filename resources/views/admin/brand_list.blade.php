@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-list"></i><a href="#">Brand List</a></li>
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
			<h2><i class="halflings-icon list"></i><span class="break"></span>Brand List</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>SL</th>
						<th>Brand Name</th>
						<th>Brand Description</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>
					<?php $i = 0;?>
					@foreach ($brand_data as $v_brand)
					<?php $i++;?>
				    <tr>
					    <td>{{ $i }}</td>
					    <td class="center">{{ $v_brand->brand_name }}</td>
					    <td class="center">{{ $v_brand->brand_description }}</td>
					    @if ( $v_brand->publication_status == '1')
					    <td class="center">
						    <span class="label label-success">Published</span>
					    </td>
					    @else
					    <td class="center">
						    <span class="label label-warning">UnPublished</span>
					    </td>
					    @endif
					    <td class="center">
					    	@if ( $v_brand->publication_status == '1')
						    <a class="btn btn-danger" id="published" href="{{ URL::to('/brand-unpublish/'.$v_brand->brand_id) }}">
							    <i class="halflings-icon white thumbs-down"></i>
							</a>
							@else  
                            <a class="btn btn-success" id="published" href="{{ URL::to('/brand-publish/'.$v_brand->brand_id) }}">
							    <i class="halflings-icon white thumbs-up"></i>
							</a>
							@endif
						    
						    <a class="btn btn-info" href="{{ URL::to('/brand-edit/'.$v_brand->brand_id) }}">
							    <i class="halflings-icon white edit"></i>  
						    </a>
						    <a class="btn btn-danger" id="delete" href="{{ URL::to('/brand-delete/'.$v_brand->brand_id) }}">
							    <i class="halflings-icon white trash"></i> 
						    </a>
					    </td>
				    </tr>
				    @endforeach
				</tbody>
			</table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection