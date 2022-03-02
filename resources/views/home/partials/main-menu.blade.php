<div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
    <div class="flex-row container">

        <div class="flex-col hide-for-medium flex-left">
            <ul class="nav header-nav header-bottom-nav nav-left  nav-uppercase" id="main-menu-pc">
                <li id="menu-item-50"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  menu-item-50 {{ isset($page) && $page == 'home' ? 'active-menu' : '' }}">
                    <a href="{{ route('home.home') }}" class="nav-top-link">Trang chủ</a>
                </li>
                <li id="menu-item-53"
                    class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-53 {{ isset($page) && $page == 'san_pham' ? 'active-menu' : '' }}">
                    <a href="{{ route('home.san_pham') }}" class="nav-top-link">Sản phẩm</a>
                </li>
                <!--<li id="menu-item-267" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-267">
     <a href="{{ route('home.gioi_thieu') }}" class="nav-top-link">Giới thiệu</a>
    </li>
    <li id="menu-item-354" class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-354">
     <a href="#" class="nav-top-link">Khuyến mại</a>
    </li>-->
                <li id="menu-item-193"
                    class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-193 {{ isset($page) && $page == 'tin_tuc' ? 'active-menu' : '' }}">
                    <a href="{{ route('home.tin_tuc') }}" class="nav-top-link">Tin tức</a>
                </li>
                <li id="menu-item-356"
                    class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-356 {{ isset($page) && $page == 'tuyen_dung' ? 'active-menu' : '' }}">
                    <a href="{{ route('home.tuyen_dung') }}" class="nav-top-link">Tuyển dụng</a>
                </li>
                <!--
    <li id="menu-item-355" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item  menu-item-355">
     <a href="{{ route('home.thong_bao') }}" class="nav-top-link">Thông báo</a>
    </li>-->
                <li id="menu-item-266"
                    class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-266 {{ isset($page) && $page == 'lien_he' ? 'active-menu' : '' }}">
                    <a href="{{ route('home.lien_he') }}" class="nav-top-link">Liên hệ</a>
                </li>
            </ul>
        </div><!-- flex-col -->


        <div class="flex-col hide-for-medium flex-right flex-grow">
            <ul class="nav header-nav header-bottom-nav nav-right  nav-uppercase">
                <li class="header-search-form search-form html relative has-icon">
                    <div class="header-search-form-wrapper">
                        <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                            <form id="tour_search_form" role="search" method="post" class="searchform"
                                action="{{ route('home.ket_qua_tim_kiem') }}">
                                @csrf
                                <div class="flex-row relative">
                                    <div class="flex-col flex-grow">
                                        <input id="search" type="search" class="search-field mb-0 m-input" name="search"
                                            value="" placeholder="Tìm kiếm&hellip;" />
                                        <div id="search-suggest" class="s-suggest"></div>

                                    </div> <!-- .flex-col -->
                                    <div class="flex-col">
                                        <button type="submit"
                                            class="ux-search-submit submit-button secondary button icon mb-0">
                                            <i class="icon-search"></i>
                                        </button>
                                    </div> <!-- .flex-col -->
                                </div>
                                <!-- .flex-row -->
                                <div class="live-search-results text-left z-top"></div>
                            </form>

                        </div>
                    </div>

                </li>
                <li>
                    <div class="shopcart">
                        @if (Auth::check())
                            @php
                                $SanPham = App\Models\CartUser::where('khach_hang_id', Auth::user()->id)->get();
                                $value = 0;
                                foreach ($SanPham as $val) {
                                    $value += $val['so_luong'];
                                }
                            @endphp
                            <a class="cart-contents"
                                href="{{ URL::to('/khach-hang/' . Auth::user()->slug . '-' . Auth::user()->id . '/gio-hang') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="header__cart-notice" class="classcuaban">{{ count($SanPham) }}</span>
                                <input hidden type="number" id="total-quanty-cart" value="{{ count($SanPham) }}">
                            </a>
                        @else
                            <a class="cart-contents" href="{{ route('home.gio_hang') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                @if (Session::has('Cart') != null)
                                    <span id="header__cart-notice"
                                        class="classcuaban">{{ count(Session::get('Cart')->dsSanPham) }}</span>
                                    <input hidden type="number" id="total-quanty-cart"
                                        value="{{ count(Session::get('Cart')->dsSanPham) }}">
                                @else
                                    <span class="classcuaban">0</span>
                                @endif
                            </a>
                        @endif
                    </div>
                </li>
                <li>
                    <div class="shopcart">
                        @if (Auth::check())
                            <span class="welcome-main">Xin chào,<a class="name-user-header cart-contents"
                                    href="{{ URL::to('/khach-hang/' . Auth::user()->slug . '-' . Auth::user()->id . '/trang-ca-nhan') }}">{{ mb_strimwidth(Auth::user()->ten, 0, 10, '...') }}
                                </a></span>
                        @else
                            <a class="cart-contents" href="{{ route('home.dang_nhap') }}">
                                Đăng nhập
                            </a>
                        @endif
                    </div>
                </li>
            </ul>
        </div><!-- flex-col -->


    </div><!-- .flex-row -->
</div><!-- .header-bottom -->
<script type="text/javascript">
    jQuery("#tour_search_form").keyup(function() {
        var search = jQuery(this).serialize();
        if (jQuery(this).find('.m-input').val() == '') {
            jQuery('#search-suggest').hide();
        } else {
            jQuery('#search-suggest').show();
            jQuery.ajax({
                url: "{{ route('home.tim_kiem') }}",
                type: 'POST',
                data: search,
                success: function(result) {
                    var li = '';
                    var li_packages = '';
                    var ul = '';
                    jQuery.each(result['sanPham'], function(index, sanPham) {
                        li = "<li class='the_li_goi_y' ><a  class='the_a_goi_y' href='/san-pham/" +
                            sanPham.slug +
                            "'><p class='lb-name-couses' class='name_course'>" + sanPham
                            .ten_san_pham + "</p></a></li>";
                        li_packages = li_packages + '' + li;
                    });

                    ul = '<ul id="the_ul_goi_y">' + li_packages + '</ul>';
                    jQuery('#search-suggest').html(ul);
                }
            })
        };
    });
    var focusGoiY = false;

    jQuery("#search-suggest").on("mouseenter", function() {
        jQuery("#search-suggest").show();
        focusGoiY = true;
    });

    jQuery("#search").on("focusout", function() {
        if (!focusGoiY) {
            jQuery("#search-suggest").hide();
        }

    });

    jQuery("#search-suggest").on("mouseleave", function() {
        focusGoiY = false;
        jQuery("#search").on("focusout", function() {
            if (!focusGoiY) {
                jQuery("#search-suggest").hide();
            }
        });
    });
</script>
<script type="text/javascript"></script>
