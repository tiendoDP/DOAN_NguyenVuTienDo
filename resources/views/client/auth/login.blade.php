
@extends('client.layouts.app')

@section('styles')

@endsection

@section('content')
   <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <div class="nav-link p-4" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false" style="font-size: 30px" >Đăng nhập</div>
                        </li>
                    </ul>
                    @if(!empty(session('error')))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    @if(!empty(session('success')))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="tab-content">
                        
                        <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="register-email-2">Email *</label>
                                    <input type="email" class="form-control" id="register-email-2" name="singin_email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Mật khẩu *</label>
                                    <input type="password" class="form-control" id="register-password-2" name="singin_password" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Đăng nhập</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">Nhớ mật khẩu</label>
                                    </div>
                                </div><!-- End .form-footer -->
                            </form>
                            <div class="form-choice">
                                <p>Chưa có tài khoản? <a href="{{route('register')}}">Đăng ký ngay</a></p>
                                <p class="text-center">Hoặc đăng nhập với</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Đăng nhập với Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Đăng nhập với Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->

@endsection

@section('scripts')

@endsection