@extends('admin.layouts.app')
@section('style')

@endsection


@section('content')

<div class="content-wrapper">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <p class="h2">Thông tin đơn hàng ({{$details[0]->id}})</p>
        <a href="{{url('admin/order/list')}}" class="btn btn-primary mt-2">Trở lại</a>
        {{-- <a href="{{url('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm mới</a> --}}
    </div>
    
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
                            @elseif($details[0]->status == 5) <span style="color: red;">Đơn hàng đã bị hủy</span>
                            @else	<span style="color: rgb(132, 151, 214);">Đã nhận hàng</span>
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
        <div class="row mt-5">
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
                                    <div class="product d-flex">
                                        <figure class="product-media">
                                            <a href="{{route('product', ['id' => $item->product_id])}}">
                                                <img src="{{ asset('assets/images/products/' . $item->image) }}" style="with: 60px; height: 60px;" alt="Product image">
                                            </a>
                                        </figure>
        
                                        <h3 class="product-title">
                                            <a href="{{route('product', ['id' => $item->product_id])}}" style="font-size: 16px;
                                                margin-left: 12px;
                                                color: black;">{{ $item->product_name }}</a>
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
                    <form method="post" id="formConfirmOrder" action="{{route('confirmOrder')}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$details[0]->id}}" />
                        <button type="button" id="buttonConfirmOrder" class="btn btn-primary">Xác nhận đơn hàng</button>
                    </form>
                @endif
                @if($details[0]->status == 4)
                    <h2>Khách hàng đã nhận hàng thành công !</h2>
                @endif
            @else
                <p>Không tìm thấy đơn hàng</p>
            @endif                   
        </div><!-- End .row -->
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
      $('#buttonConfirmOrder').on('click', function() {
        //console.log(123)
        $isCheck = confirm('Bạn có chắc chắn muốn xác nhận đơn hàng này không ?');
        if($isCheck) {
          $('#formConfirmOrder').submit();
        }
      })
    })
</script>

@endsection