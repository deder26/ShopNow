@extends('front-end.master') 

@section('title') 
ShopNow
@endsection

@section('body')

<div class="features" id="features">
	<div class="container">
		<div class="tabs-box">
					<div class="row">
		<div class="col-md-10">
			
			{{ Form::open(['route'=>'search', 'method'=>'POST','class'=>'form-horizontal'])}}
				
				<input type="text" name="search" placeholder="search">
				
			{{ Form::close() }}
		</div>
	</div>
			<div class="clearfix"></div>
			@foreach($products as $product)
			<div class="tab-grids">
				<div id="tab1" class="tab-grid1">
					<a href="{{route('singleProduct',['id'=>$product->id])}}"><div class="product-grid">
							<div class="more-product-info">
								<span>NEW</span>
							</div>
							<div class="product-img b-link-stripe b-animate-go  thickbox">
								<img src="{{asset($product->product_image)}}" class="img-responsive" alt="" />
								<div class="b-wrapper">
									<h4 class="b-animate b-from-left  b-delay03">
										<button class="btns">ORDER NOW</button>
									</h4>
								</div>
							</div>
					</a>
					
					<div class="product-info simpleCart_shelfItem">
						<div class="product-info-cust">
							<h4>{{$product->product_name}}</h4>
							<span class="item_price">Tk. {{$product->product_price}}</span> 
							<a href="{{route('singleProduct',['id'=>$product->id])}}"><input type="button" class="item_add" value="Add to cart"></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			@endforeach
			
			<div class="row">
				<div class="col-md-12 text-center">
					{{$products->links()}}
				</div>
			</div>

		</div>

		<!-- tabs-box -->
		<!-- Comman-js-files -->
		<script>
			$(document).ready(function() {
				$("#tab2").hide();
				$("#tab3").hide();
				$(".tabs-menu a").click(function(event){
					event.preventDefault();
					var tab=$(this).attr("href");
					$(".tab-grid1,.tab-grid2,.tab-grid3").not(tab).css("display","none");
					$(tab).fadeIn("slow");
				});
				$("ul.tabs-menu li a").click(function(){
					$(this).parent().addClass("active a");
					$(this).parent().siblings().removeClass("active a");
				});
			});
			</script>
		<!-- Comman-js-files -->
	</div>
</div>
@endsection


