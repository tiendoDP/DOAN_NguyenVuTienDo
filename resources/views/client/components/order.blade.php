@extends('client.layouts.app')

@section('styles')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Đơn hàng<span>({{ count($allOrder) }})</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">

            </div>
        </nav>
        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        @if (count($allOrder) > 0)
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Giá</th>
                                        <th>Tình trạng</th>
                                        <th>Ghi chú</th>
                                        <th>Ngày đặt</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @php
                                    $stt = 0;
                                @endphp
                                <tbody>
                                    @foreach ($allOrder as $item)
                                        @php
                                            $stt++;
                                        @endphp
                                        <tr>
                                            <td class="total-col font-tv">{{ $stt }}</td>
                                            <td class="product-col">
                                                <div class="product">
                                                    <h3 class="product-title">
                                                        <a
                                                            href="{{ route('orderDetail', ['id' => $item->id]) }}" class="font-tv">{{ $item->full_name }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="product-col font-tv">{{ $item->phone }}</td>

                                            <td class="product-col font-tv">{{ number_format($item->amount, 0, ',', '.') }}đ</td>
                                            <td class="product-col font-tv">
                                                @php
                                                    if ($item->status == 1) {
                                                        echo 'Đang xử lý';
                                                    } elseif ($item->status == 2) {
                                                        echo 'Đang giao hàng';
                                                    } elseif ($item->status == 5) {
                                                        echo 'Đơn hàng đã bị hủy';
                                                    } else {
                                                        echo 'Đã nhận hàng';
                                                    }
                                                @endphp
                                            </td>
                                            <td class="product-col font-tv">
                                                @if ($item->notes != null)
                                                    {{ $item->notes }}                                                   
                                                @endif
                                            </td>
                                            <td class="product-col font-tv">{{ $item->created_at }}</td>
                                            <td><a
                                                href="{{ route('orderDetail', ['id' => $item->id]) }}" class="font-tv">Xem chi tiết</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Không tìm thấy đơn hàng</p>
                        @endif
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main>
@endsection

@section('scripts')
@endsection
