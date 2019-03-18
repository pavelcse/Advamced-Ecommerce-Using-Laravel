@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-list"></i><a href="#">Slider List</a></li>
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
			<h2><i class="halflings-icon list"></i><span class="break"></span>Slider List</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>SL</th>
						<th>Slider Title</th>
						<th>Slider Name</th>
						<th>Slider Image</th>
						<th>Slider Description</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>
					<?php $i = 0;?>
					@foreach ($slider_data as $v_slider)
					<?php $i++;?>
				    <tr>
					    <td>{{ $i }}</td>
					    <td class="center">{{ $v_slider->slider_title }}</td>
					    <td class="center">{{ $v_slider->slider_name }}</td>
					    <td class="center"><img src="{{ url($v_slider->slider_image) }}" style="height: 100px; width: 200px" alt=""></td>
					    <td class="center">{{ $v_slider->slider_description }}</td>
					    @if ( $v_slider->publication_status == '1')
					    <td class="center">
						    <span class="label label-success">Published</span>
					    </td>
					    @else
					    <td class="center">
						    <span class="label label-warning">UnPublished</span>
					    </td>
					    @endif
					    <td class="center">
					    	@if ( $v_slider->publication_status == '1')
						    <a class="btn btn-danger" id="published" href="{{ URL::to('/slider-unpublish/'.$v_slider->slider_id) }}">
							    <i class="halflings-icon white thumbs-down"></i>
							</a>
							@else  
                            <a class="btn btn-success" id="published" href="{{ URL::to('/slider-publish/'.$v_slider->slider_id) }}">
							    <i class="halflings-icon white thumbs-up"></i>
							</a>
							@endif
						    
						    <a class="btn btn-info" href="{{ URL::to('/slider-edit/'.$v_slider->slider_id) }}">
							    <i class="halflings-icon white edit"></i>  
						    </a>
						    <a class="btn btn-danger" id="delete" href="{{ URL::to('/slider-delete/'.$v_slider->slider_id) }}">
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