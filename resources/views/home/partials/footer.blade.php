<footer id="footer" class="footer-wrapper">
    <!-- FOOTER 1 -->
    <div class="footer-widgets footer footer-1">
        @php
            $cau_hinh = App\Models\CauHinh::first();
            $arrHotline = isset($cau_hinh->hotline) ? json_decode($cau_hinh->hotline) : [];
        @endphp
        <div class="row dark large-columns-1 mb-0">
            <div id="text-5" class="col pb-0 widget widget_text">
                <div class="textwidget">
                    <br />
                    <section class="section Section-footer" id="section_918808229"
                        style="padding-top: 30px; padding-bottom: 30px;">
                        <div class="bg section-bg fill bg-fill  bg-loaded"></div>
                        <p>
                            <!-- .section-bg -->
                        </p>
                        <div class="section-content relative">
                            <div class="row" id="row-303316753">
                                <div class="col div-title-footer small-12 large-12">
                                    <div class="col-inner">
                                        <p class="name-footer">{{ isset($cau_hinh->ten_cong_ty ) ? $cau_hinh->ten_cong_ty  : 'Chưa nhập tên công ty' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="row-1181019121">
                                <div class="col medium-3 small-12 large-3">
                                    <div class="col-inner">
                                        <ul class="sidebar-wrapper ul-reset ">
                                            <div id="nav_menu-2" class="col pb-0 widget widget_nav_menu">
                                                <div class="is-divider small"></div>
                                                <div class="menu-menu-footer-container">
                                                    <ul id="menu-menu-footer" class="menu">
                                                        <li id="menu-item-306"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-306">
                                                            <a href="{{ route('home.san_pham') }}">Sản phẩm</a>
                                                        </li>
                                                        <li id="menu-item-305"
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-305">
                                                            <a href="{{ route('home.tin_tuc') }}">Tin tức</a>
                                                        </li>
                                                        <li id="menu-item-307"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-307">
                                                            <a href="{{ route('home.lien_he') }}">Liên hệ</a>
                                                        </li>
                                                        <li id="menu-item-307"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-307">
                                                            <a href="{{ route('home.tuyen_dung') }}">Tuyển dụng</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col medium-5 small-12 large-5">
                                    <div class="col-inner">
                                        <p>Địa chỉ:
                                            {{ isset($cau_hinh->tru_so_chinh) ? $cau_hinh->tru_so_chinh : 'Chưa nhập địa chỉ' }}
                                        </p>
                                        <p>Hotline:
                                            {{ count($arrHotline) > 0 ? implode(' - ', $arrHotline) : 'Chưa nhập hotline' }}
                                        </p>
                                        <p>Email: {{ isset($cau_hinh->email) ? $cau_hinh->email : 'Chưa nhập email' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col medium-4 small-12 large-4">
                                    <div class="col-inner">
                                        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1358178478"
                                            style="width: 100%;">
                                            <div class="img-inner dark">
                                                @if (isset($cau_hinh->source))
                                                <iframe
                                                    src="{{ $cau_hinh->source }}"
                                                    width="338" height="163" style="border:0;" allowfullscreen=""
                                                    loading="lazy"></iframe>
                                                @else
                                                    <p style="text-align: center">Chưa cấu hình vị trí !</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <!-- .section-bg -->
                        </p>
                    </section>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- footer 1 -->


    <!-- FOOTER 2 -->
    <div class="absolute-footer dark medium-text-center text-center">
        <div class="container clearfix">
            <div class="footer-primary pull-left">
                <div class="copyright-footer">
                    Copyright 2021 &copy; <strong>Mộc nghệ thuật - Một sản phẩm của <a href="#" target="_blank">Web Khởi
                            Nghiệp</a></strong>
                </div>
            </div><!-- .left -->
        </div><!-- .container -->
    </div><!-- .absolute-footer -->
    <a href="index.html#top"
        class="back-to-top button invert plain is-outline hide-for-medium icon circle fixed bottom z-1" id="top-link">
        <i class="icon-angle-up"></i>
    </a>
</footer><!-- .footer-wrapper -->
