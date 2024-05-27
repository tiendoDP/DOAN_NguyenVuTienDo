@extends('admin.layouts.app')
@section('style')

@endsection


@section('content')

<div class="content-wrapper">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <p class="h2">SubCategory list</p>
        <a href="{{url('admin/sub_category/add')}}" class="btn btn-primary">Add new SubCategory</a>
    </div>
    @if(!empty(session('success'))) <p class="h3">{{session('success')}}</p> @endif
    <table class="table ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Create By</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($getRecord))
            @foreach($getRecord as $value)
              <tr>
                <th scope="row">{{$value->id}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->category_name}}</td>
                <td>{{$value->created_by_name}}</td>
                <td>{{($value->status) == 0 ? 'active' : 'inactive'}}</td>
                <td>
                  <a href="{{url('admin/sub_category/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                  <a href="{{url('admin/sub_category/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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