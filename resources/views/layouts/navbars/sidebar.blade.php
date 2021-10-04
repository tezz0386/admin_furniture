<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                {{ __("Creative Tim") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'sitesetting') active @endif">
                <a class="nav-link" href="{{route('sitesetting.index')}}">
                    <i class="nc-icon nc-settings-gear-64"></i>
                    <p>{{ __("Site Setting") }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#category" @if($activeButton =='category') aria-expanded="true" @endif>
                    <i class="nc-icon nc-tablet-2"></i>
                    <p>
                        {{ __('Category') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='category') show @endif" id="category">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'categories') active @endif">
                            <a class="nav-link" href="{{route('category.index')}}">
                                <i class="nc-icon nc-bullet-list-67"></i>
                                <p>{{ __("Category List") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'add-category') active @endif">
                            <a class="nav-link" href="{{route('category.create')}}">
                                <i class="nc-icon nc-simple-add"></i>
                                <p>{{ __("Add Category") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#product" @if($activeButton =='product') aria-expanded="true" @endif>
                    <i class="nc-icon nc-vector"></i>
                    <p>
                        {{ __('Product') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='product') show @endif" id="product">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'products') active @endif">
                            <a class="nav-link" href="{{route('product.index')}}">
                                <i class="nc-icon nc-bullet-list-67"></i>
                                <p>{{ __("Product List") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'add-product') active @endif">
                            <a class="nav-link" href="{{route('product.create')}}">
                                <i class="nc-icon nc-simple-add"></i>
                                <p>{{ __("Add Product") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @if($activePage == 'table') active @endif">
                <a class="nav-link" href="{{route('page.index', 'table')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Order") }}</p>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton =='laravel') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Laravel example') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{route('profile.edit')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("User Profile") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("User Management") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if($activePage == 'table') active @endif">
                <a class="nav-link" href="{{route('page.index', 'table')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Table List") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'typography') active @endif">
                <a class="nav-link" href="{{route('page.index', 'typography')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Typography") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'icons') active @endif">
                <a class="nav-link" href="{{route('page.index', 'icons')}}">
                    <i class="nc-icon nc-atom"></i>
                    <p>{{ __("Icons") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="{{route('page.index', 'maps')}}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __("Maps") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'notifications') active @endif">
                <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __("Notifications") }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
