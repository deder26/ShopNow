@extends('admin.dashboard')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Manage Catagory Form</h4>
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
					<th>Catagory Description</th>
					<th>Action</th>
				</tr>
				@php($i=1) @foreach($catagories as $catagory)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $catagory->catagory_name}}</td>
					<td>{{ $catagory->catagory_description}}</td>
					<td><a
						href="{{route('catagory-edit',['catagory'=>$catagory->id])}}"
						class="btn btn-success btn-xs"> <span
							class="glyphicon glyphicon-edit"></span>
					</a> <a
						href="{{route('catagory-delete',['catagory'=>$catagory->id])}}"
						class="btn btn-danger btn-xs"
						onclick="return confirm('Are you sure!!!')"> <span
							class="glyphicon glyphicon-trash"></span>
					</a></td>
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
