<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-left">
                        {{-- <div class="toolbox-info">
                            Showing <span>{{count($products)}} of {{$countProduct}}</span> Products
                        </div> --}}
                    </div>

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby" class="font-tv">Lọc theo giá:</label>
                            <div class="select-custom">
                                <select name="sortby" id="sortby" class="form-control" wire:model = 'sortPrice'
                                    wire:change='changeCategory'>
                                    <option value="all" selected="selected">Tất cả</option>
                                    <option value="desc" selected="selected">Cao tới thấp</option>
                                    <option value="asc">Thấp tới cao</option>
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->

                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content-center">
                        @if (!empty($products) && count($products) > 0)
                            @foreach ($products as $item)
                                <div class="col-6 col-md-4 col-lg-4 mb-2">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            @if ($item->discount != null)
                                                <span class="product-label label-sale">Sale</span>
                                            @endif
                                            <a href="{{ route('product', ['id' => $item->id]) }}">
                                                <img src="{{ asset('assets/images/products/' . $item->image) }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="{{ route('wishlist.add', ['id' => $item->id]) }}"
                                                    class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu thích</span></a>
                                            </div>

                                            <div class="product-action">
                                                <a href="{{ route('cart.add', ['id' => $item->id]) }}"
                                                    class="btn-product btn-cart"><span>Thêm vào giỏ</span></a>
                                            </div>
                                        </figure>

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $item->category_name }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="#" class="fw-400 font-tv">{{ $item->name }}</a>
                                            </h3>
                                            <div class="product-price">
                                                @if ($item->discount != null)
                                                    <span class="new-price">Now 
                                                        {{ number_format((int) ($item->price - $item->price * ($item->discount / 100)), 0, ',', '.') }}đ</span>
                                                    <span class="old-price">Was 
                                                        {{ number_format((int) $item->price, 0, ',', '.') }}đ</span>
                                                @else
                                                    <span class="">
                                                        {{ number_format((int) $item->price, 0, ',', '.') }}đ</span>
                                                @endif
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 20%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 2 đánh giá )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div>
                            @endforeach
                        @else
                            <p class="font-tv fw-bold">Không tìm thấy sản phẩm</p>
                        @endif
                    </div><!-- End .row -->
                </div><!-- End .products -->
                {{ $products->onEachSide(1)->links('livewire::bootstrap') }}
            </div>
            <aside class="col-lg-3 order-lg-first">
                <div class="sidebar sidebar-shop">
                    <div class="widget widget-clean">
                        <label>Filters:</label>
                        <span style="cursor: pointer; color: rgb(236, 125, 125);" wire:click='notFilter'
                            class="sidebar-filter-clear">Làm mới</span>
                    </div><!-- End .widget widget-clean -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                aria-controls="widget-1" class="fw-400 font-tv">
                                Danh mục
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">
                                    @if (!empty($cate))
                                        @foreach ($cate as $item)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" wire:click='changeCategory'
                                                        wire:model="category" value="{{ $item->id }}" />
                                                    <label>{{ $item->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach

                                    @endif
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                aria-controls="widget-5">
                                Giá <span style="font-size: 12px">(0 - 1.000.000đ)</span>
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-5">
                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">

                                    <input type="range" wire:click='changeCategory' wire:model='price' min="0"
                                        max="1000000" step="50000" value="1000000" class="form-range"
                                        id="customRange1">
                                </div>
                            </div>
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->
                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
