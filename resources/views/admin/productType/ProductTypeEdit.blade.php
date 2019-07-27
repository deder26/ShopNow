@extends('admin.dashboard')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Add Product Type Form</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
			{{ Form::open(['route'=>'UpdateProductType', 'method'=>'POST','class'=>'form-horizontal'])}}
			<div class="form-group">
				<label class="control-label col-md-4">Catagory Name</label>
				<div class="col-md-6">
					<select class="form-control" name="catagory_id">
						<option value="{{ $EditProductTypeCatagory->id}}">{{$EditProductTypeCatagory->catagory_name}}</option>
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
					<input type="text" value="{{ $productType->productType_name}}" name="productType_name" class="form-control" /> 
					span class="text-danger">{{$errors->has('productType_name') ? $errors->first('productType_name') : ''}}</span>
					<input type="hidden" value="{{ $productType->id}}" name="productType_id" class="form-control" />
				
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Product Type Description</label>
				<div class="col-md-6">
					<textarea class="form-control" name="productType_description">{{ $productType->productType_description}}</textarea>
					span class="text-danger">{{$errors->has('productType_description') ? $errors->first('productType_description') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8 col-lg-offset-4">
					<input type="submit" name="btn" class="btn btn-success" value="Update Product Type Info" />
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
	
</div>
	@for($i = 0; $i < 11; $i++) 
		<br>
	@endfor
@endsection