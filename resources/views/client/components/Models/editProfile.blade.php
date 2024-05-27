<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="padding: 14px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('editProfile')}}" method="POST" id="formUpdateUser">
            @csrf
            @method('PATCH')
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Email *:</label>
              <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Họ tên *:</label>
                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Địa chỉ:</label>
                <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                <input type="text" name="phone" value="{{Auth::user()->phone_number}}" class="form-control" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="button" id="updateUser" class="btn btn-primary">Cập nhật</button>
        </div>
      </div>
    </div>
  </div>