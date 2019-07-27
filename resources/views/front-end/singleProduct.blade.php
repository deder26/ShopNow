@extends('front-end.master') 

@section('title') 
Product 
@endsection

@section('body')

<div class="product-main">
	<div class="container">
		<div class="ctnt-bar cntnt">
			<div class="content-bar">
				<div class="single-page">
					<!--Include the Etalage files-->
					
					<!-- Include the Etalage files -->
					<script>
							jQuery(document).ready(function($){
					
								$('#etalage').etalage({
									thumb_image_width: 300,
									thumb_image_height: 400,
									source_image_width: 700,
									source_image_height: 800,
									show_hint: true,
									click_callback: function(image_anchor, instance_id){
										alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
									}
								});
								// This is for the dropdown list example:
								$('.dropdownlist').change(function(){
									etalage_show( $(this).find('option:selected').attr('class') );
								});
					
							});
						</script>
					<!--//details-product-slider-->
					<div class="details-left-slider">
						<ul id="etalage">
							<li>
								<a href=""> 
									<img class="etalage_thumb_image" src="{!! asset($product->product_image) !!}" /> 
									<img class="etalage_source_image" src="{!! asset($product->product_image) !!}" />
								</a>
							</li>
						</ul>
					</div>
					<div class="details-left-info">
						<h3>{{$product->product_name}}</h3>
						<p>
							Tk. {{$product->product_price}}
						</p>
						{{ Form::open(['route'=>'cart','method'=>'POST'])}}
						<p class="qty">Qty ::</p>
						<input min="1" type="number" id="quantity" name="qty"
							value="1" class="form-control input-small">
						<input type="hidden" name="product_id" value="{{$product->id}}"> 
						<div class="btn_form">
							<button type="submit" class="btn btn-success">Add to cart</button>
						</div>
						{{Form::close()}}
						
						<h5>Description ::</h5>
						<p class="desc">{{$product->product_description}}</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@endsection
