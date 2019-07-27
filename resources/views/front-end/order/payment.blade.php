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
				Dear <strong>{{Session::get('user_name')}}</strong>. Please choose the payment method to complete your valuable order
			</div>
		</div>
	</div>
	<div class="row">
	<br>
	<div class="col-md-6 col-md-offset-3 well">
	<br>
	<h3 class="text-center text-success"> Payment Method</h3>
	<hr>
			<span class="text-danger">{{$errors->has('paymentType') ? $errors->first('paymentType') : ''}}</span>
				{{ Form::open(['route'=>'SavePaymentInfo','method'=>'POST','class'=>'form-horizontal'])}}
				<table class="table table-bordered">
				
					<tr>
						<th>Cash On Delivery</th>
						<td><input type="radio" name="paymentType" value="Cash On Delivery"/></td>
					</tr>
					<tr>
						<th>Bkash</th>
						<td><input type="radio" name="paymentType" value="Bkash"/></td>
					</tr>
					<tr>
						<th></th>
						<td><input type="submit" name="btn" class="btn btn-success" value="Confirm Order" /></td>
					</tr>
				</table>
				{{ Form::close() }}
		
		</div>
	</div>
</div>
@endsection

