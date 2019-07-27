@extends('front-end.master') 

@section('title') 
Cart
@endsection

@section('body')
<div class="cart">
	<div class="container">
		<div class="col-md-9 cart-items">
					<h2>My Shopping Bag ({{$cartProducts->count()}})</h2>
				@php($sum=0)	
		@foreach($cartProducts as $cartProduct)
			

			<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<div class="cart-header">
				
					 
				<a href="{{route('deleteCart',['rowId' => $cartProduct->rowId]) }} " class="close1"></a>
				<div class="cart-sec">
					<div class="cart-item cyc">
				
					<img src="{{asset($cartProduct->options->image) }}" alt="" />
					
					</div>
					<div class="cart-item-info">
						<h3>
							{{$cartProduct->name}}
						</h3>
						<h4>
							<span>Tk. </span>{{$cartProduct->price}}
						</h4>
						
						{{ Form::open(['route'=>'updateCart','method'=>'POST'])}}
						<p class="qty">Qty ::</p>
						<input min="1" type="number" id="quantity" name="qty"
							value="{{$cartProduct->qty}}" class="form-control1 input-small">
						<input type="hidden" name="rowId" value="{{$cartProduct->rowId}}"/>
						<button type="submit" class="btn btn-success">update</button>
						{{ Form::close()}}
					</div>
					<div class="clearfix"></div>
					<div class="delivery">
						<span>Delivered in 3-5 bussiness days</span>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<?php 
			$sum = $sum + $cartProduct->price * $cartProduct->qty;
			Session::put('total_order',$sum);
			?>
			@endforeach
		</div>

		<div class="col-md-3 cart-total">
			<a class="continue" href="{{route('index')}}">Continue to Shopping</a>
			<div class="price-details">
				<h3>Price Details</h3>
				<span>Total</span> <span class="total">{{$sum}}</span> <span>Discount</span>
				<span class="total">---</span> <span>Vat</span> <span
					class="total">00.00 %</span>
				<div class="clearfix"></div>
			</div>
			<h4 class="last-price">TOTAL</h4>
			<span class="total final">{{$sum}}</span>
			<div class="clearfix"></div>
			<a class="order" href="{{route('placeOrder')}}">Place Order</a>
		</div>
	</div>
</div>

@endsection
