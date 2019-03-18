@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><i class="icon-edit"></i><a href="#">Add Social Link</a></li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Social Link</h2>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="" method="post">
			    <fieldset>
			    	@foreach ($all_links as $links)
				    <div class="control-group">
					    <label class="control-label" for="facebook"> Facebook </label>
					    <div class="controls">
                            <input readonly="" type="text" class="span4" name="facebook" id="facebook" value="{{ $links->facebook }}" required="">
                            <a target="_blank" class="btn btn-primary btn-small" href="{{ $links->facebook }}">Goto Link</a>
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="twitter"> Twitter </label>
					    <div class="controls">
                            <input readonly="" type="text" class="span4" name="twitter" id="twitter" value="{{ $links->twitter }}" required="">
                            <a target="_blank" class="btn btn-primary btn-small" href="{{ $links->twitter }}">Goto Link</a>
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="linkedin"> Linkedin </label>
					    <div class="controls">
                            <input readonly="" type="text" class="span4" name="linkedin" id="linkedin" value="{{ $links->linkedin }}" required="">
                            <a target="_blank" class="btn btn-primary btn-small" href="{{ $links->linkedin }}">Goto Link</a>
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="google_plus"> Google Plus </label>
					    <div class="controls">
                            <input readonly="" type="text" class="span4" name="google_plus" id="google_plus" value="{{ $links->google_plus }}" required="">
                            <a target="_blank" class="btn btn-primary btn-small" href="{{ $links->google_plus }}">Goto Link</a>
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="youtube"> YouTube </label>
					    <div class="controls">
                            <input readonly="" type="text" class="span4" name="youtube" id="youtube" value="{{ $links->youtube }}" required="">
                            <a target="_blank" class="btn btn-primary btn-small" href="{{ $links->youtube }}">Goto Link</a>
					    </div>
				    </div>
				    @endforeach
			    </fieldset>
			</form>
		</div>
	</div><!--/span-->

</div><!--/row-->
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Social Link</h2>
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
			<form class="form-horizontal" action="{{url('/social-update', $links->id)}}" method="post">
				{{csrf_field()}}
				<fieldset>
				    <div class="control-group">
					    <label class="control-label" for="facebook"> Facebook </label>
					    <div class="controls">
                            <input type="text" class="span4" name="facebook" id="facebook" value="{{ $links->facebook }}" required="">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="twitter"> Twitter </label>
					    <div class="controls">
                            <input type="text" class="span4" name="twitter" id="twitter" value="{{ $links->twitter }}" required="">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="linkedin"> Linkedin </label>
					    <div class="controls">
                            <input type="text" class="span4" name="linkedin" id="linkedin" value="{{ $links->linkedin }}" required="">
					    </div>
				    </div>
				    <div class="control-group">
					    <label class="control-label" for="google_plus"> Google Plus </label>
					    <div class="controls">
                            <input type="text" class="span4" name="google_plus" id="google_plus" value="{{ $links->google_plus }}" required="">
					    </div>
				    </div>
				     <div class="control-group">
					    <label class="control-label" for="youtube"> YouTube </label>
					    <div class="controls">
                            <input type="text" class="span4" name="youtube" id="youtube" value="{{ $links->youtube }}" required="">
					    </div>
				    </div>
				    <div class="form-actions">
					    <button type="submit" id="" class="btn btn-primary">Update Social Link</button>
				    </div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection