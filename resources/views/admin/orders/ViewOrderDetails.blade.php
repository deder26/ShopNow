@extends('admin.dashboard')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel panel-heading">
				<h4 class="text-center text-success">Order Information</h4>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<th>Order Id</th>
						<td>{{$order->id}}</td>
					</tr>
					<tr>
						<th>Total Order</th>
						<td>Tk. {{$order->order_total}}</td>
					</tr>
					<tr>
						<th>Order Status</th>
						<td>{{$order->orderStatus}}</td>
					</tr>
					<tr>
						<th>Order Date</th>
						<td>{{$order->created_at}}</td>
					</tr>
				</table>
			</div>
		</div>	
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel panel-heading">
				<h4 class="text-center text-success">Shipping Information</h4>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<th>Customer Name</th>
						<td>{{$shipping->customer_name}}</td>
					</tr>
					<tr>
						<th>Email Address</th>
						<td>{{$shipping->customer_email}}</td>
					</tr>
					<tr>
						<th>Contact No.</th>
						<td>{{$shipping->customer_contact}}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{{$shipping->customer_address}}</td>
					</tr>
				</table>
			</div>
		</div>	
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel panel-heading">
				<h4 class="text-center text-success">Payment Information</h4>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<th>Payment Type</th>
						<td>{{$payment->paymentType}}</td>
					</tr>
					<tr>
						<th>Payment Status</th>
						<td>{{$payment->paymentStatus}}</td>
					</tr>
				</table>
			</div>
		</div>	
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel panel-heading">
				<h4 class="text-center text-success">Ordered Product Information</h4>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
				<tr class="bg-primary">
					<th>SL NO.</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Quantity</th>
				</tr>
				@php($i=1) 
				@foreach($orderDetail as $product)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$product->product_name}}</td>
					<td>Tk. {{$product->product_price}}</td>
					<td>{{$product->product_quantity}}</td>
				</tr>
				@endforeach

			</table>
			</div>
		</div>	
	</div>
</div>
	@for($i = 0; $i < 11; $i++) 
		<br>
	@endfor
@endsection
