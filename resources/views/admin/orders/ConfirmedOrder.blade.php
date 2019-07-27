@extends('admin.dashboard')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Product Manage Form</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif
			<table class="table table-bordered">
				<tr class="bg-primary">
					<th>SL NO.</th>
					<th>Customer Name</th>
					<th>Total Price</th>
					<th>Order Status</th>
					<th>Payment Type</th>
					<th>Payment Status</th>
					<th>Action</th>
				</tr>
				@php($i=1) 
				@foreach($orderList as $order)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$order->customer_name}}</td>
					<td>{{$order->order_total}}</td>
					<td>{{$order->orderStatus}}</td>
					<td>{{$order->paymentType}}</td>
					<td>{{$order->paymentStatus}}</td>
					<td>
						<a href="{{route('ViewOrderDetails',['id'=>$order->order_id])}}" class="btn btn-success btn-xs" title="View Order Details"> 
						<span class="glyphicon glyphicon-zoom-in"></span>
						</a> 
						
						<a href="{{route('ViewInvoice',['id'=>$order->order_id])}}" class="btn btn-warning btn-xs" title="View Order Invoice"> 
						<span class="glyphicon glyphicon-zoom-out"></span>
						</a> 
						
						<a href="{{route('DownloadOrderInvoice',['id'=>$order->order_id])}}" class="btn btn-primary btn-xs" title="Download Order Invoice"> 
						<span class="glyphicon glyphicon-download"></span>
						</a> 
						
						<a href="{{route('PaymentOfOrderConfirm',['id'=>$order->order_id])}}" class="btn btn-warning btn-xs" title="Confirm Order"> 
						<span class="glyphicon glyphicon-edit"></span>
						</a> 
						
						<a href="{{route('OrderDeleteConfirm',['id'=>$order->order_id])}}" class="btn btn-danger btn-xs" title="Delete Order" onclick="return confirm('Are you sure!!!')"> 
						<span class="glyphicon glyphicon-trash"></span>
					    </a>
					</td>
				</tr>
				@endforeach

			</table>
		</div>
	</div>
</div>
	@for($i = 0; $i < 11; $i++) 
		<br>
	@endfor
@endsection
