<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="">English</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
            </div><!-- End .header-left -->
            
            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <ul>
                            <li><i class="icon-phone font-tv"></i>Contact: +0862 671 500</li>
                            <li><a href="{{route('wishlist.index')}}" class="font-tv"><i class="icon-heart-o"></i>Yêu thích <span>({{!empty($all_wishlist) ? count($all_wishlist) : 0 }})</span></a></li>
                            <li><a href="{{route('contact')}}" class="font-tv">Thông tin</a></li>
                            <li>                                
                                @if(!empty(Auth::check()) && Auth::User()->role == 0)
                                    <div class="header-dropdown">
                                        <a href="#" class="font-tv">{{Auth::user()->name}}</a>
                                        <div class="header-menu">
                                            <ul style="flex-wrap: wrap; justify-content:center">
                                                <li style="margin: 0; padding: 4px"><a href="{{route('profile')}}" class="font-tv">Tài khoản</a></li>
                                                <li style="margin: 0; padding: 4px"><a href="{{route('changePassword')}}" class="font-tv">Đổi mật khẩu</a></li>
                          
                                                <li style="margin: 0; padding: 4px"><a href="{{route('logout')}}" class="font-tv">Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @else <a href="{{route('login')}}"><i class="icon-user" class="font-tv"></i>Đăng nhập</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('assets/images/logo/1.webp')}}" alt="TD Fashion" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="">
                            <a href="{{route('home')}}" class="pr-0 font-tv">Trang chủ</a>
                        </li>
                        <li class="">
                            <a href="{{route('product_list')}}" class="pr-0 font-tv">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{route('product_list', ['gender' => 0])}}" class="pr-0 font-tv">Nam</a>
                        </li>
                        <li>
                            <a href="{{route('product_list', ['gender' => 1])}}" class="pr-0 font-tv">Nữ</a>
                        </li>
                        <li>
                            <a href="#" class="sf-with-ul font-tv">Pages</a>

                            <ul>
                                <li>
                                    <a href="{{route('contact')}}">Thông tin</a>
                                </li>
                                
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Error 404</a></li>
                            </ul>
                        </li>
                        
                        
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <form action="{{route('product_list')}}" method="GET">
                    <div class="p-1 pl-3 bg-white rounded rounded-pill shadow-sm">
                        <div class="input-group">
                          <input type="search" placeholder="Tìm kiếm ?" name="search" value="{{ request('search') }}"  autocomplete="off" class="form-control border-0 bg-white p-0 pl-3">
                          <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary pl-0" style="border: none"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                    </div>
                </form>
                <div class="dropdown cart-dropdown">
                    <a href="{{route('cart.view')}}" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">
                            {{(!empty($count_cart)) ? $count_cart : '0'}}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        @if(Auth::check() && !empty($all_cart) && count($all_cart) > 0)
                        
                        <div class="dropdown-cart-products">
                            @foreach($all_cart as $cart)
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="#">{{$cart->product_name}}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">{{$cart->quantity}}</span>
                                        x @if($cart->discount != null)
                                        <span class="">{{number_format((int) ($cart->price - ($cart->price * ($cart->discount / 100))), 0 , ',', '.')}}đ</span>
                                        @else <span class="">{{number_format((int) $cart->price, 0 , ',', '.')}}đ</span>
                                        @endif
                                    </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="#" class="product-image">
                                        <img src="{{asset('assets/images/products/'.$cart->image)}}" alt="product">
                                    </a>
                                </figure>
                                <a href="{{ route('cart.delete', ['id' => $cart->id]) }}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div>                           
                            @endforeach
                        </div><!-- End .cart-product -->
                        <div class="dropdown-cart-total">
                            <span>Tổng tiền</span>

                            <span class="cart-total-price">{{number_format((int) ($total), 0 , ',', '.')}} VND</span>
                        </div>

                        <div class="dropdown-cart-action">
                            <a href="{{route('cart.view')}}" class="btn btn-primary">Giỏ hàng</a>
                            <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Thanh toán</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                        @else <p class="text-center">Chưa có sản phẩm nào</p>
                        @endif
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->
