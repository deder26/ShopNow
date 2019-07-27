@extends('front-end.users.dashUser')

@section('dashcontent')
	<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Purchased List</h4>
		</div>
		<div class="panel-body">
			
			<table class="table table-bordered">
				<tr class="bg-primary">
					<th>SL NO.</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Quantity</th>
					<th>Total Price</th>
					<th>Order Date</th>
				</tr>
				@php($i=1) 
				@foreach($purchasedProducts as $product)
				<tr>
					<td>{{$i++}}</td>
					<td>
					@foreach($productDetails->where('order_id',$product->id) as $pDetail)
					#{{ $pDetail->product_name}}
					<br>
					@endforeach
					</td>
					
					<td>
					@php($sum=0)
					@foreach($productDetails->where('order_id',$product->id) as $pDetail)
					# Tk.{{ $pDetail->product_price}}
					<br>
					<?php 
					   $sum = $sum+$pDetail->product_price*$pDetail->product_quantity;
					?>
					@endforeach
					</td>
					<td>
					@foreach($productDetails->where('order_id',$product->id) as $pDetail)
					# {{ $pDetail->product_quantity}} piece
					<br>
					@endforeach
					</td>
					<td>{{$sum}}</td>
					<td>
					{{$product->created_at}}
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