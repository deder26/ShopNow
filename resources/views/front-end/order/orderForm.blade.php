@extends('front-end.master') 

@section('title') 
Order
@endsection

@section('body')
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-12">
		<br>
			<div class="well text-center text-success">
				Hi <strong>{{Session::get('user_name')}}</strong>. Please fillup the below form to complete your valuable order
			</div>
		</div>
	</div>
	<div class="row">
	<br>
	<div class="col-md-6 col-md-offset-3 well">
	<br>
	<h3 class="text-center text-success"> Shipping Information</h3>
	<hr>
				@if(Session::has('message'))
				<div class="alert alert-success">
					<strong class="text-center">{{ Session::get('message')}}</strong>
				</div>
				@endif 
				{{ Form::open(['route'=>'SaveShippingInfo','method'=>'POST','class'=>'form-horizontal'])}}
				<div class="form-group">
					<label class="col-md-3">Customer Name: </label>
					<div class="col-md-9">
						<input type="text" name="customer_name" value="{{Session::get('user_name')}}" class="form-control" />
						<span class="text-danger">{{$errors->has('customer_name') ? $errors->first('customer_name') : ''}}</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Email: </label>
					<div class="col-md-9">
						<input type="text" name="customer_email" value="{{Auth::user()->email}}" class="form-control" />
						<span class="text-danger">{{$errors->has('customer_email') ? $errors->first('customer_email') : ''}}</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Contact No. </label>
					<div class="col-md-9">
						<input type="text" name="customer_contact" class="form-control" placeholder="01XXXXXXXXX" />
						<span class="text-danger">{{$errors->has('customer_contact') ? $errors->first('customer_contact') : ''}}</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Address: </label>
					<div class="col-md-9">
						<textArea name="customer_address" class="form-control"></textArea>
						<span class="text-danger">{{$errors->has('customer_address') ? $errors->first('customer_address') : ''}}</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
						<input type="submit" name="btn" class="btn btn-success" value="Save Shipping Info" />
					</div>
				</div>
				{{ Form::close() }}
		
		</div>
	</div>
</div>
@endsection
