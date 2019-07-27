<!DOCTYPE HTML>
<html>
<head>
<title>
@if(Session::get('user_name'))
{{ Auth::user()->name }}
@endif
</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{asset('/')}}admin/css/bootstrap.css" rel="stylesheet"
	type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{asset('/')}}admin/css/style.css" rel="stylesheet"
	type="text/css" media="all" />
<!--js-->
<script src="{{asset('/')}}admin/js/jquery-2.1.1.min.js"></script>
<!--icons-css-->
<link href="{{asset('/')}}admin/css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic'
	rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600'
	rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="{{asset('/')}}admin/js/Chart.min.js"></script>

<!--skycons-icons-->
<script src="{{asset('/')}}admin/js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<div class="header-main">
					<div class="header-left">
						<div class="logo-name">
							<a href="{{ route('index') }}">
								<h2>ShopNow</h2> <!--<img id="logo" src="" alt="Logo"/>-->
							</a>
						</div>
			
						<div class="clearfix"></div>
					</div>
	
						<!--notification menu end -->
						<div class="profile_details">
							<ul>
								<li class="dropdown profile_details_drop"><a href="#"
									class="dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false">
										<div class="profile_img">
											<span class="prfil-img"><img src="images/p1.png" alt=""> </span>
											<div class="user-name">
												<p>{{ Auth::user()->name }}</p>
			
											</div>
											<i class="fa fa-angle-down lnr"></i> <i
												class="fa fa-angle-up lnr"></i>
											<div class="clearfix"></div>
										</div>
								</a>
									<ul class="dropdown-menu drp-mnu">
										
										<li><a href="{{ route('UserInfo') }}"><i class="fa fa-user"></i>
												Profile</a></li>
										<li><a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
												<i class="fa fa-sign-out"></i> Logout
										</a>
											<form id="logout-form" action="{{ route('logout') }}"
												method="POST" style="display: none;">@csrf</form></li>
									</ul></li>
							</ul>
						</div>
						<div class="clearfix"></div>
				
					<div class="clearfix"></div>
				</div>
				<!--heder end here-->
				<!-- script-for sticky-nav -->
				<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
				<!-- /script-for sticky-nav -->
				<!--inner block start here-->
				<div class="inner-block">
					<main> @yield('dashcontent') </main>
				</div>
				<!--inner block end here-->
				<!--copy rights start here-->

				<!--COPY rights end here-->
			</div>
		</div>


		<!--slider menu-->
		<div class="sidebar-menu">
			<div class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span>
				</a> <a href="#"> <span id="logo"></span> <!--<img id="logo" src="" alt="Logo"/>-->
				</a>
			</div>
			<div class="menu">
				<ul id="menu">
					<li id="menu-home"><a href="{{route('MyProfile')}}"><i
							class="fa fa-tachometer"></i><span>Profile</span></a></li>
					<li id="menu-home"><a href="{{route('purchasedList')}}"><i
							class="fa fa-file-text"></i><span>Purchased List</span></a></li>
					
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!--slide bar menu end here-->
	<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
	<!--scrolling js-->
	<script src="{{asset('/')}}admin/js/jquery.nicescroll.js"></script>
	<script src="{{asset('/')}}admin/js/scripts.js"></script>
	<!--//scrolling js-->
	<script src="{{asset('/')}}admin/js/bootstrap.js"> </script>
	<!-- mother grid end here-->
	<div class="copyrights">
		<?php 
			     $info = getdate();
			     $year = $info['year'];
			?>
		<p>
			© {{$year}}, All Rights Reserved by <span>{{$company_name}}</span>.
		</p>
	</div>
</body>
</html>
