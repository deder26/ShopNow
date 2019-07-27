
@extends('admin.dashboard')

@section('dashcontent')
	<div class="row">
		@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
		@endif 
		<div class="col-md-8 col-md-offset-2 well">
			<div class="col-md-8 ">
				<label><strong>From: </strong></label>
				<span>{{ $msg->sender_email}}</span>
			</div>
			<div class="col-md-8 ">
				<label><strong>Subject: </strong></label>
				<span>{{ $msg->sender_subject}}</span>
			</div>
			<br>
			<br>
			<div class="col-md-8 ">
				<label>{{ $msg->sender_message}}</label>
			</div>
			
			<br>
			<br>
			{{Form::open(['route'=>'SendReplyMessage','method'=>'POST'])}}
			<div class="form-group">
				<div class="col-md-8">
					<input type="hidden" name="id" value="{{$msg->id}}">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<textarea name="reply_message"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<input type="submit" name="btn" class="btn btn-success" value="Reply">
				</div>
			</div>
			{{Form::close()}}
			
		</div>
		
	</div>
	@for($i = 0; $i < 14; $i++) 
		<br>
	@endfor
@endsection
