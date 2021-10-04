@extends('layouts.front-app')
@section('content')  
@include('pages.banner')
<style type="text/css">
    .w5{
        display: none !important;
    }
</style>
    <div id="arrival-new" class="cv-arrival cv-product-three cv-product-slider spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>New arrivals</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @if(isset($newArrivals) && count($newArrivals)>0)
                            @foreach($newArrivals as $arrival)
                            <div class="swiper-slide">
                                <div class="cv-product-box">
                                    <div class="cv-product-img">
                                        <img src="{{asset('uploads/products/thumbnail/'.$arrival->thumbnail)}}" alt="image" class="img-fluid"/>
                                        <div class="cv-product-button">
                                            <a href="{{route('getSingleProduct', $arrival->slug)}}" class="cv-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
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
                                                </svg> View detail
                                            </a>
                                            <a href="#" class="cv-btn add-to-cart" id="add-to-cart" data-id="{{$arrival->id}}" ><i class="fas fa-cart-plus"></i>add to cart</a>
                                        </div>
                                    </div>
                                    <div class="cv-product-data">
                                        <a href="javascript:;" class="cv-price-title">{{$arrival->title}}</a>
                                        <p class="cv-pdoduct-price">RS {{$arrival->price}}</p>
                                        <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>

    
    
    <!-- testimonial end -->
    <!-- product gallery start -->
     <div  class="cv-product-gallery cv-product-three spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>Product gallery</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cv-product-nav cv-product-tab">
                        <ul>
                            <li><a data-filter="*" class="cv-product-active" >all product</a></li>
                            @foreach($navCategories as $category)
                            <li><a data-filter=".cv-{{$category->id}}" >{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="gallery-product" class="cv-product-all wow fadeIn" >
                        <div class="cv-gallery-grid">
                            @if(isset($products) && count($products)>0)
                            @foreach($products as $product)
                            <div class="cv-product-box cv-product-item cv-{{$product->category_id}} append">
                                <div class="cv-product-img">
                                    <img src="{{asset('uploads/products/thumbnail/'.$product->thumbnail)}}" alt="image" class="img-fluid">
                                    <div class="cv-product-button">
                                        <a href="{{route('getSingleProduct', $product->slug)}}" class="cv-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
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
                                                </svg> View detail
                                        </a>
                                        <a href="#" class="cv-btn add-to-cart" id="add-to-cart" data-id="{{$product->id}}"><i class="fas fa-cart-plus"></i>add to cart</a>
                                    </div>
                                </div>
                                <div class="cv-product-data">
                                    <a href="#" class="cv-price-title">{{$product->title}}</a>
                                    <p class="cv-pdoduct-price">RS {{$product->price}}</p>
                                    <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
       <center> {!!$products->onEachSide(5)->links()!!}</center>
    </div>
    <button type="button" class="btn btn-success btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
@endsection
@push('js')
  <script type="text/javascript">
    $(document).ready(function(){
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
  </script>
@endpush
