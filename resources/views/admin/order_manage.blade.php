@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-list"></i><a href="#">Order List</a></li>
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
			<h2><i class="halflings-icon list"></i><span class="break"></span>Order List</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>SL</th>
						<th>Order ID</th>
						<th>Customer Name</th>
						<th>Order Total</th>
						<th>Order Time</th>
						<th>Payment Method</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>
					<?php $i = 0;?>
					@foreach ($order_info as $orders)
					<?php $i++;?>
				    <tr>
					    <td>{{ $i }}</td>
					    <td class="center">{{ $orders->order_id }}</td>
					    <td class="center">{{ $orders->user_name }}</td>
					    <td class="center">{{ $orders->order_total }}</td>
					    <td class="center">{{ $orders->created_at }}</td>
					    <td class="center">{{ $orders->payment_method }}</td>

					    @if ( $orders->order_status == '1')
					    <td class="center">
						    <span class="label label-success">Success</span>
					    </td>
					    @else
					    <td class="center">
						    <span class="label label-warning">Pending</span>
					    </td>
					    @endif

					    <td class="center">
						    <a class="btn btn-info" href="{{ URL::to('/order-details/'.$orders->order_id) }}">Order Details</a>
						    
						    @if ( $orders->order_status == '1') 
						    <a class="btn btn-danger" id="delete" href="{{ URL::to('/order-delete/'.$orders->order_id) }}">Delete</a>
						    @else
						    <a class="btn btn-light">Delete</a>
						    @endif
					    </td>
				    </tr>
				    @endforeach
				</tbody>
			</table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection