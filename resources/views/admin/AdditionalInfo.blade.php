@extends('admin.dashboard')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Additional Information</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
			{{ Form::open(['route'=>'SaveInfo', 'method'=>'POST','class'=>'form-horizontal', 'enctype' =>'multipart/form-data'])}}
			<div class="form-group">
				<label class="control-label col-md-4">Company Name</label>
				<div class="col-md-6">
					<input type="text" name="company_name" value="{{$info->company_name}}" class="form-control"/>
					<input type="hidden" name="id" value="{{$info->id}}" class="form-control"/>
					<span class="text-danger">{{$errors->has('company_name') ? $errors->first('company_name') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Company Description</label>
				<div class="col-md-6">
					<textarea name="company_description" value="{{$info->company_description}}" class="form-control"></textarea>
					<span class="text-danger">{{$errors->has('company_description') ? $errors->first('company_description') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Contact</label>
				<div class="col-md-6">
					<input type="text" name="company_contact" value="{{$info->company_contact}}" class="form-control" placeholder="+880XXXXXXXXXX"/>
					<span class="text-danger">{{$errors->has('company_contact') ? $errors->first('company_contact') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Email</label>
				<div class="col-md-6">
					<input type="text" name="company_email" value="{{$info->company_email}}" class="form-control" placeholder="abc@gmail.com"/>
					<span class="text-danger">{{$errors->has('company_email') ? $errors->first('company_email') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
					<label class="control-label col-md-4">Address</label>
				<div class="col-md-6">
					<input type="text" name="company_address" value="{{$info->company_address}}" class="form-control" />
					<span class="text-danger">{{$errors->has('company_address') ? $errors->first('company_address') : ''}}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Company Logo</label>
				<div class="col-md-6">
					<input type="file" name="company_logo" accept="image/*" />
					<span class="text-danger">{{$errors->has('company_logo') ? $errors->first('company_logo') : ''}}</span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8 col-lg-offset-4">
					<input type="submit" name="btn" class="btn btn-success"
						value="Save Product Info" />
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