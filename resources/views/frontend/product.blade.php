@extends('layouts.front-app')
@section('content')
<link href="{{asset('src/jquery.exzoom.css')}}" rel="stylesheet">
<div class="cv-main-wrapper">
	@include('pages.breadcrumb')
	<div class="cv-product-single spacer-top spacer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="exzoom" id="exzoom">
							<!-- Images -->
							<div class="exzoom_img_box">
								<ul class='exzoom_img_ul'>
									<li>
										<img src="{{asset('uploads/products/thumbnail/'.$product->thumbnail)}}">
									</li>
									@foreach($product->thumbnails as $thumb)
									<li><img src="{{asset('uploads/products/thumbnail/'.$thumb->thumbnail)}}"/></li>
									@endforeach
								</ul>
							</div>
							<!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
							<div class="exzoom_nav"></div>
							<!-- Nav Buttons -->
							<p class="exzoom_btn">
								<a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
								<a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
							</p>
						</div>


						
						<div class="col-sm-7">
							<div class="cv-prod-content">
								<h2 class="cv-price-title">{{$product->title}}</h2>
								<p class="cv-pdoduct-price"><del>RS {{$product->price + $product->discount}}</del>RS {{$product->price}}</p>
								<div class="cv-prod-category">
									<span>Category :</span>
									<a href="#" class="cv-prod-category">{{$product->category->title}}</a>
								</div>
								<p class="cv-rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</p>
							</div>
							<div class="cv-prod-count">
								<div class="cv-cart-quantity">
									<a href="#" class="cv-btn add-to-cart" data-id="{{$product->id}}"><i class="fas fa-cart-plus"></i>add to cart</a>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="cv-prod-text">
								<p>{{$product->summary}}</p>
							</div>
						</div>
					</div>
					<div class="cv-shop-tab">
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-link active" data-toggle="tab" href="#cv-pro-description" role="tab" aria-selected="true">description</a>
						</div>
						<div class="tab-content cv-tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="cv-pro-description">
								<p><p>{!! $product->description !!}</p></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="cv-shop-sidebar">
						<div class="cv-widget cv-search">
							<h2 class="cv-sidebar-title">Product Search</h2>
							<form>
								<input type="text" placeholder="Product Search"/>
								<button class="cv-btn">search</button>
							</form>
						</div>
						<div class="cv-widget cv-product-category">
							<h2 class="cv-sidebar-title">Categories</h2>
							<ul>
								@foreach($navCategories as $category)
								<li><a href="#">{{$category->title}}</a></li>
								@endforeach
							</ul>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop end -->
	<!-- related product start -->
	<div class="cv-arrival cv-related-product cv-product-slider spacer-top-less">
		<div class="container">
			<div class="cv-heading">
				<h1>Related products</h1>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@foreach($products as $p)
							<div class="swiper-slide">
								<div class="cv-product-box">
									<div class="cv-product-img">
										<img src="{{asset('uploads/products/thumbnail/'.$p->thumbnail)}}" alt="image" class="img-fluid"/>
										<div class="cv-product-button">
											<a href="{{route('getSingleProduct', $p->slug)}}" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
												<g>
													<path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
														S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
													c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
												</g>
												<g>
													<path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
														c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
														C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
													s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
												</g>
											</svg> View detail</a>
											<a href="#" class="cv-btn add-to-cart" data-id="{{$p->id}}"><i class="fas fa-cart-plus"></i>add to cart</a>
										</div>
									</div>
									<div class="cv-product-data">
										<a href="javascript:;" class="cv-price-title">{{$product->title}}</a>
										<p class="cv-pdoduct-price">RS {{$p->price}}</p>
										<p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>
	</div>
	
	<button type="button" class="btn btn-success btn-floating btn-lg" id="btn-back-to-top">
	<i class="fas fa-arrow-up"></i>
	</button>
</div>
@endsection
@push('js')
<script src="{{asset('src/jquery.exzoom.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.thumb-click').on('click', function(e){
			e.preventDefault();
			var img = $(this).data('src');
			$('#image-show').attr('src', img);
		});
		 $('.add-to-cart').on('click', function(e){
            var id = $(this).data('id');
            $.ajax({
                 url:"{{route('addToCart')}}",
                 method:'get',
                 data:{id:id},
                 dataType:'json',
                 success:function(data)
                 {
                    $('#cart_no').html(data.qty);
                    console.log(data);
                 },
                 error: function(e) {
                  console.log(e.responseText);
                 }

            });
        });
	});

	$(function(){

  $("#exzoom").exzoom({

    // thumbnail nav options
    "navWidth": 60,
    "navHeight": 60,
    "navItemNum": 5,
    "navItemMargin": 7,
    "navBorder": 1,

    // autoplay
    "autoPlay": false,

    // autoplay interval in milliseconds
    "autoPlayTimeout": 2000
    
  });

});


</script>
@endpush