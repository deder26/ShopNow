@extends('front-end.master') 

@section('title') 
Order
@endsection

@section('body')
<div class="container">
	<br>
	<div class="col-md-10">
			
			{{ Form::open(['route'=>'search', 'method'=>'POST','class'=>'form-horizontal'])}}
				
				<input type="text" name="search" placeholder="search">
				
			{{ Form::close() }}
		</div>

	<br>
	<div class="row">
		<div class="col-md-12">
		<br>
			<div class="well text-center text-success">
				Sorry, Search Doesn't Exist.
			</div>
		</div>
	</div>
	
</div>
@endsection


