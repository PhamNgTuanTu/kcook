<header id="header" class="header has-sticky sticky-jump">
    <div class="header-wrapper">
        @php
            $cau_hinh = App\Models\CauHinh::first();
        @endphp
        <div id="masthead" class="header-main hide-for-sticky"
            style="background-image: url({{ isset($cau_hinh->banner) ? $cau_hinh->banner : asset('assets/images/banner.png') }});background-repeat: no-repeat;background-size: cover;">
            <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">

                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="#" title="Nội thất Lương Sơn - Một trang web mới sử dụng WordPress" rel="home">Nội thất
                        Lương Sơn</a>
                </div>

                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="index.html#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay"
                                data-color="" class="is-small" aria-controls="main-menu" aria-expanded="false">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left flex-grow">
                    <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                    </ul>
                </div>

                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                    </ul>
                </div>

                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                    </ul>
                </div>

            </div><!-- .header-inner -->

            <!-- Header divider -->
            <div class="container">
                <div class="top-divider full-width"></div>
            </div>
        </div><!-- .header-main -->

        <div id="change-item-cart">
            @include('home.partials.main-menu')
        </div>

        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div><!-- .header-bg-container -->
    </div><!-- header-wrapper-->
</header>
