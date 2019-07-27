@extends('admin.dashboard')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Update Product Info Form</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
			{{ Form::open(['route'=>'UpdateProduct', 'method'=>'POST','class'=>'form-horizontal', 'enctype' =>'multipart/form-data'])}}
			<div class="form-group">
				<label class="control-label col-md-4">Catagory Name</label>
				<div class="col-md-6">
					<select class="form-control" name="catagory_id">
						<option value="{{ $EditProductCatagory->id}}">{{$EditProductCatagory->catagory_name}}</option>
					@foreach($catagories as $catagory)
						<option value="{{ $catagory->id}}">{{$catagory->catagory_name}}</option>
					@endforeach
					</select>
					<span class="text-danger">{{$errors->has('catagory_id') ? $errors->first('catagory_id') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Product Type Name</label>
				<div class="col-md-6">
					<select class="form-control" name="productType_id">
						<option value="{{ $EditProductType->id}}">{{$EditProductType->productType_name }}</option>
					@foreach($productTypes as $productType)
						<option value="{{ $productType->id}}">{{$productType->productType_name }}</option> 
					@endforeach
					</select>
					<span class="text-danger">{{$errors->has('productType_id') ? $errors->first('productType_id') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Produt Name</label>
				<div class="col-md-6">
					<input type="text" value="{{ $product->product_name}}"
						name="product_name" class="form-control" />
						<span class="text-danger">{{$errors->has('productType_id') ? $errors->first('productType_id') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Product Description</label>
				<div class="col-md-6">
					<textarea name="product_description" class="form-control">{{ $product->product_description}}</textarea>
					<span class="text-danger">{{$errors->has('product_description') ? $errors->first('product_description') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Product Price</label>
				<div class="col-md-6">
					<input type="number" value="{{ $product->product_price}}" name="product_price" class="form-control" /> 
					<span class="text-danger">{{$errors->has('product_price') ? $errors->first('product_price') : ''}}</span>
					<input type="hidden" value="{{ $product->id }}" name="product_id" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Product Quantity</label>
				<div class="col-md-6">
					<input type="number" value="{{ $product->product_quantity}}" name="product_quantity" class="form-control" />
					<span class="text-danger">{{$errors->has('product_quantity') ? $errors->first('product_quantity') : ''}}</span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-4">Product Image</label>
				<div class="col-md-6">
					<input type="file" value="$product->product_image" name="product_image" accept="image/*" />
					<span class="text-danger">{{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8 col-lg-offset-4">
					<input type="submit" name="btn" class="btn btn-success" value="Update Product Info" />
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
	@for($i = 0; $i < 6; $i++) 
		<br>
	@endfor
@endsection