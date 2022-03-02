@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>TRANG CHỦ | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="TRANG CHỦ | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="TRANG CHỦ | ĐỒ DÙNG NHÀ BẾP K.COOK" />
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
                <div class="large-9 col medium-col-first">
                    @php
                        $cau_hinh = App\Models\CauHinh::first();
                        if (!empty($cau_hinh)) {
                            $slide = App\Models\HinhAnh::where('cau_hinh_id', $cau_hinh->id)->get();
                        } else {
                            $slide = [];
                        }
                    @endphp
                    <div class="row" id="row-28013216">
                        <div class="col small-12 large-12">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                @if (count($slide) > 0)
                                    <ol class="carousel-indicators">
                                        @foreach ($slide as $stt => $item)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $stt }}"
                                                class="{{ $stt == 0 ? 'active m' : '' }}">
                                            </li>
                                        @endforeach
                                    </ol>

                                    <div class="carousel-inner">
                                        @foreach ($slide as $stt => $item)
                                            <div class="carousel-item {{ $stt == 0 ? 'active' : '' }}">
                                                <img class="d-block w-100" src="{{ $item->url }}"
                                                    alt="{{ $item->ten_anh }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                            class="active m">
                                        </li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>

                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100"
                                                src="https://noithatluongson.vn/wp-content/uploads/2021/07/banner-1.jpg"
                                                alt="First slide">
                                        </div>

                                        <div class="carousel-item ">
                                            <img class="d-block w-100"
                                                src="https://noithatluongson.vn/wp-content/uploads/2021/10/xuongsanxuat-943x395.png"
                                                alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100"
                                                src="https://noithatluongson.vn/wp-content/uploads/2021/10/banner.png"
                                                alt="Third slide">
                                        </div>
                                    </div>
                                @endif

                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col small-12 large-12">
                            <div class="col-inner">
                                @if ($listDanhMucCha->isNotEmpty())
                                    @foreach ($listDanhMucCha as $danhMuc)
                                        @if (!empty($danhMuc->ten_loai))
                                            <div class="product_list clear">
                                                <h2 class="heading"><a
                                                        href="http://khonoithatluongson.com/danh-muc/san-pham/">{{ $danhMuc->ten_loai }}</a>
                                                </h2>
                                                <div class="home-product">
                                                    <ul class="woocommerce product-style"></ul>
                                                </div>
                                            </div>

                                            <div class="row large-columns-4 medium-columns- small-columns-2 row-small">
                                                @php
                                                    $listSanPham = App\Models\SanPham::orderBy('created_at', 'desc')
                                                        ->where('nhom_loai_san_pham_id', $danhMuc->id)
                                                        ->take(4)
                                                        ->get();
                                                @endphp
                                                @foreach ($listSanPham as $sanPham)
                                                    <div class="col">
                                                        <div class="col-inner h-100 ribbon-product {{ $sanPham->trang_thai === 1 ? 'disabled-ribbon' : ($sanPham->trang_thai === 2 ? 'ribbon-het-hang' : 'ribbon-ngung-ban') }}"
                                                            data-label="{{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'Hết hàng' : 'Ngưng bán') }}">
                                                            <div class="badge-container absolute left top z-1"></div>
                                                            <div
                                                                class="product-small h-100 box has-hover box-normal box-text-bottom">
                                                                <div class="box-image h-100">
                                                                    <div class="h-100">
                                                                        @php
                                                                            $anhSanPham = App\Models\HinhAnh::where('san_pham_id', $sanPham->id)->first();
                                                                        @endphp
                                                                       
                                                                        <a href="{{ route('home.chi_tiet_san_pham', $sanPham->slug) }}"
                                                                            class="h-100">
                                                                            @if(!empty($anhSanPham->url))
                                                                            <img width="300" height="300"
                                                                                class="attachment-shop_catalog size-shop_catalog wp-post-image h-100"
                                                                                alt="{{ $sanPham->ten_san_pham }}"
                                                                                src="{{ $anhSanPham->url }}"
                                                                                sizes="(max-width: 300px) 100vw, 300px"
                                                                                style="object-fit: cover" />
                                                                            @else
                                                                             <img width="300" height="300"
                                                                                class="attachment-shop_catalog size-shop_catalog wp-post-image h-100"
                                                                                alt="{{ $sanPham->ten_san_pham }}"
                                                                                src="{{ asset('admin/assets/img/300x300.jpg') }}"
                                                                                sizes="(max-width: 300px) 100vw, 300px"
                                                                                style="object-fit: cover" />
                                                                            @endif

                                                                        </a>
                                                                    </div>
                                                                    <div class="image-tools top right show-on-hover"></div>
                                                                    <div
                                                                        class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                    </div>
                                                                </div>
                                                                <!-- box-image -->

                                                                <div class="box-text text-center">
                                                                    <div class="title-wrapper">
                                                                        <p class="name product-title"><a
                                                                                href="{{ route('home.chi_tiet_san_pham', $sanPham->slug) }}">{{ $sanPham->ten_san_pham }}</a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="price-wrapper">
                                                                        <span class="price">
                                                                            <span
                                                                                class="woocommerce-Price-amount amount">{{ number_format($sanPham->gia_ban) }}&nbsp;<span
                                                                                    class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="add-to-cart-button">
                                                                        @if (Auth::check())
                                                                            <button
                                                                                style="{{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'cursor: not-allowed;' : 'cursor: not-allowed;') }}"
                                                                                onclick="userAddCart('{{ $sanPham->id }}')"
                                                                                {{ $sanPham->trang_thai === 1 ? '' : 'disabled' }}
                                                                                class="ajax_add_to_cart add_to_cart_button product_type_simple button primary is-flat mb-0 is-small">
                                                                                Đặt hàng</button>
                                                                        @else
                                                                            <button
                                                                                style="{{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'cursor: not-allowed;' : 'cursor: not-allowed;') }}"
                                                                                onclick="addCart('{{ $sanPham->id }}')"
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
                                                <div class="views__all">
                                                    <a rel="nofollow"
                                                        href="{{ route('home.san_pham_theo_danh_muc', $danhMuc->slug) }}">
                                                        Xem tất cả
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                                <!--Load tin tức -->
                                @if ($listTinTuc->isNotEmpty())
                                    <div class="product_list clear">
                                        <h2 class="heading"><a href="{{ route('home.tin_tuc') }}"> Tin tức mới
                                            </a>
                                        </h2>
                                    </div>

                                    <div
                                        class="row large-columns-3 medium-columns-1 small-columns-1 has-shadow row-box-shadow-1">
                                        @foreach ($listTinTuc as $tinTuc)
                                            <div class="col post-item">
                                                <div class="col-inner">
                                                    <a href="{{ route('home.chi_tiet_tin_tuc', $tinTuc->slug) }}"
                                                        class="plain">
                                                        <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                                            <div class="box-image">
                                                                <div class="image-cover" style="padding-top: 56.25%;">
                                                                    <img width="600" height="400"
                                                                        alt="{{ $tinTuc->tieu_de }}"
                                                                        src="{{ $tinTuc->anh }}"
                                                                        class="attachment-medium size-medium wp-post-image"
                                                                        alt="" />
                                                                </div>
                                                            </div>
                                                            <!-- .box-image -->
                                                            <div class="box-text text-center">
                                                                <div class="box-text-inner blog-post-inner">
                                                                    <h5 class="post-title is-large font-16">
                                                                        {{ $tinTuc->tieu_de }}
                                                                    </h5>
                                                                    <div class="is-divider"></div>
                                                                    <div class="font-14">
                                                                        {!! mb_strimwidth($tinTuc->phu_de, 0, 150, '[...]') !!}
                                                                    </div>
                                                                </div>
                                                                <!-- .box-text-inner -->
                                                            </div>
                                                            <!-- .box-text -->
                                                        </div>
                                                        <!-- .box -->
                                                    </a>
                                                    <!-- .link -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div><!-- .large-9 -->
            </div><!-- .row -->
        </div><!-- .page-wrapper .blog-wrapper -->
    </main><!-- #main -->
@endsection

@section('page-css')
    <style type="text/css">
        .views__all {
            display: block;
            text-align: right;
            clear: both;
            margin-bottom: 15px;
        }

        .views__all a {
            display: inline-block;
            background: #3b5998;
            padding: 5px 15px;
            color: #fff;
        }

        @media screen and (max-width: 1024px) {
            .views__all {
                text-align: center;
            }
        }

    </style>
    <link href="{{ asset('assets/css/carousel-bootstrap.css') }}" rel="stylesheet" type="text/css" />
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
                alertify.notify('Đã Thêm Sản Phẩm Thành Công!', 'success');
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
                alertify.notify('Đã Thêm Sản Phẩm Thành Công!', 'success');
            });
        }
    </script>
    <script src="{{ asset('assets/js/carousel-boostrap.js') }}"></script>
    <script type="text/javascript">
        $('.carousel').carousel({
            interval: 20000000
        })
    </script>
@endsection
