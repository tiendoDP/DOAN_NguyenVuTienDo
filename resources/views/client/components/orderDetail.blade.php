@extends('client.layouts.app')

@section('styles')
    
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Thông tin đơn hàng<span>({{$details[0]->id}})</span></h1>
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
                    <table class="">
                        <tr>
                            <td style="font-weight: 600; min-width: 100px">Họ tên</td>
                            <td>: {{$details[0]->full_name}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Địa chỉ</td>
                            <td>: {{$details[0]->street_address}}, {{$details[0]->province}}, {{$details[0]->country}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Tổng cộng</td>
                            <td>:
                                {{number_format($details[0]->amount, 0, ',', '.')}} VND
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Tình trạng</td>
                            <td>: @if($details[0]->status == 1) <span style="color: red;">Đang xử lý</span>
                                  @elseif($details[0]->status == 2) <span style="color: rgb(60, 71, 58);">Đang giao hàng</span>
                                  @elseif($details[0]->status == 4) <span style="color: rgb(60, 71, 58);">Đã nhận hàng</span>
                                  @elseif($details[0]->status == 5) <span style="color: rgb(22, 105, 7);">Đơn hàng đã bị hủy</span>
                                  {{-- @else	<span style="color: rgb(132, 151, 214);">Đã nhận hàng</span> --}}
                                  @endif  
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Thanh toán</td>
                            <td>: @if ($details[0]->payment_method == 1) <span style="color: rgb(134, 221, 34);">Thanh toán khi nhận hàng</span>	
                                @else <span style="color: rgb(132, 151, 214);">Thanh toán online</span>	     
                                @endif</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600;">Ngày đặt</td>
                            <td>: {{$details[0]->created_at}}</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        @if ($details->count() > 0)
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="{{route('product', ['id' => $item->product_id])}}">
                                                        <img src="{{ asset('assets/images/products/' . $item->image) }}" alt="Product image">
                                                    </a>
                                                </figure>
                
                                                <h3 class="product-title">
                                                    <a href="{{route('product', ['id' => $item->product_id])}}">{{ $item->product_name }}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">{{number_format($item->price, 0, ',', '.')}}đ</td>
                                        <td class="quantity-col">
                                            {{$item->quantity}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($details[0]->status == 1)
                            <form method="post" id="formDeleteOrder" action="{{route('deleteOrder')}}">
                                @csrf
                                @method('Patch')
                                <input type="hidden" name="id" value="{{$details[0]->id}}" />
                                <button type="button" id="buttonDeleteOrder" class="btn btn-primary">Hủy đơn</button>
                            </form>
                        @endif
                        @if($details[0]->status == 2)
                            <form method="post" id="formSuccessOrder" action="{{route('successOrder')}}">
                                @csrf
                                @method('Patch')
                                <input type="hidden" name="id" value="{{$details[0]->id}}" />
                                <button type="button" id="buttonSuccessOrder" class="btn btn-primary">Nhận hàng thành công</button>
                            </form>
                        @endif
                        @if($details[0]->status == 5)
                            <button type="button" disabled class="btn btn-primary">Đơn hàng đã bị hủy</button>
                        @endif
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

<script>
    $(document).ready(function() {
      $('#buttonDeleteOrder').on('click', function() {
        $isCheck = confirm('Bạn có chắc chắn muốn hủy đơn hàng này không ?');
        if($isCheck) {
          $('#formDeleteOrder').submit();
        }
      })

      $('#buttonSuccessOrder').on('click', function() {
        $isCheck = true;
        if($isCheck) {
          $('#formSuccessOrder').submit();
        }
      })
    })
</script>

@endsection
