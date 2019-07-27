@extends('admin.dashboard')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Manage Catagory</h4>
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
					<th>Product Type Name</th>
					<th>Product Type Description</th>
					<th>Action</th>
				</tr>
				@php($i=1) 
				@foreach($productTypes as $productType)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $productType->productType_name}}</td>
					<td>{{ $productType->productType_description}}</td>
					<td><a href="{{route('ProductTypeEdit',['productType'=>$productType->id])}}" class="btn btn-success btn-xs">
						 	<span class="glyphicon glyphicon-edit"></span>
						</a> 
						<a href="{{route('ProductTypeDelete',['productType'=>$productType->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure!!!')">
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
