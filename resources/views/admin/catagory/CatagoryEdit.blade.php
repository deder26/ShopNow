@extends('admin.dashboard')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Add Catagory Form</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
			{{ Form::open(['route'=>'UpdateCatagory', 'method'=>'POST','class'=>'form-horizontal'])}}
			<div class="form-group">
				<label class="control-label col-md-4">Catagroy Name</label>
				<div class="col-md-6">
					<input type="text" value="{{ $catagory->catagory_name}}"
						name="catagory_name" class="form-control" /> 
						<span class="text-danger">{{$errors->has('catagory_name') ? $errors->first('catagory_name') : ''}}</span>
						<input type="hidden"
						value="{{ $catagory->id}}" name="catagory_id" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Catagroy Description</label>
				<div class="col-md-6">
					<textarea class="form-control" name="catagory_description">{{ $catagory->catagory_description}}</textarea>
					<span class="text-danger">{{$errors->has('catagory_description') ? $errors->first('catagory_description') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8 col-lg-offset-4">
					<input type="submit" name="btn" class="btn btn-success"
						value="Update Catagory Info" />
				</div>
				
			</div>
			{{ Form::close()}}
		</div>
	</div>
</div>
	@for($i = 0; $i < 11; $i++) 
		<br>
	@endfor
@endsection