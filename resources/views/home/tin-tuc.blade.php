@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>TIN TỨC | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="TIN TỨC | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="TIN TỨC | ĐỒ DÙNG NHÀ BẾP K.COOK" />
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
                    @if ($listTinTuc->isNotEmpty())
                        {{-- @foreach ($listTinTuc as $tinTuc)
						<div id="post-list">
						    <article id="post-{{$tinTuc->id}}" class="post-227 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
						        <div class="article-inner">
						            <header class="entry-header">
						                <div class="entry-header-text entry-header-text-top text-left">
						                    <h2 class="entry-title"><a href="{{route('home.chi_tiet_tin_tuc', $tinTuc->slug)}}" rel="bookmark" class="plain">{{$tinTuc->tieu_de}}</a></h2>

						                    <div class="entry-meta is-small single-date">
						                        <span class="posted-on">
						                            Đã đăng vào
						                                <time class="entry-date published" datetime="2017-07-25T06:29:51+00:00">{{$tinTuc->created_at}}</time>
						                        </span>
						                        <span class="byline">
							                        bởi <span class="meta-author vcard">admin</span>
							                    </span>
						                    </div>
						                    <!-- .entry-meta -->
						                </div>
						                <!-- .entry-header -->

						                <div class="entry-image relative"></div>
						                <!-- .entry-image -->
						            </header>
						            <!-- post-header -->

						            <div class="entry-content">
										<div>
											<img src="{{ $tinTuc->anh }}" alt="{{ $tinTuc->tieu_de }}" />
										</div>
						                <div class="entry-summary">
						                    {{ Str::substr(strip_tags($tinTuc->noi_dung), 0, 200) }}[...]
						                    <div class="text-left" style="margin-top: 1.5rem">
						                        <a class="woocommerce-Button button" href="{{ route('home.chi_tiet_tin_tuc', $tinTuc->slug) }}">Xem thêm <span class="meta-nav">→</span></a>
						                    </div>
						                </div>
						                <!-- .entry-summary -->
						            </div>
						            <!-- .entry-content -->
						            <!-- <footer class="entry-meta clearfix">
						                <span class="cat-links"> Posted in <a href="index.html" rel="category tag">Tin tức</a> </span>

						                <span class="comments-link pull-right"><a href="../../10-sai-lam-trong-cach-sap-xep-noi-phong-khach-nen-tranh/index.html#respond">Leave a comment</a></span>
						            </footer>-->
						            <!-- .entry-meta -->
						        </div>
						        <!-- .article-inner -->
						    </article>
						    <!-- #-227 -->

						</div>
						@endforeach --}}
                        <div class="row large-columns-3 medium-columns-1 small-columns-1 has-shadow row-box-shadow-1">
                            @foreach ($listTinTuc as $tinTuc)
                                <div class="col post-item">
                                    <div class="col-inner h-100">
                                        <a href="{{ route('home.chi_tiet_tin_tuc', $tinTuc->slug) }}"
                                            class="plain">
                                            <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                                <div class="box-image">
                                                    <div class="image-cover" style="padding-top: 56.25%;">
                                                        <img width="600" height="400" alt="{{ $tinTuc->tieu_de }}"
                                                            src="{{ $tinTuc->anh }}"
                                                            class="attachment-medium size-medium wp-post-image" alt="" />
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
@endsection

@section('page-js')
    <script type='text/javascript' src='{{ asset('assets/plugins/mega_main_menu/src/js/frontend-ver=2.1.5.js') }}'>
    </script>
    <script type='text/javascript' src='{{ asset('assets/js/hoverIntent.min-ver=1.8.1.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/flatsome-ver=3.5.2.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/woocommerce-ver=3.5.2.js') }}'></script>
@endsection
