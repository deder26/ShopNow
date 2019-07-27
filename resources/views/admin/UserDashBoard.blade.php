@extends('admin.dashboard') 

@section('dashcontent')
<!--inner block start here-->

<!--market updates updates-->
<div class="market-updates">
<div class="row">
	<div class="col-md-8 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-8 market-update-left">
				<h3>{{$cnt}}</h3>
				<h4>Registered User</h4>
				
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-file-text-o"> </i>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
	<br>
	<div class="row">
	<div class="col-md-8 market-update-gd">
		<div class="market-update-block clr-block-2">
			<div class="col-md-8 market-update-left">
				<h3>{{$ordCnt}}</h3>
				<h4>Order Placed</h4>
				
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-file-text-o"> </i>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</div>
	<br>
	<div class="row">
	<div class="col-md-8 market-update-gd">
		<div class="market-update-block clr-block-3">
			<div class="col-md-8 market-update-left">
				<h3>{{$msgCnt}}</h3>
				<h4>New Messages</h4>
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-envelope-o"> </i>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</div>
	<div class="clearfix"></div>
</div>

<!--inner block end here-->
@endsection
