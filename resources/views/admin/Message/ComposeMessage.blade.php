@extends('admin.dashboard') 

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
			{{ Form::open(['route'=>'SendComposeMessage', 'method'=>'POST','class'=>'form-horizontal'])}}
			<div class="form-group">
				<label class="control-label col-md-4">TO:</label>
				<div class="col-md-6">
					<input type="text" name="receiver" class="form-control" /> 
					<span class="text-danger">{{$errors->has('receiver') ? $errors->first('receiver') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Subject:</label>
				<div class="col-md-6">
					<input type="text" name="subject" class="form-control"/>
					<span class="text-danger">{{$errors->has('subject') ? $errors->first('subject') : ''}}</span>
				</div>
			</div>
			<br>
				<div class="form-group">
				<label class="control-label col-md-4">Message</label>
				<div class="col-md-6">
					<textarea name="message" class="form-control"></textarea>
					<span class="text-danger">{{$errors->has('message') ? $errors->first('message') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8 col-lg-offset-4">
					<input type="submit" name="btn" class="btn btn-success"
						value="Send" />
				</div>
			</div>
			{{ Form::close()}}
		</div>
	</div>
</div>
	@for($i = 0; $i < 11; $i++) 
		<br> 
	@endfor
@endsection
