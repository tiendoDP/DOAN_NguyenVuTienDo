@extends('client.layouts.app')

@section('styles')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Danh sách<span>Sản phẩm</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        </nav>
        
        @if (!empty($search) && !empty($gender))
        {
            @livewire('products.filter', ['cate' => $all_cate, 'keyword' => $search, 'gender' => $gender])
        }
        @elseif (!empty($search))
        {
            @livewire('products.filter', ['cate' => $all_cate, 'keyword' => $search])
        }
        @elseif ($gender || $gender == 0)
            {
            @livewire('products.filter', ['cate' => $all_cate, 'gender' => $gender])
            }
        @else
            @livewire('products.filter', ['cate' => $all_cate])
        @endif

    </main>
@endsection


@section('scripts')
    <script></script>
@endsection
