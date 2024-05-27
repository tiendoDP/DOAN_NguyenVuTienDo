<div class="intro-slider-container">
    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
            "dots": false,
            "nav": false, 
            "responsive": {
                "992": {
                    "nav": true
                }
            }
        }'>
        <div class="intro-slide" style="background-image: url({{asset('assets/images/demos/demo-6/slider/slide-1.jpg')}});">
            <div class="container intro-content text-center">
                <h3 class="intro-subtitle text-white">Thời trang</h3><!-- End .h3 intro-subtitle -->
                <h1 class="intro-title text-white">phong cách</h1><!-- End .intro-title -->

                <a href="{{route('product_list')}}" class="btn btn-outline-white-4">
                    <span class="font-tv">Khám phá</span>
                </a>
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->

        <div class="intro-slide" style="background-image: url({{asset('assets/images/demos/demo-6/slider/slide-2.jpg')}});">
            <div class="container intro-content text-center">
                <h3 class="intro-subtitle text-white font-tv">Ưu đãi lớn nhất </h3><!-- End .h3 intro-subtitle -->
                <h1 class="intro-title text-white font-tv">trong năm</h1><!-- End .intro-title -->

                <a href="{{route('product_list')}}" class="btn btn-outline-white-4">
                    <span class="font-tv">Khám phá</span>
                </a>
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
    </div><!-- End .intro-slider owl-carousel owl-theme -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div>