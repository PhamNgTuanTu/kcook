@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>SẢN PHẨM THEO DANH MỤC | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="SẢN PHẨM THEO DANH MỤC | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="SẢN PHẨM THEO DANH MỤC | ĐỒ DÙNG NHÀ BẾP K.COOK" />
@endsection
@section('content')
    <main id="main" class="">
        <div id="content" class="blog-wrapper blog-archive page-wrapper">
            <div class="row row-divided ">
                <div class="post-sidebar large-3 col">
                    <div id="secondary" class="widget-area " role="complementary">
                        @include('home.partials.menu-danh-muc-san-pham', ['listDanhMuc' => $listDanhMucCha])
                        @include('home.partials.ho-tro-truc-tuyen')
                        @include('home.partials.san-pham-ban-chay')
                        @include('home.partials.thong-ke-truy-cap', ['listSanPhamBanChay' => $listSanPhamBanChay])
                    </div><!-- #secondary -->
                </div><!-- .post-sidebar -->

                <div class="col large-9">
                    <div class="shop-container">
                        <div class="product_list clear">
                            <h2 class="heading">{{$tenDanhMuc}}
                            </h2>
                            <div class="home-product">
                                <ul class="woocommerce product-style"></ul>
                            </div>
                        </div>
                       
                            @if ($listSanPham->isNotEmpty())
                             <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights">
                                @foreach ($listSanPham as $sanPham)
                                    <div
                                        class="product-small col has-hover post-78 product type-product status-publish has-post-thumbnail product_cat-ban-van-phong first instock shipping-taxable purchasable product-type-simple">
                                        <div class="col-inner h-100 ribbon-product {{ $sanPham->trang_thai === 1 ? 'disabled-ribbon' : ($sanPham->trang_thai === 2 ? 'ribbon-het-hang' : 'ribbon-ngung-ban') }}"
                                            data-label="{{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'Hết hàng' : 'Ngưng bán') }}">
                                            <div class="badge-container absolute left top z-1"></div>
                                            <div class="product-small box h-100">
                                                <div class="box-image">
                                                    <div class="image-zoom-fade">
                                                        @php
                                                            $anhSanPham = App\Models\HinhAnh::where('san_pham_id', $sanPham->id)->first();
                                                        @endphp
                                                        <a href="{{ route('home.chi_tiet_san_pham', $sanPham->slug) }}">
                                                            @if(!empty($anhSanPham->url))
                                                            <img width="300" height="300" src="{{ $anhSanPham->url }}"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                                alt="{{ $sanPham->ten_san_pham }}"
                                                                sizes="(max-width: 300px) 100vw, 300px" />
                                                            @else
                                                            <img width="300" height="300" src="{{ asset('admin/assets/img/300x300.jpg') }}"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                                alt="{{ $sanPham->ten_san_pham }}"
                                                                sizes="(max-width: 300px) 100vw, 300px" />
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="image-tools is-small top right show-on-hover"></div>
                                                    <div
                                                        class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                    </div>
                                                    <div
                                                        class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                    </div>
                                                </div>
                                                <!-- box-image -->

                                                <div class="box-text box-text-products text-center grid-style-2">
                                                    <div class="title-wrapper">
                                                        <p class="name product-title"><a
                                                                href="{{ route('home.chi_tiet_san_pham', $sanPham->slug) }}">{{ $sanPham->ten_san_pham }}</a>
                                                        </p>
                                                    </div>
                                                    <div class="price-wrapper">
                                                        <span class="price">
                                                            <span
                                                                class="woocommerce-Price-amount amount">{{ number_format($sanPham->gia_ban, 2) }}&nbsp;<span
                                                                    class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                                                        </span>
                                                    </div>
                                                    <div class="add-to-cart-button">
                                                        @if (Auth::check())
                                                            <button onclick="userAddCart('{{ $sanPham->id }}')"
                                                                style="{{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'cursor: not-allowed;' : 'cursor: not-allowed;') }}"
                                                                {{ $sanPham->trang_thai === 1 ? '' : 'disabled' }}
                                                                class="ajax_add_to_cart add_to_cart_button product_type_simple button primary is-flat mb-0 is-small">
                                                                Đặt hàng</button>
                                                        @else
                                                            <button onclick="addCart('{{ $sanPham->id }}')"
                                                                style="{{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'cursor: not-allowed;' : 'cursor: not-allowed;') }}"
                                                                {{ $sanPham->trang_thai === 1 ? '' : 'disabled' }}
                                                                class="ajax_add_to_cart add_to_cart_button product_type_simple button primary is-flat mb-0 is-small">
                                                                Đặt hàng</button>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- box-text -->
                                            </div>
                                            <!-- box -->
                                        </div>
                                        <!-- .col-inner -->
                                    </div>
                                    <!-- col -->
                                @endforeach
                                </div>
                            @else
                                <div class="products row row-small has-equal-box-heights">
                                    <div
                                        class="product-small col has-hover post-78 product type-product status-publish has-post-thumbnail product_cat-ban-van-phong first instock shipping-taxable purchasable product-type-simple">
                                        <h3>Danh mục chưa nhập sản phẩm.</h3>
                                    </div>
                                </div>
                            @endif
                       
                        <!-- row -->
                    </div>
                    @if ($listSanPham->isNotEmpty())
                        {{ $listSanPham->onEachSide(5)->links() }}
                    @endif
                    <!-- shop container -->
                </div>


                <!-- .large-9 -->
            </div><!-- .row -->
        </div><!-- .page-wrapper .blog-wrapper -->
    </main><!-- #main -->
@endsection


@section('page-js')
    <script type='text/javascript' src='{{ asset('assets/plugins/mega_main_menu/src/js/frontend-ver=2.1.5.js') }}'>
    </script>
    <script type='text/javascript' src='{{ asset('assets/js/hoverIntent.min-ver=1.8.1.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/flatsome-ver=3.5.2.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/woocommerce-ver=3.5.2.js') }}'></script>
    <script>
        function addCart(id) {
            $.ajax({
                url: '/them-vao-gio-hang/' + id,
                type: 'GET',
            }).done(function(res) {
                $('#change-item-cart').empty();
                $('#change-item-cart').html(res['gio-hang']);
                $('#header__cart-notice').text($('#total-quanty-cart').val());
                alertify.notify('Đã Thêm Sản Phẩm Thành Công', 'success');
            });
        }

        function userAddCart(id) {
            $.ajax({
                url: '/khach-hang/' + Number(id) + '/them-gio-hang',
                type: 'GET',
            }).done(function(res) {
                $('#change-item-cart').empty();
                $('#change-item-cart').html(res['gio-hang']);
                $('#header__cart-notice').text($('#total-quanty-cart').val());
                alertify.notify('Đã Thêm Sản Phẩm Thành Công', 'success');
            });
        }
    </script>
@endsection
