<aside id="mega_main_sidebar_menu-2" class="widget widget_mega_main_sidebar_menu">
    <div class="widget-title widget-title-sidebar ">
        <span>DANH MỤC SẢN PHẨM</span>
    </div>
    <div class="is-divider small"></div>
    <!-- begin "mega_main_menu" -->
    <div id="mega_main_menu"
        class="mega_main_sidebar_menu primary_style-flat icons-left first-lvl-align-left first-lvl-separator-smooth direction-vertical fullwidth-disable pushing_content-disable mobile_minimized-enable dropdowns_trigger-hover dropdowns_animation-none no-logo no-search no-woo_cart no-buddypress responsive-enable coercive_styles-disable indefinite_location_mode-disable language_direction-ltr version-2-1-5 mega_main mega_main_menu">
        <div class="menu_holder">
            <div class="mmm_fullwidth_container"></div> <!-- class="fullwidth_container" -->
            <div class="menu_inner">
                <span class="nav_logo">
                    <a class="mobile_toggle">
                        <span class="mobile_button">
                            Menu &nbsp;
                            <span class="symbol_menu">&equiv;</span>
                            <span class="symbol_cross">&#x2573;</span>
                        </span> <!-- class="mobile_button" -->
                    </a>
                </span> <!-- /class="nav_logo" -->
                <ul id="mega_main_menu_ul" class="mega_main_menu_ul">
                    @if (!empty($listDanhMuc))
                        @php
                            $listDanhMuc = App\Models\LoaiSanPham::where('parent_id', null)
                                ->get()
                                ->sortBy('ten_loai');
                        @endphp
                        @foreach ($listDanhMuc as $danhMuc)
                            @if (!empty($danhMuc->ten_loai))
                                @php
                                    $listDanhMucCon = App\Models\LoaiSanPham::where('parent_id', null)->get();
                                @endphp
                                <li id="menu-item-109"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-109 default_dropdown default_style drop_to_right submenu_default_width columns1">
                                    <a href="{{ route('home.san_pham_theo_danh_muc', $danhMuc->slug) }}"
                                        class="		@if ($listDanhMucCon->isNotEmpty()) item_link with_icon @else item_link item_link_not_sub with_icon @endif" tabindex="1">
                                        <i class="im-icon-food-2"></i>
                                        <span class="link_content">
                                            <span class="link_text">
                                                {{ $danhMuc->ten_loai }}
                                            </span>
                                        </span>
                                    </a>
                                    @php
                                        $child = App\Models\LoaiSanPham::where('parent_id', $danhMuc->id)->get();
                                    @endphp
                                    @if (count($child) > 0)
                                        <ul class="mega_dropdown">
                                            @foreach ($child as $val)
                                                @php
                                                    $slug = 'danh-muc/' . $danhMuc->slug . '/' . $val->slug;
                                                @endphp
                                                @if (!empty($val->ten_loai))
                                                    <li id="menu-item-116"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-116 default_dropdown default_style drop_to_right submenu_default_width columns1">
                                                        <a href="{{ url($slug) }}" class="item_link  disable_icon"
                                                            tabindex="2">
                                                            <i class=""></i>
                                                            <span class="link_content">
                                                                <span class="link_text">
                                                                    {{ $val->ten_loai }}
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div> <!-- /class="menu_inner" -->
        </div> <!-- /class="menu_holder" -->
    </div> <!-- /id="mega_main_menu" -->
</aside>
