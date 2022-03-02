@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>TUYỂN DỤNG | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="TUYỂN DỤNG | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="TUYỂN DỤNG | ĐỒ DÙNG NHÀ BẾP K.COOK" />
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
					@if($listTinTuc->isNotEmpty())
						@foreach ($listTinTuc as $tinTuc)
						<div id="post-list">
						    <article id="post-{{$tinTuc->id}}" class="post-227 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
						        <div class="article-inner">
						            <header class="entry-header">
						                <div class="entry-header-text entry-header-text-top text-left" style="padding-bottom: 0">
						                    <h2 class="entry-title font-20"><a href="{{route('home.chi_tiet_tuyen_dung', $tinTuc->slug)}}" rel="bookmark" class="plain">{{$tinTuc->tieu_de}}</a></h2>

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
						                <div class="entry-summary font-14">
											{!! mb_strimwidth($tinTuc->phu_de, 0, 200, '[...]') !!}
						                    <div class="text-left" style="margin-top: 0.5rem">
						                        <a class="link-login" href="{{ route('home.chi_tiet_tuyen_dung', $tinTuc->slug) }}">Đọc thêm <span class="meta-nav">→</span></a>
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
						@endforeach
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
		<script type='text/javascript' src='{{ asset("assets/plugins/mega_main_menu/src/js/frontend-ver=2.1.5.js") }}'></script>
		<script type='text/javascript' src='{{ asset("assets/js/hoverIntent.min-ver=1.8.1.js") }}'></script>
		<script type='text/javascript' src='{{ asset("assets/flatsome/assets/js/flatsome-ver=3.5.2.js") }}'></script>
		<script type='text/javascript' src='{{ asset("assets/flatsome/assets/js/woocommerce-ver=3.5.2.js") }}'></script>
@endsection