
<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">



<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito"
	rel="stylesheet">

<!-- Styles -->

<link href="{{asset('/')}}front/css/bootstrap.css" rel="stylesheet"
	type="text/css" media="all" />
<link href="{{asset('/')}}front/css/style.css" rel="stylesheet"
	type="text/css" media="all" />
<link
	href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900'
	rel='stylesheet' type='text/css'>
<link
	href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic'
	rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css"
	href="{{asset('/')}}front/css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script src="{{asset('/')}}front/js/jquery.min.js"></script>
<script src="{{asset('/')}}front/js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="{{asset('/')}}front/css/megamenu.css" rel="stylesheet"
	type="text/css" media="all" />
	<link href="{{asset('/')}}front/css/etalage.css" rel="stylesheet">
					<script src="{{asset('/')}}front/js/jquery.etalage.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}front/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->





</head>
<body>
<style>

/* Dropdown Button */
.dropbtn {
  background-color: #ebebeb;
  color: #888888;
  padding: 10px;
  font-size: 12px;
  
}

/* The container <div> - needed to position the dropdown content */
.dropdown1 {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown1-content1 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown1-content1 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown1-content1 a:hover {background-color: #ebebeb;}

/* Show the dropdown menu on hover */
.dropdown1:hover .dropdown1-content1 {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown1:hover .dropbtn {background-color: #ebebeb;}

p {
    padding: 5px;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: red;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: red;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: red;
}
</style>
	<!--header-->
	<div class="header">
		<div class="container">
			<div class="main-header">
				<div class="carting">
					<div id="app" class="collapse navbar-collapse"
						id="navbarSupportedContent">
						<!-- Left Side Of Navbar -->
						<ul class="navbar-nav mr-auto">

						</ul>

						<!-- Right Side Of Navbar -->
						<ul class="navbar-nav ml-auto">
							<!-- Authentication Links -->
							@guest
							<li class="nav-item"><a class="nav-link"
								href="{{ route('login') }}">{{ __('Login') }}</a>
							</li> 
							@if(Route::has('register'))
							<li class="nav-item"><a class="nav-link"
								href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
							@endif
						    @else
						<div class="dropdown1"  style="padding:5px">
  						<strong style="padding-left:3px;color:white">{{Auth::user()->name}}</strong>
  						
  					<div class="dropdown1-content1">
    					<a href="{{route('dashboard')}}">DashBoard</a>
    					<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										 SignOut
									</a>

									<form id="logout-form" action="{{ route('logout') }}"
										method="POST" style="display: none;">@csrf</form>
 					 </div>
				</div>
						 @endguest
						</ul>
					</div>
				</div>
				<div class="logo">
					<h3>
						<a href="{{ route('index')}}">{{$company_name}}</a>
					</h3>
				</div>
				<div class="box_1">
					<a href="{{route('showCart')}}">
						<h3>
							My Cart: <img src="{{asset('/')}}front/images/cart.png" alt="" />
							
						</h3>
					</a>
				</div>

				<div class="clearfix"></div>
			</div>

			<!-- start header menu -->
			@include('front-end.header')

			<div class="clearfix"></div>
		</div>
		<div class="caption">
			<h1>A CLASS OF FASHION</h1>
			<h4>This Site Is Under Construction.</h4>
		</div>
	</div>


	<!--  -->
	<main> @yield('body') </main>
	<!--  -->
	<!--fotter-->
	<div class="fotter">
		<div class="container">
	
			<div class="col-md-6 contact">
				@if($errors->has('sender_message') || $errors->has('sender_email') ||$errors->has('sender_name') || $errors->has('sender_subject'))
			<span class="text-danger">Please fill all the fields</span>
			<br>
			@endif
				{{Form::open(['route'=>'SendMessage','method'=>'POST'])}}
					<input type="text" name ="sender_name"  placeholder="Name...">
						 <input
						type="text" name="sender_email"	placeholder="Email...">
						<br><br>
						 <input
						type="text" name="sender_subject" placeholder="Name...">
						
					<textarea name="sender_message" placeholder="Name..."></textarea>
					
					<input type="hidden" name="status" value="1">
					<input type="submit" name="btn" value="SUBMIT" >
				{{Form::close()}}

			</div>
			<div class="col-md-6 ftr-left">
				<div class="ftr-list">
					<ul>
						<li><a href="{{route('index')}}">Home</a></li>
						<li><a href="{{route('contact')}}">Contact</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<h4>FOLLOW US</h4>
				<div class="social-icons">
					 <a href="https://www.facebook.com/ShopNow-2581646365395984/"><span
						class="fb"> </span></a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!--fotter//-->
	<div class="fotter-logo">
		<div class="container">
			<div class="ftr-logo">
			
			<?php 
			     $info = getdate();
			     $year = $info['year'];
			?>
				<h3>
					<a href="{{route('index')}}"><span>{{$company_name}}</span></a>
				</h3>
			</div>
			<div class="ftr-info">
				<p>&copy; {{$year}} All Rights Reseverd by <span>{{$company_name}}</span>.</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!--fotter//-->

</body>
</html>
