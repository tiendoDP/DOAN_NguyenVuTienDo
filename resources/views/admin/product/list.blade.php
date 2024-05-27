@extends('admin.layouts.app')
@section('style')

@endsection


@section('content')

<div class="content-wrapper">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <p class="h2">Danh sách sản phẩm</p>
        <a href="{{url('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm mới</a>
    </div>
    
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên</th>
            <th scope="col-2" style="width: 30%">Mô tả</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Tình trạng</th>
            <th scope="col" style="min-width: 150px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($getRecord))
            @foreach($getRecord as $value)
              <tr>
                <th scope="row">{{$value->id}}</th>
                <td>
                  <img src="{{asset('assets/images/products/'.$value->image)}}" class="card-img-top" alt="..." style="max-width: 150px">
                </td>
                <td>{{$value->name}}</td>
                <td>{{$value->description}}</td>
                <td>{{$value->category_name}}</td>
                <td>{{$value->quantity}}</td>
                <td>{{$value->price}}</td>
                <td>{{($value->status) == 0 ? 'active' : 'inactive'}}</td>
                <td>
                  <a href="{{url('admin/product/edit/'.$value->id)}}" class="btn btn-primary">Sửa</a>
                  <a href="{{url('admin/product/delete/'.$value->id)}}" class="btn btn-danger">Xóa</a>
                </td> 
              </tr>
            @endforeach
          @else <p class="text-center">Không tìm thấy sản phẩm</p>
          @endif
        </tbody>
      </table>
</div>

@endsection

@section('script')

@endsection