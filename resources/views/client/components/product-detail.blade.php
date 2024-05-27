@extends('client.layouts.app')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        .imagePreview {
            margin: 0 16px;
            max-width: 240px;
        }

        .imagePreview .icon {
            color: black
        }

        .carousel-inner img {
            border-radius: 12px;
            max-width: 100%;
            height: 250px;
        }

        .fileInput {
            display: none;
        }

        .textInput {
            width: 100%;
            border: none;
            border-bottom: 1px solid aqua;
            outline: none;
            margin-bottom: 12px;
        }

        .fileLabel {
            cursor: pointer;
        }

        .fileLabel i {
            font-size: 22px;
            margin-left: 22px;
        }

        .mySlides {
            display: none
        }

        .w3-left,
        .w3-right,
        .w3-badge {
            cursor: pointer
        }

        .w3-badge {
            height: 13px;
            width: 13px;
            padding: 0
        }

        /* size */

        .small-label {
            font-size: 10px;
        }

        .btn-size {
            border-radius: 12px;
            padding: 6px 12px;
            margin-right: 6px;
            font-size: 10px;
        }

        .btn-size input[type="radio"] {
            display: none;
        }

        .btn-size label {
            margin-bottom: 0;
        }

        .btn-size input[type="radio"]:checked+label {
            background-color: #007bff;
            color: #fff;
        }

        .btn-size input[type="radio"]:checked+label:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-size label:hover {
            background-color: #f2f2f2;
            color: #007bff;
        }

        .details-row-size {
            margin-bottom: 10px;
        }

        .input-radio {
            min-width: 20px !important;
            margin: 4px 8px !important;
            background-color: #fff !important;
            color: #000;
        }

        .input-radio:hover {
            background-color: #971313 !important;
            color: #fff;
        }

        .active.input-radio {
            background-color: #971313 !important;
            color: #fff;
        }


        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: start;
        }

        .star-rating label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input[type="radio"]:checked ~ label {
            color: #ffc107;
        }

        /* Điều chỉnh hiển thị các sao được chọn từ bên trái */
        .star-rating input[type="radio"]:checked ~ label:nth-last-child(-n+3) {
            color: #ffc107;
        }

        .modal-footer button {
            min-width: max-content !important;
            border-radius: 6px;
        }

        .reviews,  .reviews a, .reviews p{
            font-family: "Inter", sans-serif !important;
        }

    </style>
@endsection

@include('client.components.Models.comment')



@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('assets/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">Product<span>Detail</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">

            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom"
                                            src="{{ asset('assets/images/products/' . $product_detail->image) }}"
                                            data-zoom-image="{{ asset('assets/images/' . $product_detail->image) }} alt="product
                                            image">

                                        {{-- <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a> --}}
                                    </figure><!-- End .product-main-image -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{ $product_detail->name }}</h1>

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div>
                                    </div>
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div>

                                <div class="product-price">
                                    @if ($product_detail->discount != null)
                                        <span class="new-price">đ
                                            {{ number_format((int) ($product_detail->price - $product_detail->price * ($product_detail->discount / 100)), 0, ',', '.') }}</span>
                                        <span class="old-price">đ
                                            {{ number_format((int) $product_detail->price, 0, ',', '.') }}</span>
                                    @else
                                        <span class="">đ
                                            {{ number_format((int) $product_detail->price, 0, ',', '.') }}</span>
                                    @endif
                                </div>

                                <div class="product-content">
                                    <p>{{ $product_detail->description }} Sed egestas, ante et vulputate volutpat, eros pede
                                        semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus
                                        adipiscing. Sed lectus. </p>
                                </div><!-- End .product-content -->

                                <form action="{{ route('cart.add') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product_detail->id }}" />
                                    {{-- <div class="details-filter-row details-row-size">
                                        <label>Color:</label>

                                        <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="{{ asset('assets/images/products/' . $product_detail->image) }}"
                                                    alt="product desc">
                                            </a>
                                        </div><!-- End .product-nav -->
                                    </div> --}}

                                    <div class="details-filter-row details-row-color">
                                        <label class="col-form-label">Color:</label>
                                    
                                        <div class="btn-group btn-group-toggle" style="" data-toggle="buttons">
                                            <label class="btn btn-primary active input-radio">
                                                <input type="radio" name="color" value="1" autocomplete="off" checked> White
                                            </label>
                                            <label class="btn btn-primary input-radio">
                                                <input type="radio" name="color" value="2" autocomplete="off"> Black
                                            </label>
                                            <label class="btn btn-primary input-radio">
                                                <input type="radio" name="color" value="3" autocomplete="off"> Red
                                            </label>
                                            <label class="btn btn-primary input-radio">
                                                <input type="radio" name="color" value="4" autocomplete="off"> Blink
                                            </label>
                                            <label class="btn btn-primary input-radio">
                                                <input type="radio" name="color" value="5" autocomplete="off"> Blue
                                            </label>
                                        </div>
                                    </div>

                                    <div class="details-filter-row details-row-size">
                                        <label class="col-form-label">Size:</label>
                                    
                                        <div class="btn-group btn-group-toggle" style="" data-toggle="buttons">
                                            <label class="btn btn-primary active input-radio">
                                                <input type="radio" name="size" value="1" autocomplete="off" checked> S
                                            </label>
                                            <label class="btn btn-primary input-radio">
                                                <input type="radio" name="size" value="2" autocomplete="off"> M
                                            </label>
                                            <label class="btn btn-primary input-radio">
                                                <input type="radio" name="size" value="3" autocomplete="off"> L
                                            </label>
                                            <label class="btn btn-primary input-radio">
                                                <input type="radio" name="size" value="4" autocomplete="off"> XL
                                            </label>
                                            <label class="btn btn-primary input-radio">
                                                <input type="radio" name="size" value="5" autocomplete="off"> XXL
                                            </label>
                                        </div>
                                    </div>
                                    
                                    
                                                                                                                                       

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" name="quantity" id="qty" class="form-control"
                                                value="1" min="1" max="10" step="1"
                                                data-decimals="0" required>
                                        </div>
                                        <span style="margin-left: 12px; opacity: 0.7">Remaining:
                                            {{ $product_detail->quantity }}</span>
                                    </div>

                                    <div class="product-details-action">
                                        <button type="submit" class="btn-product btn-cart"><span>add to
                                                cart</span></button>

                                        <div class="details-action-wrapper">
                                            <a href="{{ route('wishlist.add', ['id' => $product_detail->id]) }}"
                                                class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                                                    Wishlist</span></a>
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->

                                </form>
                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">{{ $product_detail->category_name }}</a>,

                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                                class="icon-pinterest"></i></a>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Product Information</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                                    mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper
                                    suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam
                                    porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices
                                    nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique
                                    cursus. </p>
                                <ul>
                                    <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                    <li>Vivamus finibus vel mauris ut vehicula.</li>
                                    <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                                </ul>

                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                                    mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper
                                    suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam
                                    porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices
                                    nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique
                                    cursus. </p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Reviews (2)</h3>
                                <div class="comment">
                                    <div class="w-100">
                                        <input type="text" class="textInput" id="showModalBtn" />
                                    </div>
                                </div>
                                @foreach($comments as $comment)
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-2">
                                            <h4><a href="#">{{$comment->user->name}}</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: {{$comment->rating*20}}%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">{{$comment->created_at}}</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            {{-- <h4>Good, perfect size</h4> --}}

                                            <div class="review-content">
                                                <p>{{$comment->content}}</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                                @endforeach
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <h2 class="title text-center mb-4">You May Also Like</h2>

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
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
                    @if (count($also_like) > 0)
                        @foreach ($also_like as $item)
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    @if ($item->discount != null)
                                        <span class="product-label label-sale">Sale</span>
                                    @endif
                                    <a href="{{ route('product', ['id' => $item->id]) }}">
                                        <img src="{{ asset('assets/images/products/' . $item->image) }}"
                                            alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="{{ route('cart.add', ['id' => $item->id]) }}"
                                            class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div>
                                </figure>

                                <div class="product-body">
                                    <div class="product-cat">
                                        @if ($item->sex == 0)
                                            Male
                                        @else
                                            Female
                                        @endif
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="{{ route('product', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        @if ($item->discount != null)
                                            <span class="new-price">Now đ
                                                {{ number_format((int) ($item->price - $item->price * ($item->discount / 100)), 0, ',', '.') }}</span>
                                            <span class="old-price">Was đ
                                                {{ number_format((int) $item->price, 0, ',', '.') }}</span>
                                        @else
                                            <span class="">đ
                                                {{ number_format((int) $item->price, 0, ',', '.') }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div>
                                </div><!-- End .product-body -->
                            </div>
                        @endforeach
                    @else
                        <p class="class="text-center"">Not product</p>
                    @endif

                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#showModalBtn').click(function() {
                $('#commentModal').modal('show');
            });

            preview image
            $('#fileInput').change(function() {
                var files = $(this)[0].files;
                if (files.length > 1) {
                    $('.imagePreview a').removeClass('d-none');
                } else {
                    $('.imagePreview a').addClass('d-none');
                }

                // Xóa tất cả các slide hiện có trước khi thêm slide mới
                $('.imagePreview').find('.carousel-inner').empty();

                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Thêm ảnh mới vào slide show
                        var imgElement = $('<img>').attr('src', e.target.result).addClass(
                            'd-block w-100');
                        var slideItem = $('<div>').addClass('carousel-item').append($('<div>').addClass(
                            'imagePreview').append(imgElement));

                        // Xác định slide mới được thêm vào là slide đầu tiên hoặc không
                        if ($('.imagePreview').find('.carousel-item').length === 0) {
                            slideItem.addClass('active');
                        }

                        $('.imagePreview').find('.carousel-inner').append(slideItem);
                    };
                    reader.readAsDataURL(files[i]);
                }
            });

            //start rating
            var $star_rating = $('.star-rating .fa');

            var SetRatingStar = function() {
                return $star_rating.each(function() {
                    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                    return $(this).removeClass('fa-star-o').addClass('fa-star');
                    } else {
                    return $(this).removeClass('fa-star').addClass('fa-star-o');
                    }
                });
            };

            $star_rating.on('click', function() {
                $star_rating.siblings('input.rating-value').val($(this).data('rating'));
                return SetRatingStar();
            });

            SetRatingStar();
            $('#commentModal .btn-primary').click(function(){
                console.log(123);
                var csrfToken = $('#commentForm input[name="_token"]').val();
                // Lấy giá trị của các trường dữ liệu
                var message = $('#message-text').val();
                var rating = $('input[name="rating"]:checked').val();

                var currentURL = window.location.href;
                var urlParts = currentURL.split('/');
                var lastPart = urlParts[urlParts.length - 1];
                
                // Tạo object chứa dữ liệu để gửi qua AJAX
                var formData = {
                    _token: csrfToken,
                    message: message,
                    rating: rating,
                    product_id: lastPart,
                };

                    // Gửi dữ liệu thông qua AJAX
                $.ajax({
                    type: 'POST',
                    url: '/comment/add', // Đường dẫn đến route xử lý lưu dữ liệu
                    data: formData,
                    dataType: 'json',
                    success: function(data){
                        $('#closeModalComment').click();
                    },
                    error: function(xhr, status, error){
                        // Xử lý khi có lỗi xảy ra trong quá trình AJAX request
                        console.error(error); // In lỗi vào console
                        // Hiển thị thông báo lỗi hoặc thực hiện các hành động khác nếu cần
                    }
                });
            });
        });
    </script>
@endsection
