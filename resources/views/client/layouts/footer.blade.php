<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{asset('assets/images/logo/1.webp')}}" class="footer-logo" alt="TD Fashion" width="105" height="25">
                        </a>
                    
                        <p>
                            <div>Address: Số 298 Đ. Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội</div>
                            <div>Phone number: +84862 671 500</div>
                            <div>Email: nguyenvutiendo369@gmail.com</div>
                        </p>

                        <div class="social-icons">
                            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                            <a href="#" class="social-icon" target="_blank" title="Pinterest"><i class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{route('contact')}}">About TDFahion</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="{{route('login')}}">Đăng nhập</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Chăm sóc khách hàng</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{route('product_list')}}">Sản phẩm</a></li>
                            <li><a href="{{route('cart.view')}}">Giỏ hàng</a></li>
                            <li><a href="{{route('wishlist.index')}}">Yêu thích</a></li>
                            
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Trang cá nhân</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{route('profile')}}">Tài khoản</a></li>
                            <li><a href="{{route('changePassword')}}">Đổi mật khẩu</a></li>
                            <li><a href="{{route('order')}}">Đơn hàng</a></li>
                            <li><a href="{{route('contact')}}">Trợ giúp</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->
</footer><!-- End .footer -->

