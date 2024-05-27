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
            min-width: 67px !important;
            margin: 4px 8px !important;
            background-color: #fff !important;
            color: #000;
        }

        .btn.btn-primary.input-radio {
            font-size: 12px;
            padding: 4px 6px;
        }

        .details-filter-row label {
            width: auto !important;
            margin-right: 12px;
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

        /* #imagemodal {
            display: flex !important;
            justify-content: center;
            align-items: center;
        } */

    </style>
@endsection

@include('client.components.Models.comment')
@include('client.components.Models.previewImage')



@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('assets/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">Sản phẩm<span>Chi tiết</span></h1>
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
                                        <img id="product-zoom" src="{{ asset('assets/images/products/' . $product_detail->image) }}" data-zoom-image="{{ asset('assets/images/products/' . $product_detail->image) }}" alt="product image">
                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        @foreach($images as $image)
                                            <a class="product-gallery-item active" href="#" data-image="{{ asset('assets/images/products/' . $image->url) }}" data-zoom-image="{{ asset('assets/images/products/' . $image->url) }}">
                                                <img src="{{ asset('assets/images/products/' . $image->url) }}" alt="product side">
                                            </a>
                                        @endforeach
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{ $product_detail->name }}</h1>

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 
                                            @if(isset($rating->avgRating) && !is_null($rating->avgRating)) 
                                                {{ $rating->avgRating * 20 }}% 
                                            @else 
                                                100% 
                                            @endif;">
                                        </div>

                                    </div>
                                    <a class="ratings-text" href="#product-review-link" id="review-link"><span class="numberComment">({{$comments->count()}})</span></a>
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

                                {{-- <div class="product-content">
                                    <p>{{ $product_detail->description }}</p>
                                </div> --}}

                                <form action="{{ route('cart.add') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product_detail->id }}" />

                                    <div class="details-filter-row details-row-color">
                                        <label class="col-form-label">Màu sắc:</label>
                                    
                                        <div class="btn-group btn-group-toggle" style="" data-toggle="buttons">
                                            @foreach($product_colors as $color)
                                                <label class="btn btn-primary input-radio">
                                                    <input type="radio" name="color" value="{{$color->color_id}}" autocomplete="off"> {{$color->color->name}}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="details-filter-row details-row-size">
                                        <label class="col-form-label">Kích cỡ:</label>
                                    
                                        <div class="btn-group btn-group-toggle" style="" data-toggle="buttons">
                                            @foreach($product_sizes as $size)
                                                <label class="btn btn-primary input-radio">
                                                    <input type="radio" name="size" value="{{$size->size_id}}" autocomplete="off"> {{$size->size->name}}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    
                                                                                                                                       

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Số lượng:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" name="quantity" id="qty" class="form-control"
                                                value="1" min="1" max="10" step="1"
                                                data-decimals="0" required>
                                        </div>
                                        <span class="font-tv" style="margin-left: 12px; opacity: 0.7">
                                            {{ $product_detail->quantity }} sản phẩm có sẵn</span>
                                    </div>

                                    <div class="product-details-action">
                                        <button type="submit" class="btn-product btn-cart"><span>Thêm vào giỏ</span></button>

                                        <div class="details-action-wrapper">
                                            <a href="{{ route('wishlist.add', ['id' => $product_detail->id]) }}"
                                                class="btn-product btn-wishlist" title="Wishlist"><span>Yêu thích</span></a>
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->

                                </form>
                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Danh mục:</span>
                                        <a href="#">{{ $product_detail->category_name }}</a>,

                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Chia sẻ:</span>
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
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Đánh giá <span class="numberComment">({{$comments->count()}})</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Thông tin sản phẩm</h3>
                                <p class="font-tv">{!! nl2br(e($product_detail->description)) !!}</p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <h3 class="fs-4">Đánh giá</h3>
                            @if (Auth::check())
                                <div class="comment">
                                    <div class="w-100">
                                        <input type="text" class="textInput" id="showModalBtn" />
                                    </div>
                                </div>
                            @endif
                            <div class="reviews">
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

                                            <div class="images-comment d-flex alight-item-center">
                                                @if(isset($comment->images))
                                                    @foreach($comment->images as $image)
                                                        <div class="pop">
                                                            <img src="{{ asset($image->image_path) }}" style="width: 100px; margin-right: 6px;" class="d-block" alt="...">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                                @endforeach
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <div id="cover-comment" class="review d-none">
                    <div class="row no-gutters">
                        <div class="col-2">
                            <h4><a href="#" class="userName"></a></h4>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val"></div>
                                </div>
                            </div>
                            <span class="review-date"></span>
                        </div>
                        <div class="col">
                            <div class="review-content">
                                <p></p>
                            </div>
                            <div class="images-comment"> 
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="title text-center mb-4">Có thể bạn cũng thích</h2>

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
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="{{ route('cart.add', ['id' => $item->id]) }}"
                                            class="btn-product btn-cart"><span>Thêm vào giỏ</span></a>
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
                                    {{-- <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 đánh giá )</span>
                                    </div> --}}
                                </div><!-- End .product-body -->
                            </div>
                        @endforeach
                    @else
                        <p class="class=text-center">Không tìm thấy sản phẩm</p>
                    @endif

                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            var myCarousel = document.querySelector('#carouselExampleControls')
            var carousel = new bootstrap.Carousel(myCarousel)
            $('#showModalBtn').click(function() {
                $('#commentModal').modal('show');
            });

            //preview image
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
        (function(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Thêm ảnh mới vào slide show
                var imgElement = $('<img>').attr('src', e.target.result).addClass('d-block w-100');
                var slideItem = $('<div>').addClass('carousel-item').append($('<div>').addClass(
                    'imagePreview').append(imgElement));

                // Xác định slide mới được thêm vào là slide đầu tiên hoặc không
                if ($('.imagePreview').find('.carousel-item').length === 0) {
                    slideItem.addClass('active');
                }

                $('.imagePreview').find('.carousel-inner').append(slideItem);
            };
            reader.readAsDataURL(file);
        })(files[i]);
    }
});


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

            var commentCount = parseInt({{$comments->count()}});

            $('#commentModal .btn-primary').click(function(){
                var csrfToken = $('#commentForm input[name="_token"]').val();
                // Lấy giá trị của các trường dữ liệu
                var message = $('#message-text').val();
                var rating = $('input[name="rating"]:checked').val();

                var currentURL = window.location.href;
                var urlParts = currentURL.split('/');
                var lastPart = urlParts[urlParts.length - 1];
                
                var formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('message', message);
                formData.append('rating', rating);
                formData.append('product_id', lastPart);

                var files = $('#fileInput').get(0).files;
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    formData.append('images[]', file);
                }

                    // Gửi dữ liệu thông qua AJAX
                $.ajax({
                    type: 'POST',
                    url: '/comment/add', // Đường dẫn đến route xử lý lưu dữ liệu
                    data: formData,
                    //enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    success: function(data){
                        var cloneComment = $('#cover-comment').clone();
                        cloneComment.removeClass('d-none');
                        cloneComment.find('.userName').text(data.data.user_name);
                        cloneComment.find('.ratings-val').css('width', (rating * 20) + '%');
                        cloneComment.find('.review-date').text('a second ago');
                        cloneComment.find('.review-content').text(data.data.content);

                        var imgContainer = $('<div>').addClass('pop d-flex alight-item-center');
                        data.data.images.forEach(element => {
                            var imgElement = $('<img>').attr('src', "{{ asset('') }}" + element.image_path)
                                                        .css({'width': '100px', 'margin-right': '6px'})
                                                        .addClass('d-block');
                            imgContainer.append(imgElement);
                            cloneComment.find('.images-comment').append(imgContainer);
                        });
                        
                        $(".reviews").prepend(cloneComment);
                        cloneComment.removeAttr('id');
                        commentCount++;
                        $('.numberComment').text('(' + commentCount + ')');

                        $('#message-text').val('');
                        $('#fileInput').val(null);
                        $('.carousel-inner').empty();
                        $('#star1').attr('checked', 'checked');
                        $('#closeModalComment').click();
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                });
            });

            //preview comment image
            $(function() {
                $('.pop').on('click', function() {
                    $('.imageCommentPreview').attr('src', $(this).find('img').attr('src'));
                    $('#imagemodal').modal('show');
                    //$('#imagemodal').addClass('d-flex align-items-center');
                });		
            });
            
        });
    </script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var commentDates = document.querySelectorAll(".review-date");
        commentDates.forEach(function(commentDate) {
            var date = moment(commentDate.innerText);
            var now = moment();
            var diffInMinutes = now.diff(date, 'minutes');
            var diffInSeconds = now.diff(date, 'seconds');
            var diffInHours = now.diff(date, 'hours');
            var diffInDays = now.diff(date, 'days');
            var diffInWeeks = now.diff(date, 'weeks');

            if (diffInMinutes < 1) {
                commentDate.innerText = diffInSeconds + " giây trước";
            } else if (diffInMinutes < 60) {
                commentDate.innerText = diffInMinutes + " phút trước";
            } else if (diffInMinutes < 1440) {
                commentDate.innerText = diffInHours + " giờ trước";
            } else if (diffInDays < 8) {
                commentDate.innerText = diffInDays + " ngày trước";
            } else if (diffInWeeks < 5) {
                commentDate.innerText = diffInWeeks + " tuần trước";
            } else {
                commentDate.innerText = moment(date).format("DD/MM/YYYY");
            }
        });
    });
</script>
@endsection
