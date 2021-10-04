<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarkeshwor -Home </title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="shortcut icon" href="{{asset('uploads/setting/thumbnail/'.$setting->icon)}}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- top header start -->
        <div class="cv-top-header-two">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="cv-head-contact">
                            <p><a href=""><i class="fas fa-phone-alt"></i>{{$setting->contact}}</a></p>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="cv-head-email">
                            <h3> <i class="fas fa-envelope"></i><a href="{{$setting->email}}">{{$setting->email}}</a></h3>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- top header end -->
        <!-- main header start -->
        <div class="cv-header-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-7">
                        <div class="cv-logo">
                            <a href="{{route('index')}}"> <img src="{{asset('assets/images/logo.png')}}" alt="image" class="img-fluid"/> </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-5">
                        <div class="cv-nav-bar">
                            <div class="cv-menu">
                                <ul>
                                    <li class="active"><a href="{{route('index')}}">Home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li class="cv-children-menu cv-mega-li"><a href="javascript:;">Products</a>
                                    <div class="cv-mega-menu">
                                        <div class="cm-menu-list">
                                            <ul class="list-inline">
                                                @foreach($navCategories as $category)
                                                <li class="list-inline-item m-2">
                                                    <h3><a href="#">{{$category->title}}</a></h3>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="event.html">Events</a></li>
                                <li><a href="partner.html">Our Partners</a></li>
                                <li><a href="carrer.html">Carrers</a></li>
                                <li><a href="{{route('getContact')}}">Contact</a></li>
                            </ul>
                        </div>
                        <div class="cv-head-icon">
                            <ul>
                                <li>
                                    <a href="{{route('getCart')}}" class="my-cart">
                                        <span id="cart_no" class="counter">
                                            {{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="cv-toggle-nav">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main header end -->
    @yield('content')
    <!-- footer start -->
    <div class="cv-footer cv-footer-two spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="cv-foot-box cv-foot-logo">
                        <div class="cv-logo">
                            <a href="{{route('index')}}"> <img src="{{asset('assets/images/logo.png')}}" alt="image" class="img-fluid"/> </a>
                        </div>
                        <p>{{Substr($setting->description, 0, 400)}}</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="cv-foot-box cv-foot-links">
                        <h2>Categories</h2>
                        <ul>
                            @foreach($navCategories as $category)
                            <li><a href="#">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="cv-foot-box cv-foot-links">
                        <h2>Contacts</h2>
                        <p><span>Contact : </span>{{$setting->contact_no}}</p>
                        <p><span>Email : </span>{{$setting->email}}</p>
                        <p><span>Address : </span>{{$setting->address}}</p>
                        <ul class="cv-foot-social">
                            <li><a href="https://www.facebook.com/">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg>
                            </a></li>
                            <li><a href="https://twitter.com/">
                                <svg viewBox="-21 -81 681.33464 681" xmlns="http://www.w3.org/2000/svg"><path d="m200.964844 515.292969c241.050781 0 372.871094-199.703125 372.871094-372.871094 0-5.671875-.117188-11.320313-.371094-16.9375 25.585937-18.5 47.824218-41.585937 65.371094-67.863281-23.480469 10.441406-48.753907 17.460937-75.257813 20.636718 27.054687-16.230468 47.828125-41.894531 57.625-72.488281-25.320313 15.011719-53.363281 25.917969-83.214844 31.808594-23.914062-25.472656-57.964843-41.402344-95.664062-41.402344-72.367188 0-131.058594 58.6875-131.058594 131.03125 0 10.289063 1.152344 20.289063 3.398437 29.882813-108.917968-5.480469-205.503906-57.625-270.132812-136.921875-11.25 19.363281-17.742188 41.863281-17.742188 65.871093 0 45.460938 23.136719 85.605469 58.316407 109.082032-21.5-.660156-41.695313-6.5625-59.351563-16.386719-.019531.550781-.019531 1.085937-.019531 1.671875 0 63.46875 45.171875 116.460938 105.144531 128.46875-11.015625 2.996094-22.605468 4.609375-34.558594 4.609375-8.429687 0-16.648437-.828125-24.632812-2.363281 16.683594 52.070312 65.066406 89.960937 122.425781 91.023437-44.855469 35.15625-101.359375 56.097657-162.769531 56.097657-10.5625 0-21.003906-.605469-31.2617188-1.816407 57.9999998 37.175781 126.8710938 58.871094 200.8867188 58.871094"/></svg>
                            </a></li>
                            <li><a href="https://www.instagram.com/">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.004 5.838c-3.403 0-6.158 2.758-6.158 6.158 0 3.403 2.758 6.158 6.158 6.158 3.403 0 6.158-2.758 6.158-6.158 0-3.403-2.758-6.158-6.158-6.158zm0 10.155c-2.209 0-3.997-1.789-3.997-3.997s1.789-3.997 3.997-3.997 3.997 1.789 3.997 3.997c.001 2.208-1.788 3.997-3.997 3.997z"/><path d="m16.948.076c-2.208-.103-7.677-.098-9.887 0-1.942.091-3.655.56-5.036 1.941-2.308 2.308-2.013 5.418-2.013 9.979 0 4.668-.26 7.706 2.013 9.979 2.317 2.316 5.472 2.013 9.979 2.013 4.624 0 6.22.003 7.855-.63 2.223-.863 3.901-2.85 4.065-6.419.104-2.209.098-7.677 0-9.887-.198-4.213-2.459-6.768-6.976-6.976zm3.495 20.372c-1.513 1.513-3.612 1.378-8.468 1.378-5 0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453 0-5.525-.567-9.504 4.978-9.788 1.274-.045 1.649-.06 4.856-.06l.045.03c5.329 0 9.51-.558 9.761 4.986.057 1.265.07 1.645.07 4.847-.001 4.942.093 6.959-1.394 8.453z"/><circle cx="18.406" cy="5.595" r="1.439"/></svg>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cv-foot-box cv-foot-contact">
                        <h2>Location</h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3530.7907525040914!2d85.29862711246379!3d27.754599328863574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1f32faa66423%3A0x35e46aa95b1a82d9!2zQmFuZ2FsYW11a2hpIFRlbXBsZSDgpKzgpJfgpLLgpL7gpK7gpYHgpJbgpYAg4KSu4KSo4KWN4KSm4KS_4KSw!5e0!3m2!1sen!2snp!4v1631617756802!5m2!1sen!2snp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.min.js')}}"></script>
    <script src="{{asset('assets/js/SmoothScroll.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/ui_range_slider.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::render() !!}
    @stack('js')
</body>
</html>