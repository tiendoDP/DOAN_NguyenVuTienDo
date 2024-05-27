@extends('admin.layouts.app')
@section('style')

@endsection


@section('content')

<div class="content-wrapper">
    <div class="p-3 d-flex justify-content-between align-items-center">
        <p class="h2">Chỉnh sửa</p>
        <a href="{{url('admin/admin/list')}}" class="btn btn-primary">Hủy</a>
    </div>
    <form class="m-4" action="" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên</label>
            <input type="text" class="form-control" name="name" required value="{{old('name', $admin->name)}}" placeholder="Tên">
            @error('name')
              <small class="form-text text-muted">
                <div style="color:red">{{$message}}</div>
              </small>
            @enderror
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" required value="{{old('email', $admin->email)}}" placeholder="Email">
          @error('email')
              <small class="form-text text-muted">
                <div style="color:red">{{$message}}</div>
              </small>
            @enderror
        </div>
        <div class="form-group">
          <label>Mật khẩu</label>
          <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
          @error('password')
              <small class="form-text text-muted">
                <div style="color:red">{{$message}}</div>
              </small>
            @enderror
        </div>
        <div class="form-group">
            <label>Phân loại</label>
            <select class="form-control" name="role">
                <option value="0" {{($admin->role == 0) ? 'selected' : ''}}>Khách hàng</option>
                <option value="1" {{($admin->role == 1) ? 'selected' : ''}}>Admin</option>
            </select>
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status">
              <option value="0" {{($admin->status == 0) ? 'selected' : ''}}>Active</option>
              <option value="1" {{($admin->status == 1) ? 'selected' : ''}}>Inactive</option>
          </select>
          <small class="form-text text-muted"></small>
      </div>
        
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
    
</div>

@endsection

@section('script')

@endsection