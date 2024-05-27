@extends('client.layouts.app')

@section('styles')
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>

@endsection

@section('content')
@include('client.components.Models.editProfile')

<section style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-6 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="container">
              <div class="col-md-4 text-center text-white d-flex justify-content-start align-items-center"
                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                  alt="Avatar" class="img-fluid my-5 mb-0" style="width: 120px;" />
                <div class="d-flex justify-content-center align-items-center flex-column p-3" style="justify-content: start !important;">
                  <h5 class="mt-3 mb-1 font-tv">{{Auth::user()->name}}</h5>
                  <p class="font-tv">Khách hàng</p>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4" style="max-width: 550px">
                  <p style="width: max-content; border-radius: 6px; cursor: pointer" class="p-1 m-1">
                    <span class="m-1"><i class="fa-regular fa-pen-to-square"></i></span>
                    <span class="font-tv" style="" data-bs-toggle="modal" data-bs-target="#editProfile" data-bs-whatever="@mdo">Chỉnh sửa</span>
                  </p>
                  <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Email</h6>
                      <p class="text-muted font-tv">{{Auth::user()->email}}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6 class="font-tv">Số điện thoại</h6>
                      <p class="text-muted font-tv">{{Auth::user()->phone_number}}</p>
                    </div>
                  </div>
                  <h6></h6>
                  <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6 class="font-tv">Đơn hàng</h6>
                      <p class="text-muted"><a href="{{route('order')}}" class="font-tv">Xem đơn hàng ({{count($allOrder)}})</a></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Địa chỉ</h6>
                      <p class="text-muted font-tv">{{Auth::user()->address}}</p>
                    </div>
                  </div>
                  {{-- <div class="d-flex justify-content-start">
                    <a href="#!" class="m-2"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                    <a href="#!" class="m-2"><i class="fab fa-twitter fa-lg me-3"></i></a>
                    <a href="#!" class="m-2"><i class="fab fa-instagram fa-lg"></i></a>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
@endsection

@section('scripts')
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>

<script>
  $(document).ready(function() {
    $('#updateUser').on('click', function() {
      $isCheck = confirm('Bạn chắc chắn với chỉnh sửa này?');
      if($isCheck) {
        $('#formUpdateUser').submit();
      }
    })
  })
</script>
@endsection