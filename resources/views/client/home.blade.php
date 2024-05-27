@extends('client.layouts.app')

@section('styles')

@endsection

@section('content')
            @include('client.layouts.slider')
            <div class="pt-2 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="assets/images/demos/demo-6/banners/banner-1.jpg" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-center">
                                    <h4 class="banner-subtitle text-white font-tv">Mới nhất</h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><strong class="font-tv">Nữ</strong></h3><!-- End .banner-title -->
                                    <a href="{{route('product_list', ['gender' => 1])}}" class="btn btn-outline-white banner-link underline font-tv">Mua ngay</a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-sm-6 -->

                        <div class="col-sm-6">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="assets/images/demos/demo-6/banners/banner-2.jpg" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-center">
                                    <h4 class="banner-subtitle text-white font-tv">Mới nhất</h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><strong class="font-tv">Nam</strong></h3><!-- End .banner-title -->
                                    <a href="{{route('product_list', ['gender' => 0])}}" class="btn btn-outline-white banner-link underline font-tv">Mua ngay</a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->
                    <hr class="mt-0 mb-0">
                </div><!-- End .container -->
            </div><!-- End .bg-gray -->

            <div class="mb-5"></div><!-- End .mb-5 -->
            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title font-tv">Nổi bật</h2><!-- End .title -->

                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-tv" id="trending-all-link" data-toggle="tab" href="#trending-all-tab" role="tab" aria-controls="trending-all-tab" aria-selected="true">Tất cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-tv" id="trending-women-link" data-toggle="tab" href="#trending-women-tab" role="tab" aria-controls="trending-women-tab" aria-selected="false">Nữ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-tv" id="trending-men-link" data-toggle="tab" href="#trending-men-tab" role="tab" aria-controls="trending-men-tab" aria-selected="false">Nam</a>
                        </li>
                    </ul>
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel" aria-labelledby="trending-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>

                            @if(!empty($all_product))
                                @foreach($all_product as $item)
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if($item->discount != null)
                                                <span class="product-label label-sale">Sale</span>
                                        @endif
                                        <a href="{{route('product', ['id' => $item->id])}}">
                                            <img src="{{asset('assets/images/products/'.$item->image)}}" alt="Product image" class="product-image">
                                            {{-- <img src="assets/images/demos/demo-6/products/product-1-1.jpg" alt="Product image" class="product-image-hover"> --}}
                                        </a>
    
                                        <div class="product-action-vertical">
                                            <a href="{{route('wishlist.add', ['id' => $item->id])}}" class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                                        </div><!-- End .product-action-vertical -->
    
                                        
                                        <div class="product-action">
                                            <a href="{{route('cart.add', ['id' => $item->id])}}" class="btn-product btn-cart"><span>Thêm vào giỏ</span></a>
                                        </div>
                                    </figure>
    
                                    <div class="product-body">
                                        <div class="product-cat">
                                            <span>{{$item->category_name}}</span>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route('product', ['id' => $item->id])}}">{{$item->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            @if($item->discount != null)
                                                <span class="new-price">Now đ {{number_format((int) ($item->price - ($item->price * ($item->discount / 100))), 0 , ',', '.')}}</span>
                                                <span class="old-price">Was đ {{number_format((int) $item->price, 0 , ',', '.')}}</span>
                                                @else <span class="">đ {{number_format((int) $item->price, 0 , ',', '.')}}</span>
                                            @endif
                                        </div><!-- End .product-price -->
    
                                    </div><!-- End .product-body -->
                                </div>
                                @endforeach
                            @endif
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-women-tab" role="tabpanel" aria-labelledby="trending-women-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":0
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>

                            @if(!empty($women_record))
                                @foreach($women_record as $item)
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if($item->discount != null)
                                                <span class="product-label label-sale">Sale</span>
                                        @endif
                                        <a href="{{route('product', ['id' => $item->id])}}">
                                            <img src="{{asset('assets/images/products/'.$item->image)}}" alt="Product image" class="product-image">
                                            {{-- <img src="assets/images/demos/demo-6/products/product-1-1.jpg" alt="Product image" class="product-image-hover"> --}}
                                        </a>
    
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                                        </div><!-- End .product-action-vertical -->
    
                                        
                                        <div class="product-action">
                                            <a href="{{route('cart.add', ['id' => $item->id])}}" class="btn-product btn-cart"><span>Thêm vào giỏ</span></a>
                                        </div>
                                    </figure>
    
                                    <div class="product-body">
                                        <div class="product-cat">
                                            <span>{{$item->category_name}}</span>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route('product', ['id' => $item->id])}}">{{$item->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            @if($item->discount != null)
                                            <span class="new-price">Now đ {{number_format((int) ($item->price - ($item->price * ($item->discount / 100))), 0 , ',', '.')}}</span>
                                            <span class="old-price">Was đ {{number_format((int) $item->price, 0 , ',', '.')}}</span>
                                            @else <span class="">đ {{number_format((int) $item->price, 0 , ',', '.')}}</span>
                                            @endif
                                        </div><!-- End .product-price -->
    
                                    </div><!-- End .product-body -->
                                </div>
                                @endforeach
                            @endif
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane p-0 fade" id="trending-men-tab" role="tabpanel" aria-labelledby="trending-men-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":0
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                            @if(!empty($men_record))
                                @foreach($men_record as $item)
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if($item->discount != null)
                                                <span class="product-label label-sale">Sale</span>
                                        @endif
                                        <a href="{{route('product', ['id' => $item->id])}}">
                                            <img src="{{asset('assets/images/products/'.$item->image)}}" alt="Product image" class="product-image">
                                            {{-- <img src="assets/images/demos/demo-6/products/product-1-1.jpg" alt="Product image" class="product-image-hover"> --}}
                                        </a>
    
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                                        </div><!-- End .product-action-vertical -->
    
                                        
                                        <div class="product-action">
                                            <a href="{{route('cart.add', ['id' => $item->id])}}" class="btn-product btn-cart"><span>Thêm vào giỏ</span></a>
                                        </div>
                                    </figure>
    
                                    <div class="product-body">
                                        <div class="product-cat">
                                            <span>{{$item->category_name}}</span>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route('product', ['id' => $item->id])}}">{{$item->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            @if($item->discount != null)
                                            <span class="new-price">Now đ {{number_format((int) ($item->price - ($item->price * ($item->discount / 100))), 0 , ',', '.')}}</span>
                                            <span class="old-price">Was đ {{number_format((int) $item->price, 0 , ',', '.')}}</span>
                                            @else <span class="">đ {{number_format((int) $item->price, 0 , ',', '.')}}</span>
                                            @endif
                                        </div><!-- End .product-price -->
    
                                    </div><!-- End .product-body -->
                                </div>
                                @endforeach
                            @endif
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb-5 -->

            <div class="deal bg-image pt-8 pb-8" style="background-image: url(assets/images/demos/demo-6/deal/bg-1.jpg);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-8 col-lg-6">
                            <div class="deal-content text-center">
                                <h4 class="font-tv">Giới hạn số lượng. </h4>
                                <h2 class="font-tv">Khuyến mãi trong ngày</h2>
                                <div class="deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                            </div><!-- End .deal-content -->
                            <div class="row deal-products">
                                <div class="col-6 deal-product text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-6/deal/product-1.jpg" alt="Product image" class="product-image">
                                        </a>

                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Quần short cotton co giãn</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">đ 99.000</span>
                                            {{-- <span class="old-price">Was $30.99</span> --}}
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <a href="#" class="action">Mua ngay</a>
                                </div>
                                <div class="col-6 deal-product text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-6/deal/product-2.jpg" alt="Product image" class="product-image">
                                        </a>

                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="#">Áo len dệt kim mịn</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">đ 149.000</span>
                                            {{-- <span class="old-price">Was $17.99</span> --}}
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <a href="category.html" class="action">Mua ngay</a>
                                </div>
                            </div>
                        </div><!-- End .col-lg-5 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .deal -->

            <div class="pt-4 pb-3" style="background-color: #222;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-sm-6">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-truck"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Thanh toán & Giao hàng</h3><!-- End .icon-box-title -->
                                    <p class="font-tv">Miễn phí giao hàng</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-3 col-sm-6 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-rotate-left"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Trả hàng & Hoàn tiền</h3><!-- End .icon-box-title -->
                                    <p class="font-tv">Hỗ trợ trả hàng trong 7 ngày</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-3 col-sm-6 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-unlock"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Bảo mật thanh toán</h3><!-- End .icon-box-title -->
                                    <p class="font-tv">100% bảo mật thanh toán</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-3 col-sm-6 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-headphones"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Hỗ trợ nhiệt tình</h3><!-- End .icon-box-title -->
                                    <p class="font-tv">Luôn luôn phản hồi 24/7</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-3 col-sm-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-light pt-2 pb-2 -->

            <div class="mb-6"></div><!-- End .mb-5 -->

            <div class="container">
                <h2 class="title text-center mb-4 font-tv" >Xu hướng mới</h2><!-- End .title text-center -->

                <div class="products">
                    <div class="row justify-content-center">

                        @if(!empty($new_product))
                            @foreach ($new_product as $item)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            @if($item->discount != null)
                                                <span class="product-label label-sale">Sale</span>
                                            @endif
                                            <a href="{{route('product', ['id' => $item->id])}}">
                                                <img src="{{asset('assets/images/products/'.$item->image)}}" alt="Product image" class="product-image">
                                            </a>
        
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable font-tv"><span>Yêu thích</span></a>
                                            </div><!-- End .product-action-vertical -->
        
                                            <div class="product-action">
                                                <a href="{{route('cart.add', ['id' => $item->id])}}" class="btn-product btn-cart font-tv"><span>Thêm vào giỏ</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->
        
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <span>{{$item->category_name}}</span>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title font-tv"><a class="font-tv" href="{{route('product', ['id' => $item->id])}}">{{$item->name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                @if($item->discount != null)
                                                <span class="new-price">Now đ {{number_format((int) ($item->price - ($item->price * ($item->discount / 100))), 0 , ',', '.')}}</span>
                                                <span class="old-price">Was đ {{number_format((int) $item->price, 0 , ',', '.')}}</span>
                                                @else <span class="">đ {{number_format((int) $item->price, 0 , ',', '.')}}</span>
                                                @endif
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div>
                                </div>
                            @endforeach
                        @endif
                            
                    </div><!-- End .row -->
                </div><!-- End .products -->

                <div class="more-container text-center mt-2">
                    <a href="{{route('product_list')}}" class="btn btn-outline-dark-2 btn-more font-tv"><span>Mở rộng</span></a>
                </div><!-- End .more-container -->
            </div><!-- End .container -->

            <div class="pb-3">
                <div class="container brands pt-5 pt-lg-7 ">

                    <h2 class="title text-center mb-4 font-tv">Thương hiệu</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                        <a href="#" class="brand">
                            <img src="assets/images/brands/1.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/2.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/3.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/4.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/5.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/6.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/7.png" alt="Brand Name">
                        </a>
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->

                <div class="mb-5 mb-lg-7"></div><!-- End .mb-5 -->

                <div class="container newsletter">
                    @if(Auth::Check())
                    <div class="row">
                        <img src="{{asset('assets/images/banners/banner-fullwidth.jpg')}}" class="img-responsive img-centered img" alt="" />
                    </div>
                    @else 
                    <div class="row">
                        <div class="col-lg-6 banner-overlay-div">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="assets/images/demos/demo-6/banners/banner-3.jpg" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-center">
                                    <h4 class="banner-subtitle text-white"><a href="#">Duy nhất ngay hôm nay.</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#"></a></h3><!-- End .banner-title -->
                                    <a href="{{route('product_list')}}" class="btn btn-outline-white banner-link underline">Shop Now</a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-6 -->

                        <div class="col-lg-6 d-flex align-items-stretch subscribe-div">
                            <div class="cta cta-box">
                                <div class="cta-content">
                                    <h3 class="cta-title">Đăng ký nhận ưu đãi ngay hôm nay</h3><!-- End .cta-title -->
                                    <p class="font-tv">Đăng ký ngay để nhận <span class="primary-color font-tv">10% discount</span> trong đơn hàng đầu tiên. </p>
                                    <div class="text-center">
                                        <a href="{{route('register')}}" >
                                            <button class="btn btn-outline-dark-2 font-tv" type="submit"><span>Đăng ký ngay</span></i></button>
                                        </a>
                                    </div><!-- End .text-center -->
                                </div><!-- End .cta-content -->
                            </div><!-- End .cta -->
                        </div><!-- End .col-lg-6 -->
                    </div>
                    @endif
                </div><!-- End .container -->
            </div><!-- End .bg-gray -->

            <div class="mb-2"></div><!-- End .mb-5 -->
            
            <div class="container">
            </div><!-- End .container -->
            
            <div class="blog-posts mb-5">
                <div class="container">
                    <h2 class="title text-center mb-4 font-tv">Tin tức</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple mb-3" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                        <article class="entry">
                            <figure class="entry-media">
                                <div>
                                    <img src="assets/images/demos/demo-6/blog/post-1.jpg" alt="image desc">
                                </div>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">
                                <div class="entry-meta">
                                    <a href="#">2024</a>, 0 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <div>Blog 1.</div>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <div class="read-more">Read More</div>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <figure class="entry-media">
                                <div>
                                    <img src="assets/images/demos/demo-6/blog/post-2.jpg" alt="image desc">
                                </div>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">
                                <div class="entry-meta">
                                    <a href="#">2024</a>, 0 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <div>Blog 2.</div>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <div class="read-more">Read More</div>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <figure class="entry-media">
                                <div>
                                    <img src="assets/images/demos/demo-6/blog/post-3.jpg" alt="image desc">
                                </div>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">
                                <div class="entry-meta">
                                    <a href="#">2024</a>, 0 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <div>Blog 3.</div>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <div class="read-more">Read More</div>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .blog-posts -->
@endsection

@section('scripts')

@endsection