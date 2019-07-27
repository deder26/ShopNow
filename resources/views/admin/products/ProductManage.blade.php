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
					<th>Catagory Name</th>
					<th>Product Type Name</th>
					<th>Product Name</th>
					<th>Product Description</th>
					<th>Product Price</th>
					<th>Product Quantity</th>
					<th>Product Image</th>
					<th>Action</th>
				</tr>
				@php($i=1) 
				@foreach($products as $product)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $product->catagory_name }}</td>
					<td>{{ $product->productType_name}}</td>
					<td>{{ $product->product_name}}</td>
					<td>{{ $product->product_description}}</td>
					<td>{{ $product->product_price}}</td>
					<td>{{ $product->product_quantity}}</td>
					<td><img src="{{ asset($product->product_image) }}" alt="" height="100" width="80"></td>
					<td><a href="{{route('ProductEdit',['id'=>$product->id])}}" class="btn btn-success btn-xs"> 
						<span class="glyphicon glyphicon-edit"></span>
						</a> 
						<a href="{{route('ProductDelete',['id'=>$product->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure!!!')"> 
						<span class="glyphicon glyphicon-trash"></span>
					    </a>
					</td>
				</tr>
				
				@endforeach

			
			</table>
			<div class="row">
				<div class="col-md-12 text-center">
					{{$products->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
	@for($i = 0; $i < 11; $i++) 
		<br>
	@endfor
@endsection
