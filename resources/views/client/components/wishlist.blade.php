@extends('client.layouts.app')

@section('styles')
@endsection

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Sản phẩm<span>Yêu thích</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">

        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <table class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Tình trạng</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($all_wishlist) && count($all_wishlist) > 0)
                            @foreach ($all_wishlist as $item)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ route('product', ['id' => $item->product_id]) }}">
                                                    <img src="{{ asset('assets/images/products/' . $item->image) }}"
                                                        alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{ $item->product_name }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{number_format($item->price, 0, ',', '.')}}đ</td>
                                    <td class="stock-col">
                                        @if ($item->quantity == 0)
                                            <span class="out-of-stock">Hết hàng</span>
                                        @else
                                            <span class="in-stock">Còn hàng</span>
                                        @endif
                                    </td>
                                    <td class="action-col">
                                        @if ($item->quantity == 0)
                                            <button class="btn btn-block btn-outline-primary-2 disabled">Hết hàng</button>
                                        @else
                                            <a href="{{ route('cart.add', ['id' => $item->product_id]) }}"
                                                class="btn btn-block btn-outline-primary-2"><i
                                                    class="icon-cart-plus"></i>Thêm vào giỏ</a>
                                        @endif
                                    </td>
                                    <td class="remove-col"><a
                                            href="{{ route('wishlist.delete', ['id' => $item->product_id]) }}"
                                            class="btn-remove"><i class="icon-close"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table><!-- End .table table-wishlist -->
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Chia sẻ:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i
                                class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .wishlist-share -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>

@endsection


@section('scripts')
    <script></script>
@endsection
