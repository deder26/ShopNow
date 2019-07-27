@extends('front-end.master') 

@section('title') 
Order
@endsection

@section('body')
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-12">
		<br>
			<div class="well text-center text-success">
				Congratulations <strong>{{Session::get('user_name')}}</strong>. Your Order has been submitted. We will contact you soon. Thanks for being with ShopNow. Happy Shopping.
			</div>
		</div>
	</div>
	
</div>
@endsection

