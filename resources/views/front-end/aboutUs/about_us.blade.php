@extends('front-end.master')

@section('title')
About Us
@endsection

@section('body')

<div class="row">
	<br>
	<br>
	<br>
	<br>
	<div class="col-md-8 col-md-offset-2 well">
	<table class="table table-bordered">
		<tr>
		@if($about->company_description)
		<th><img src="{{asset($about->company_logo)}}" height="100px" width="100px"></td>
		<th>{{$about->company_description}}</td>
		@endif
		</tr>
		
	</table>
	</div>
	<br>
	<br>
	<br>
	<br>
</div>

@endsection