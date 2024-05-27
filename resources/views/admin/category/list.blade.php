@extends('admin.layouts.app')
@section('style')

@endsection


@section('content')

<div class="content-wrapper">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <p class="h2">Danh mục</p>
        <a href="{{url('admin/category/add')}}" class="btn btn-primary">Thêm mới</a>
    </div>
    <table class="table ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Tạo bởi</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($getRecord))
            @foreach($getRecord as $value)
              <tr>
                <th scope="row">{{$value->id}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->create_by_name}}</td>
                <td>{{($value->status) == 0 ? 'active' : 'inactive'}}</td>
                <td>
                  <a href="{{url('admin/category/edit/'.$value->id)}}" class="btn btn-primary">Sửa</a>
                  <a href="{{url('admin/category/delete/'.$value->id)}}" class="btn btn-danger">Xóa</a>
                </td> 
              </tr>
            @endforeach
          @else <p class="text-center">Không có danh mục nào</p>
          @endif
        </tbody>
      </table>
</div>

@endsection

@section('script')

@endsection