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

	<div class="col-md-8 col-md-offset-2 well text-success text-center">
			<h4><strong>You can contact us by the message bar bellow or can contact us by:</strong></h4>
			<br>
			<br>
		<div class="col-md-8">
			<h4><strong>Email: </strong><span>{{$contact->company_email}}</span></h4>
		</div>
		<br>
			<br>
		<div class="col-md-8">
			<h4><strong>Mobile: </strong><span>{{$contact->company_contact}}</span></h4>
		</div>

	</div>
</div>
<br>
	<br>
	<br>
	<br>

@endsection