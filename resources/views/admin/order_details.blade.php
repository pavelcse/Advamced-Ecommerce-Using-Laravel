@extends('admin_layout')
@section('admin_content')

<h1 style="padding: 20px 20px;" class="box-header"> 
	<span>Customers Order Details</span>
	<span style="float: right; margin: 0 auto;">
		@if ( $order_details->order_status == '0')
		<a class="btn btn-info" id="published" href="{{ URL::to('/order-confirm/'.$order_details->order_id) }}">Confirm Order</a>
		@else  
        <a class="btn btn-success" id="published" href="#">Order Confirmed</a>
		@endif
		<a class="btn btn-danger" id="delete" href="{{ URL::to('/order-delete/'.$order_details->order_id) }}">Delete Order</a>
	</span>
</h1>
    <div class="row-fluid sortable">	
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
					</div>
					<div class="box-content">
						<table class="table table-bordered">
							  <thead>
								  <tr>
									  <th>Customer Name</th>
									  <th>Customer Mobile Number</th>                                       
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td>{{ $order_details->user_name }}</td>
									<td>{{ $order_details->user_phome }}</td>                                      
								</tr>                                   
							  </tbody>
						 </table>       
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping To</h2>
					</div>
					<div class="box-content">
						<table class="table table-condensed">
							  <thead>
								  <tr>
									  <th width="15%">Name</th>
									  <th width="10%">Mobile</th>
									  <th width="15%">Email</th>
									  <th width="50%">Address</th>                                          
									  <th width="10%">City</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									@foreach($order_details as $order_detail)
									@endforeach
									<td>{{ $order_details->first_name.' '. $order_details->last_name }}</td>         
									<td>{{ $order_details->mobile_number }}</td>                   
									<td>{{ $order_details->email_address }}</td>                
									<td>{{ $order_details->address }}</td>                                 
									<td>{{ $order_details->city }}</td>                                 
								</tr>                                  
							  </tbody>
						 </table>       
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>Order ID</th>
									  <th>Product Name</th>
									  <th>Product Price</th>
									  <th>Product Quantity</th>                                          
									  <th>Product Sub Total</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
							  	@foreach($order_details as $order_data)
								<tr>
									
									<td>{{ $order_data->order_id }}</td>                                   
									<td>{{ $order_data->product_name }}</td>                                   
									<td>{{ $order_data->product_price }}</td>                                   
									<td>{{ $order_data->product_sales_quantity }}</td>       
									<td>{{ $order_data->product_price*$order_data->product_sales_quantity }}</td>
									                                 
								</tr> 
								@endforeach                               
							  </tbody>
							  <tfoot>
							  	   <tr>
							  	   	 <td>Total Bill: </td>
							  	   	 <td><strong>= {{ $order_details->order_total }} TK</strong></td>
							  	   </tr>
							  </tfoot>
						 </table>      
					</div>
				</div><!--/span-->
			</div><!--/row-->
@endsection