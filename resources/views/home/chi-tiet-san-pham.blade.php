@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>CHI TIẾT SẢN PHẨM | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="{{ $sanPham->meta_title }}" />
    <meta name="description" content="{{ $sanPham->meta_description }}" />
    <meta property="og:title" content="{{ $sanPham->meta_title }}" />
    <meta property="og:description" content="{{ $sanPham->meta_description }}" />
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
                    <div class="row">
                        <div class="large-6 col">
                            <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                data-columns="4">
                                <div class="badge-container is-larger absolute left top z-1"></div>
                                <div class="image-tools absolute top show-on-hover right z-3"></div>
                                @php
                                    $anhSanPham = App\Models\HinhAnh::where('san_pham_id', $sanPham->id)->get();
                                @endphp
                                <input id="indexSlide" type="hidden" value="0">
                                <input type="hidden" id="listAnhSanPham" value="@if ($anhSanPham->isNotEmpty()){{ $anhSanPham }} @else [] @endif">
                                @if ($anhSanPham->isNotEmpty())
                                    <figure
                                         class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half"
                                        data-flickity-options='{
                                                        "cellAlign": "center",
                                                        "wrapAround": true,
                                                        "autoPlay": false,
                                                        "prevNextButtons":true,
                                                        "adaptiveHeight": true,
                                                        "imagesLoaded": true,
                                                        "lazyLoad": 1,
                                                        "dragThreshold" : 15,
                                                        "pageDots": false,
                                                        "rightToLeft": false       }'>
                                        @foreach ($anhSanPham as $item)
                                            <div data-thumb="{{ $item->url }}"
                                                class="woocommerce-product-gallery__image slide first">

                                                <img width="600" height="600" src="{{ $item->url }}"
                                                    class="wp-post-image zoom-button" alt="{{ $sanPham->ten_san_pham }}"
                                                    data-caption="" data-src="{{ $item->url }}"
                                                    data-large_image="{{ $item->url }}" data-large_image_width="825"
                                                    data-large_image_height="825" sizes="(max-width: 600px) 100vw, 600px"
                                                    onclick="openPhotoSwipe()" />

                                            </div>
                                        @endforeach
                                    </figure>
                                @else
                                    <figure
                                        class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half"
                                        data-flickity-options='{
                                                        "cellAlign": "center",
                                                        "wrapAround": true,
                                                        "autoPlay": false,
                                                        "prevNextButtons":true,
                                                        "adaptiveHeight": true,
                                                        "imagesLoaded": true,
                                                        "lazyLoad": 1,
                                                        "dragThreshold" : 15,
                                                        "pageDots": false,
                                                        "rightToLeft": false       }'>
                                        <div data-thumb="{{ asset('admin/assets/img/300x300.jpg') }}"
                                            class="woocommerce-product-gallery__image slide first">

                                            <img width="600" height="600"
                                                src="{{ asset('admin/assets/img/300x300.jpg') }}"
                                                class="wp-post-image zoom-button" alt="{{ $sanPham->ten_san_pham }}"
                                                data-caption="" data-src="{{ asset('admin/assets/img/300x300.jpg') }}"
                                                data-large_image="{{ asset('admin/assets/img/300x300.jpg') }}"
                                                data-large_image_width="825" data-large_image_height="825"
                                                sizes="(max-width: 600px) 100vw, 600px" onclick="openPhotoSwipe()" />

                                        </div>
                                    </figure>
                                @endif
                                <div class="image-tools absolute bottom left z-3">
                                    <a onclick="openPhotoSwipe()"
                                        class="zoom-button button is-outline circle icon tooltip hide-for-small"
                                        title="Zoom"> <i class="icon-expand"></i> </a>
                                </div>
                            </div>

                            <div class="product-thumbnails thumbnails slider-no-arrows slider row row-small row-slider slider-nav-small small-columns-4"
                                data-flickity-options='{
                                                      "cellAlign": "left",
                                                      "wrapAround": false,
                                                      "autoPlay": false,
                                                      "prevNextButtons":true,
                                                      "asNavFor": ".product-gallery-slider",
                                                      "percentPosition": true,
                                                      "imagesLoaded": true,
                                                      "pageDots": false,
                                                      "rightToLeft": false,
                                                      "contain": true
                                                  }'>
                                @foreach ($anhSanPham as $item)
                                    <div class="col is-nav-selected first">
                                        <a> <img src="{{ $item->url }}" width="300" height="300"
                                                class="attachment-woocommerce_thumbnail" /> </a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- .product-thumbnails -->
                        </div>

                        <div class="product-info summary entry-summary col col-fit product-summary">
                            <h2 class="product-title entry-title">
                                {{ $sanPham->ten_san_pham }}
                            </h2>

                            <div class="is-divider small"></div>
                            <div class="price-wrapper">
                                <p class="price product-page-price">
                                    <span
                                        class="woocommerce-Price-amount amount">{{ number_format($sanPham->gia_ban) }}&nbsp;<span
                                            class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                                </p>
                            </div>
                            <div class="add-to-cart-button ">
                                <form data-parsley-validate method="post" class="div-detail-quantity"
                                    id="form-them-san-pham"
                                    action="{{ Auth::check() ? URL::to('/khach-hang/' . $sanPham->id . '/them-gio-hang-so-luong') : route('home.them_vao_gio_hang_so_luong', $sanPham->id) }}">
                                    @csrf
                                    <input class="quantity-detail" type="number" name="so_luong" value="1"
                                        placeholder="Số lượng" data-parsley-required-message="Vui lòng nhập số lượng"
                                        data-parsley-min="1" data-parsley-min-message="Vui lòng nhập số lượng lớn hơn 1"
                                        data-parsley-max="999" data-parsley-max-message="Vui lòng nhập số lượng ít hơn 999"
                                        required />
                                    <button type="submit"
                                        style="{{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'background-color: #e2a03f !important;cursor: not-allowed;' : 'background-color: #e7515a !important;cursor: not-allowed;') }}"
                                        {{ $sanPham->trang_thai === 1 ? '' : 'disabled' }}
                                        class="ajax_add_to_cart add_to_cart_button product_type_simple button primary is-flat mb-0 is-small btn-page-detail {{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'btn-page-detail-2' : 'btn-page-detail-3') }}">
                                        {{ $sanPham->trang_thai === 1 ? 'Đặt hàng' : ($sanPham->trang_thai === 2 ? 'Hết hàng' : 'Ngưng bán') }}</button>
                                </form>
                            </div>
                            <div class="product_meta">
                                <span class="posted_in">Danh mục: <a href="{{ url($urlDanhMuc) }}"
                                        rel="tag">{{ $danhMuc->ten_loai }}</a></span>
                            </div>

                            {{-- <div class="social-icons share-icons share-row relative icon-style-outline">
                                <a href="whatsapp://send?text=B%C3%A0n%20l%C3%A0m%20vi%E1%BB%87c%20h%E1%BB%99c%20treo - http://noithat21.giaodienwebmau.com/san-pham/ban-lam-viec-hoc-treo/"
                                    data-action="share/whatsapp/share"
                                    class="icon button circle is-outline tooltip whatsapp show-for-medium tooltipstered">
                                    <i class="icon-phone"></i>
                                </a>
                                <a href="http://www.facebook.com/sharer.php?u=http://noithat21.giaodienwebmau.com/san-pham/ban-lam-viec-hoc-treo/"
                                    data-label="Facebook"
                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                    rel="nofollow" target="_blank"
                                    class="icon button circle is-outline tooltip facebook tooltipstered">
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="http://twitter.com/share?url=http://noithat21.giaodienwebmau.com/san-pham/ban-lam-viec-hoc-treo/"
                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                    rel="nofollow" target="_blank"
                                    class="icon button circle is-outline tooltip twitter tooltipstered">
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="mailto:enteryour@addresshere.com?subject=B%C3%A0n%20l%C3%A0m%20vi%E1%BB%87c%20h%E1%BB%99c%20treo&amp;body=Check%20this%20out:%20http://noithat21.giaodienwebmau.com/san-pham/ban-lam-viec-hoc-treo/"
                                    rel="nofollow" class="icon button circle is-outline tooltip email tooltipstered">
                                    <i class="icon-envelop"></i>
                                </a>
                                <a href="http://pinterest.com/pin/create/button/?url=http://noithat21.giaodienwebmau.com/san-pham/ban-lam-viec-hoc-treo/&amp;media=http://noithat21.giaodienwebmau.com/wp-content/uploads/2017/07/mau1.jpg&amp;description=B%C3%A0n%20l%C3%A0m%20vi%E1%BB%87c%20h%E1%BB%99c%20treo"
                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                    rel="nofollow" target="_blank"
                                    class="icon button circle is-outline tooltip pinterest tooltipstered">
                                    <i class="icon-pinterest"></i>
                                </a>
                                <a href="http://plus.google.com/share?url=http://noithat21.giaodienwebmau.com/san-pham/ban-lam-viec-hoc-treo/"
                                    target="_blank" class="icon button circle is-outline tooltip google-plus tooltipstered"
                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                    rel="nofollow">
                                    <i class="icon-google-plus"></i>
                                </a>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://noithat21.giaodienwebmau.com/san-pham/ban-lam-viec-hoc-treo/&amp;title=B%C3%A0n%20l%C3%A0m%20vi%E1%BB%87c%20h%E1%BB%99c%20treo"
                                    onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                                    rel="nofollow" target="_blank"
                                    class="icon button circle is-outline tooltip linkedin tooltipstered">
                                    <i class="icon-linkedin"></i>
                                </a>
                            </div> --}}
                        </div>
                        <!-- .summary -->
                    </div>
                    <!-- .row -->
                    <div class="product-footer">
                        <div class="woocommerce-tabs container tabbed-content">
                            <ul class="product-tabs nav small-nav-collapse tabs nav nav-uppercase nav-line nav-left">
                                <li class="description_tab active">
                                    <a href="index.html#tab-description">Mô tả</a>
                                </li>
                                <li class="reviews_tab">
                                    <a href="index.html#tab-reviews">Đánh giá ( {{ $sanPham->danh_gia }} / 5 sao)</a>
                                </li>
                            </ul>
                            <div class="tab-panels">
                                <div class="panel entry-content active" id="tab-description">
                                    {!! $sanPham->mo_ta !!}
                                </div>

                                <div class="panel entry-content" id="tab-reviews">
                                    <div class="row" id="reviews">
                                        <div class="col large-12" id="comments">
                                            <div class="br-theme-fontawesome-stars-o">
                                                @if ($comments->isNotEmpty())
                                                    <ul class="list-group list-group-media">
                                                        @foreach ($comments as $post)
                                                            <li class="list-group-item list-group-item-action">
                                                                <div class="media">
                                                                    <div class="thumb-img-cmt">
                                                                        <div class="flex-column">
                                                                            <span
                                                                                class="tx-user-name">{{ $post->name }}</span>
                                                                            <div class="comment_rating_wrapper">
                                                                                <div class="br-theme-fontawesome-stars-o">
                                                                                    <div class="br-widget">
                                                                                    @php
                                                                                    $tong = 5;
                                                                                    $rating = (int) $post->rating;
                                                                                    $startNull = $tong - $rating ;
                                                                                    
                                                                                    for( $i = 0; $i < $rating ; $i++){
                                                                                    echo '<a href="javascript:;" class="br-selected"></a>';};

                                                                                    for( $i = 0; $i < $startNull ; $i++){
                                                                                        echo '<a href="javascript:;"></a>';};
                                                                                    @endphp
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @php
                                                                                $date_post = date_create($post->created_at);
                                                                            @endphp
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <span class="">{{ $post->comment }}
                                                                        </span>
                                                                    </br>
                                                                        <span class="text-gray-400 fw-bold mg-b-0">{{ date_format($date_post, 'd/m/Y H:i:s') }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p class="woocommerce-noreviews">Chưa có bình luận nào cho sản phẩm.</p>
                                                @endif
                                            </div>
                                            @if (Auth::check())
                                                <div id="review_form_wrapper" class="large-12 col">
                                                    <div id="review_form" class="col-inner">
                                                        <div class="review-form-inner">
                                                            <div id="respond" class="comment-respond">
                                                                <form action="{{ route('home.user-comment') }}"
                                                                    method="post" id="comment-form" class="comment-form"
                                                                    data-parsley-validate>
                                                                    @csrf
                                                                    <div class="comment-form-rating">
                                                                        <label for="rating">Đánh giá của bạn</label>
                                                                        <div class="my-rating-8"></div>

                                                                        <input data-parsley-min="1" required
                                                                            class="live-rating" type="text" name="rating"
                                                                            data-parsley-required-message="Vui lòng chọn sao để đánh giá sản phẩm."
                                                                            data-parsley-min-message="Vui lòng chọn sao để đánh giá sản phẩm.">
                                                                    </div>
                                                                    <p class="comment-form-comment">
                                                                        <label for="comment">Nhận xét của bạn
                                                                        </label><textarea id="comment" name="comment"
                                                                            cols="45" rows="8"
                                                                            aria-required="true"></textarea>
                                                                    </p>
                                                                    <p class="form-submit">

                                                                        <input name="submit" type="submit" id="submit"
                                                                            class="submit" value="Gửi đi" />
                                                                        <input type="hidden" name="id"
                                                                            value="{{ Auth::user()->id }}" />
                                                                        <input type="hidden" name="ten"
                                                                            value="{{ Auth::user()->ten }}" />
                                                                        <input type="hidden" name="ho"
                                                                            value="{{ Auth::user()->ho }}" />
                                                                        <input type="hidden" name="email"
                                                                            value="{{ Auth::user()->email }}" />
                                                                        <input type="hidden" name="san_pham_id"
                                                                            value="{{ $sanPham->id }}" />
                                                                        <input type="hidden" name="san_pham_slug"
                                                                            value="{{ $sanPham->slug }}" />

                                                                    </p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div id="review_form_wrapper" class="large-12">
                                                    <div id="review_form" class="col-inner">
                                                        <div class="review-form-inner">
                                                            <div id="respond" class="comment-respond">
                                                                {{-- <h3 id="reply-title" class="comment-reply-title">
                                                                    <a class="link-login"
                                                                        href="{{ route('home.dang_nhap') }}">Đăng
                                                                        nhập</a>
                                                                    để đánh giá sản phẩm. <small><a rel="nofollow"
                                                                            id="cancel-comment-reply-link"
                                                                            href="index.html#respond"
                                                                            style="display: none;">Hủy</a></small>
                                                                </h3> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .tab-panels -->
                        </div>
                        <!-- .tabbed-content -->
                        <div class="related related-products-wrapper product-section">
                            <h3
                                class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
                                Sản phẩm tương tự
                            </h3>
                            @if ($sanPhamCungLoai->isNotEmpty())
                                <div class="row large-columns-3 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                    @foreach ($sanPhamCungLoai as $sanPham)
                                        @php
                                            $anhSanPham = App\Models\HinhAnh::where('san_pham_id', $sanPham->id)->first();
                                        @endphp
                                        <div
                                            class="product-small col has-hover post-295 product type-product status-publish has-post-thumbnail product_cat-ban-van-phong product_tag-dem-cao-su instock shipping-taxable purchasable product-type-simple">
                                            <div class="col-inner h-100 ribbon-product {{ $sanPham->trang_thai === 1 ? 'disabled-ribbon' : ($sanPham->trang_thai === 2 ? 'ribbon-het-hang' : 'ribbon-ngung-ban') }}"
                                                data-label="{{ $sanPham->trang_thai === 1 ? '' : ($sanPham->trang_thai === 2 ? 'Hết hàng' : 'Ngưng bán') }}">
                                                <div class="badge-container absolute left top z-1"></div>
                                                <div class="product-small box h-100">
                                                    <div class="box-image">
                                                        <div class="image-zoom-fade">
                                                            <a
                                                                href="{{ route('home.chi_tiet_san_pham', $sanPham->slug) }}">
                                                                <img width="300" height="300" style="min-height: 200px"
                                                                    src="{{ $anhSanPham->url }}"
                                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                                    alt="{{ $sanPham->ten_san_pham }}"
                                                                    sizes="(max-width: 300px) 100vw, 300px" />
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
                                                                    class="woocommerce-Price-amount amount">{{ number_format($sanPham->gia_ban) }}&nbsp;<span
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
                                    @endforeach
                                    <!-- col -->
                                </div>
                            @else
                                <p>Shop đang nhập thêm hàng.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- .large-9 -->
            </div><!-- .row -->
        </div><!-- .page-wrapper .blog-wrapper -->
    </main><!-- #main -->

    {{-- <button id="btn">Open PhotoSwipe</button> --}}

    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
        PhotoSwipe keeps only 3 of them in the DOM to save memory.
        Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" aria-label="Đóng (Esc)"></button>

                    <button class="pswp__button pswp__button--zoom" aria-label="Phóng to/ thu nhỏ"></button>

                    <div class="pswp__preloader">
                        <div class="loading-spin"></div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button--arrow--left" aria-label="Ảnh trước (mũi tên trái)"></button>

                <button class="pswp__button--arrow--right" aria-label="Ảnh tiếp (mũi tên phải)"></button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
@endsection
@section('page-css')
    <link href="{{ asset('assets/css/custom-chi-tiet-san-pham.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/star-rating-svg.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/photoswipe/photoswipe-ver=3.3.3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/photoswipe/default-skin/default-skin-ver=3.3.3.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('page-js')
    <script type='text/javascript' src='{{ asset('assets/plugins/mega_main_menu/src/js/frontend-ver=2.1.5.js') }}'>
    </script>
    <script type='text/javascript' src='{{ asset('assets/js/photoswipe/photoswipe.min-ver=4.1.1.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/js/photoswipe/photoswipe-ui-default.min-ver=4.1.1.js') }}'>
    </script>
    <script type='text/javascript' src='{{ asset('assets/js/hoverIntent.min-ver=1.8.1.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/flatsome-ver=3.5.2.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/woocommerce-ver=3.5.2.js') }}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script type='text/javascript' src='{{ asset('assets/js/raiting/jquery.star-rating-svg.js') }}'></script>
    <script type="text/javascript">
        jQuery(".my-rating-8").starRating({
            useFullStars: true,
            disableAfterRate: false,
            onHover: function(currentIndex, currentRating, $el) {
                jQuery('.live-rating').val(currentIndex);
            },
            onLeave: function(currentIndex, currentRating, $el) {
                jQuery('.live-rating').val(currentRating);
            }
        });
    </script>
    <script>
        $("#comment-form").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            if ($("#comment-form").parsley().isValid()) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data) {
                        {
                            console.log(data);
                            if (data.status == 'success') {
                                Swal.fire({
                                    text: data.message,
                                    icon: 'success',
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                }).then((result) => {
                                    if (result.isDismissed) {
                                        window.location.reload();
                                    }
                                })

                            }
                            if (data.status == 'error') {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                            }
                        }
                    }
                });
            } else {
                $('.vld-erros-rating').show();
            }
        });
    </script>
    <script type='text/javascript'>
        var openPhotoSwipe = function() {
            var listAnh = JSON.parse($('#listAnhSanPham').val());
            var indexSlide = Number($('#indexSlide').val());
            var pswpElement = document.querySelectorAll('.pswp')[0];
            var items = new Array();
            if (listAnh.length > 0) {
                for (var i = 0; i < listAnh.length; i++) {
                    listAnh[i].onclick = openPhotoSwipe
                    items.push({
                        src: listAnh[i].url,
                        w: 964,
                        h: 1024,
                    })
                };
            } else {
                items.push({
                    src: '{{ asset('admin/assets/img/300x300.jpg') }}',
                    w: 964,
                    h: 1024,
                })
            }
            var options = {
                index: indexSlide,
                showAnimationDuration: 0,
                hideAnimationDuration: 0,
            };
            var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };
    </script>
    <script>
        $("#form-them-san-pham").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            if ($("#form-them-san-pham").parsley().isValid()) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(res) {
                        {
                            $('#change-item-cart').empty();
                            $('#change-item-cart').html(res['gio-hang']);
                            $('#header__cart-notice').text($('#total-quanty-cart').val());
                            alertify.notify('Đã Thêm Sản Phẩm Thành Công', 'success');
                            $('#form-them-san-pham').parsley().reset();
                            $('#form-them-san-pham')[0].reset();
                        }
                    }
                });
            }
        });
    </script>
@endsection
