@extends('layout')
@section('content')

	<section id="cart_items">
		<div class="">
			<div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="{{ URL::to('/') }}">Home</a></li>
                  <li class="active">Product Checkout</li>
                </ol>
            </div>
			<div class="step-one">
				<p class="heading">Please Confirm Your Shipping Address</p>
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
                            <?php 
                                $cart =  Cart::total();
                            ?>
                            @if($cart > 0)
							<p>Shepping Details</p>
							<div class="form-one">
								<form action="{{ URL::to('/shipping-details') }}" method="post">
									{{ csrf_field() }}
									<input type="text" name="first_name" required="" placeholder="First Name *">
									<input type="text" name="last_name" required="" placeholder="Last Name *">
									<input type="text" name="email_address" required="" placeholder="Email Address *">
									<input type="text" name="mobile_number" required="" placeholder="Mobile Number *">
									<input type="text" name="address" required="" placeholder="Full Address *">
									<input type="text" name="city" required="" placeholder="City *">
									<button class="btn btn-primary" type="submit">Confirm to Next</button>
								</form>
							</div>
							@else
							<div align="center">
								<p class="btn btn-primary">Your Cart is Empty. Please Shop First. Thanks...</p>
								<p><a class="btn btn-primary" href="{{ URL::to('/') }}">Shop Now</a></p>
							</div>
							@endif
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection