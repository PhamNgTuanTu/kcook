<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar nav-vertical nav-uppercase">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-50">
                <a href="{{ route('home.home') }}" class="nav-top-link">Trang chủ</a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53">
                <a href="{{ route('home.san_pham') }}" class="nav-top-link">Sản phẩm</a>
            </li>
            <!--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-267">
                <a href="{{ route('home.gioi_thieu') }}" class="nav-top-link">Giới thiệu</a>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-354">
                <a href="#" class="nav-top-link">Khuyến mại</a>
            </li>-->
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-193">
                <a href="{{ route('home.tin_tuc') }}" class="nav-top-link">Tin tức</a>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-356">
                <a href="{{ route('home.tuyen_dung') }}" class="nav-top-link">Tuyển dụng</a>
            </li>
            <!--<li class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-355">
                <a href="{{ route('home.thong_bao') }}" class="nav-top-link">Thông báo</a>
            </li>-->
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-266">
                <a href="{{ route('home.lien_he') }}" class="nav-top-link">Liên hệ</a>
            </li>

            @if (Auth::check())
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-266">
                    <a href="{{ route('nguoi-dung.gio_hang_user', Auth::user()->id) }}" class="nav-top-link">Giỏ
                        hàng</a>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-266">
                    <a href="{{ route('nguoi-dung.trang_ca_nhan', Auth::user()->id) }}" class="nav-top-link">Trang cá nhân</a>
                </li>
            @else
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-266">
                    <a href="{{ route('home.gio_hang') }}" class="nav-top-link">Giỏ hàng</a>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-266">
                    <a href="{{ route('home.dang_nhap') }}" class="nav-top-link">Đăng nhập</a>
                </li>
            @endif
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                        <form role="search" method="post" class="searchform"
                            action="{{ route('home.ket_qua_tim_kiem') }}">
                            @csrf
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <input type="search" class="search-field mb-0" name="search" value=""
                                        placeholder="Tìm kiếm&hellip;" />
                                    <input type="hidden" name="post_type" value="product" />
                                </div> <!-- .flex-col -->
                                <div class="flex-col">
                                    <button type="submit"
                                        class="ux-search-submit submit-button secondary button icon mb-0">
                                        <i class="icon-search"></i>
                                    </button>
                                </div> <!-- .flex-col -->
                            </div> <!-- .flex-row -->
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div><!-- inner -->
</div><!-- #mobile-menu -->
