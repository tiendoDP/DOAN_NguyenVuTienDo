@extends('admin.layouts.app')
@section('style')

@endsection


@section('content')

<div class="content-wrapper">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <p class="h2">Danh sách đơn hàng</p>
        {{-- <a href="{{url('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm mới</a> --}}
    </div>
    
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Giá</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($getRecord))
            @foreach($getRecord as $key=> $value)
              <tr>
                <th scope="row"><a href="{{ route('showDetail', ['id' => $value->id]) }}">{{$key + 1}}</a></th>
                <td>{{$value->full_name}}</td>
                <td>{{$value->phone}}</td>
                <td>{{ number_format($value->amount, 0, ',', '.') }}đ</td>
                <td>
                    @php
                        if ($value->status == 1) {
                            echo 'Đang xử lý';
                        } elseif ($value->status == 2) {
                            echo 'Đang giao hàng';
                        } elseif ($value->status == 5) {
                            echo 'Đơn hàng đã bị hủy';
                        } else {
                            echo 'Đã nhận hàng';
                        }
                    @endphp
                </td>
                <td>{{$value->created_at}}</td>
                <th scope="row"><a href="{{ route('showDetail', ['id' => $value->id]) }}">Xem chi tiết</a></th>
              </tr>
            @endforeach
          @else <p class="text-center">Không tìm thấy đơn hàng</p>
          @endif
        </tbody>
      </table>
</div>

@endsection

@section('script')

@endsection