<!DOCTYPE html>
<!--[if IE 9 ]> <html lang="vi" prefix="og: http://ogp.me/ns#" class="ie9 loading-site no-js"> <![endif]-->
<!--[if IE 8 ]> <html lang="vi" prefix="og: http://ogp.me/ns#" class="ie8 loading-site no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="vi" prefix="og: http://ogp.me/ns#" class="loading-site no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <script>
        (function(html) {
            html.className = html.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement);
    </script>
    @yield('title')
    <!-- This site is optimized with the Yoast SEO plugin v5.0.2 - https://yoast.com/wordpress/plugins/seo/ -->
    @yield('seo-meta')
    <!-- / Yoast SEO plugin. -->

    <link rel='dns-prefetch' href='http://maxcdn.bootstrapcdn.com' />
    <link rel='dns-prefetch' href='http://s.w.org' />
    <link rel="alternate" type="application/rss+xml" title="Dòng thông tin Nội thất Lương Sơn &raquo;"
        href="../../feed/index.html" />
    <link rel="alternate" type="application/rss+xml" title="Dòng phản hồi Nội thất Lương Sơn &raquo;"
        href="../../comments/feed/index.html" />
    <link rel="alternate" type="application/rss+xml"
        title="Dòng thông tin chuyên mục Nội thất Lương Sơn &raquo; Thông báo" href="feed/index.html" />
    <script type="text/javascript">
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "http:\/\/noithat21.giaodienwebmau.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.9.18"
            }
        };
        ! function(e, a, t) {
            var n, r, o, i = a.createElement("canvas"),
                p = i.getContext && i.getContext("2d");

            function s(e, t) {
                var a = String.fromCharCode;
                p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0);
                e = i.toDataURL();
                return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
            }

            function c(e) {
                var t = a.createElement("script");
                t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
            }
            for (o = Array("flag", "emoji"), t.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
                if (!p || !p.fillText) return !1;
                switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
                    case "flag":
                        return s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) ? !1 : !s([55356,
                            57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128,
                            56447
                        ], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203,
                            56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447
                        ]);
                    case "emoji":
                        return !s([55358, 56760, 9792, 65039], [55358, 56760, 8203, 9792, 65039])
                }
                return !1
            }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports
                .everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
            t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t
                .readyCallback = function() {
                    t.DOMReady = !0
                }, t.supports.everything || (n = function() {
                    t.readyCallback()
                }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !
                    1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
                    "complete" === a.readyState && t.readyCallback()
                })), (n = t.source || {}).concatemoji ? c(n.concatemoji) : n.wpemoji && n.twemoji && (c(n.twemoji), c(n
                    .wpemoji)))
        }(window, document, window._wpemojiSettings);
    </script>
    <!-- <link rel='stylesheet' id='contact-form-7-css' href='../../wp-content/plugins/contact-form-7/includes/css/styles-ver=5.0.1.css' type='text/css' media='all' />
  <link rel='stylesheet' id='prefix-style-css' href='../../wp-content/plugins/new-recent-posts-select-categories-by-thao-marky/css/pluginstyle-ver=4.9.18.css' type='text/css' media='all' /> -->
    <link rel='stylesheet' id='dashicons-css' href='{{ asset('assets/css/dashicons.min-ver=4.9.18.css') }}'
        type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-ionicons-css'
        href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=4.9.18' type='text/css'
        media='all' />
    <link rel='stylesheet' id='flatsome-icons-css'
        href='{{ asset('assets/flatsome/assets/css/fl-icons-ver=3.3.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='mm_icomoon-css'
        href='{{ asset('assets/plugins/mega_main_menu/framework/src/css/icomoon-ver=2.1.5.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' id='mm_font-awesome-css'
        href='{{ asset('assets/plugins/mega_main_menu/framework/src/css/font-awesome-ver=2.1.5.css') }}'
        type='text/css' media='all' />
    <link rel='stylesheet' id='mm_glyphicons-css'
        href='{{ asset('assets/plugins/mega_main_menu/framework/src/css/glyphicons-ver=2.1.5.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' id='mm_linearicons-css'
        href='{{ asset('assets/plugins/mega_main_menu/framework/src/css/linearicons-ver=2.1.5.css') }}'
        type='text/css' media='all' />
    <link rel='stylesheet' id='mmm_mega_main_menu-css'
        href='{{ asset('assets/plugins/mega_main_menu/src/css/cache.skin-ver=1500942974.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' id='flatsome-main-css'
        href='{{ asset('assets/flatsome/assets/css/flatsome-ver=3.5.2.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-shop-css'
        href='{{ asset('assets/flatsome/assets/css/flatsome-shop-ver=3.5.2.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-style-css' href='{{ asset('assets/style-ver=3.5.2.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' id='flatsome-style-css' href='{{ asset('assets/custom.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' href='{{ asset('assets/css/custom-button.css') }}' type='text/css'
        media='all' />
    <script type='text/javascript' src='{{ asset('assets/js/jquery/jquery-ver=1.12.4.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/js/jquery/jquery-migrate.min-ver=1.4.1.js') }}'></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/count-per-day/counter.css') }}" type="text/css" />
    <link href="{{ asset('assets/css/custom-homepage.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css"
        integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .bg {
            opacity: 0;
            transition: opacity 1s;
            -webkit-transition: opacity 1s;
        }

        .bg-loaded {
            opacity: 1;
        }

    </style>
    <!--[if IE]><link rel="stylesheet" type="text/css" href="{{ asset('assets/flatsome/assets/css/ie-fallback.css') }}">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
  <script>
      var head = document.getElementsByTagName('head')[0],
          style = document.createElement('style');
      style.type = 'text/css';
      style.styleSheet.cssText = ':before,:after{content:none !important';
      head.appendChild(style);
      setTimeout(function() {
          head.removeChild(style);
      }, 0);
  </script>
  <script src="../../wp-content/themes/flatsome/assets/libs/ie-flexibility.js"></script><![endif]-->
    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: ["Helvetica,Arial,sans-serif:regular,700", "Helvetica,Arial,sans-serif:regular,regular",
                    "Helvetica,Arial,sans-serif:regular,700", "Helvetica,Arial,sans-serif",
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }

        </style>
    </noscript>
    <link rel="icon" href="{{ asset('assets/cropped-favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('assets/cropped-favicon-192x192.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/cropped-favicon-180x180.png') }}" />
    <meta name="msapplication-TileImage" content="{{ asset('assets/cropped-favicon-270x270.png') }}" />
    <meta property="fb:admins" content="100001613853961" />
    <meta property="fb:app_id" content="104537736801666" />
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=104537736801666";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-216350788-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-216350788-1');
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    @yield('page-css')
</head>

<body class="archive category category-thong-bao category-44 mmm mega_main_menu-2-1-5 lightbox nav-dropdown-has-arrow">
    <div id="wrapper">
        @include('home.partials.header')
        @yield('breadcrumb')
        @yield('content')
        @include('home.partials.footer')
    </div><!-- #wrapper -->

    @include('home.partials.mobile-menu')
    @include('home.partials.login-form')

    <script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bootstrap/js/popper.min.js') }}"></script>

    <!-- <script type='text/javascript' src='../../wp-content/plugins/contact-form-7/includes/js/scripts-ver=5.0.1.js'></script>
  <script type='text/javascript'
    src='../../wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min-ver=3.3.3.js'></script>
  <script type='text/javascript'
    src='../../wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min-ver=2.70.js'></script>
  <script type='text/javascript'
    src='../../wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min-ver=2.1.4.js'></script>
  <script type='text/javascript'
    src='../../wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min-ver=3.3.3.js'></script>
  <script type='text/javascript'
    src='../../wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min-ver=3.3.3.js'></script> -->
    <script type='text/javascript' src='{{ asset('assets/plugins/mega_main_menu/src/js/frontend-ver=2.1.5.js') }}'>
    </script>
    <script type='text/javascript' src='{{ asset('assets/js/hoverIntent.min-ver=1.8.1.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/flatsome-ver=3.5.2.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/woocommerce-ver=3.5.2.js') }}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"
        integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('page-js')
    @yield('page-custom-js')
</body>

</html>
@include('home.partials.hien-thi-thong-tin')
