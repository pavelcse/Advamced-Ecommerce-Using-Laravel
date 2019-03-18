@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-list"></i><a href="#">Category List</a></li>
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
			<h2><i class="halflings-icon list"></i><span class="break"></span>Category List</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>SL</th>
						<th>Category Name</th>
						<th>Category Description</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>
					<?php $i = 0;?>
					@foreach ($category_data as $v_category)
					<?php $i++;?>
				    <tr>
					    <td>{{ $i }}</td>
					    <td class="center">{{ $v_category->category_name }}</td>
					    <td class="center">{{ $v_category->category_description }}</td>
					    @if ( $v_category->publication_status == '1')
					    <td class="center">
						    <span class="label label-success">Published</span>
					    </td>
					    @else
					    <td class="center">
						    <span class="label label-warning">UnPublished</span>
					    </td>
					    @endif
					    <td class="center">
					    	@if ( $v_category->publication_status == '1')
						    <a class="btn btn-danger" id="published" href="{{ URL::to('/unpublish/'.$v_category->category_id) }}">
							    <i class="halflings-icon white thumbs-down"></i>
							</a>
							@else  
                            <a class="btn btn-success" id="published" href="{{ URL::to('/publish/'.$v_category->category_id) }}">
							    <i class="halflings-icon white thumbs-up"></i>
							</a>
							@endif
						    
						    <a class="btn btn-info" href="{{ URL::to('/edit/'.$v_category->category_id) }}">
							    <i class="halflings-icon white edit"></i>  
						    </a>
						    <a class="btn btn-danger" id="delete" href="{{ URL::to('/delete/'.$v_category->category_id) }}">
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