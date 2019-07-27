

<ul class="megamenu skyblue">
	<li><a href="{{ route('index')}}">Home</a></li> 
	@foreach($catagories as $catagory)
	<li class="grid"><a href="{{ route('CatagoryProductView',['id'=>$catagory->id,'cname'=>$catagory->catagory_name]) }}">{{ $catagory->catagory_name }}</a>
		<div class="megapanel">
			<div class="row">
				<div class="col1">
					<div class="h_nav">
						<h4>shop</h4>
						<ul>
							@foreach($productTypes->where('catagory_id',$catagory->id) as $productType)
							<li>
								<a href="{{ route('ProductView',['id'=>$productType->id,'pname'=>$productType->productType_name,'cname'=>$catagory->catagory_name]) }}">{{$productType->productType_name}}</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</li> 
	@endforeach
	<li class="grid"><a href="{{route('aboutUs')}}">ABOUT US</a></li>
</ul>
