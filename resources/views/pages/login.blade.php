@extends('layout')
@section('content')

<div class="col-sm-4 col-sm-offset-1">
	<div class="login-form"><!--login form-->
		<h2>Login to your account</h2>
		<?php 
            $login = Session::get('message');
		?>
		@if($login)
		<p class="alert-danger"> {{ $login }} </p>
		<?php Session::put('message', null); ?>
		@endif
		<form action="{{ URL::to('/user-login') }}" method="post">
			{{ csrf_field() }}
			<input type="email" name="user_email" placeholder="Email Address" required="" />
			<input type="password" name="user_password" placeholder="password" required="" />
			<button type="submit" class="btn btn-default">Login</button>
		</form>
	</div><!--/login form-->
</div>
<div class="col-sm-1">
	<h2 class="or">OR</h2>
</div>
<div class="col-sm-6">
	<div class="signup-form"><!--sign up form-->
		<h2>New User Signup!</h2>
		<form action="{{ URL::to('/user-signup') }}" method="post">
			{{ csrf_field() }}
			<input type="text" name="user_name" placeholder="Name" required=""/>
			<input type="email" name="user_email" placeholder="Email Address" required=""/>
			<input type="text" name="user_phome" placeholder="Phone Number" required=""/>
			<input type="password" name="user_password" placeholder="Password" required=""/>
			<button type="submit" class="btn btn-default">Signup</button>
		</form>
	</div><!--/sign up form-->
</div>

@endsection