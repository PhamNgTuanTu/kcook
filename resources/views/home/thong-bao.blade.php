@extends(config('template.homeTemplateBladeURL').'master')

@section('content')
	<main id="main" class="">
		<div id="content" class="blog-wrapper blog-archive page-wrapper">
			<div class="row row-divided ">
				<div class="post-sidebar large-3 col">
					<div id="secondary" class="widget-area " role="complementary">
						@include('home.partials.menu-danh-muc-san-pham', ['listDanhMuc' => $listDanhMucCha])
						@include('home.partials.ho-tro-truc-tuyen')
						@include('home.partials.san-pham-ban-chay')
						@include('home.partials.thong-ke-truy-cap')
					</div><!-- #secondary -->
				</div><!-- .post-sidebar -->

				<div class="large-9 col medium-col-first">
					<div class="col-inner">								
						<p>Bài viết Giới thiệu về chúng tôi</p>
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
@endsection

@section('page-js')
		<script type='text/javascript' src='{{ asset("assets/plugins/mega_main_menu/src/js/frontend-ver=2.1.5.js") }}'></script>
		<script type='text/javascript' src='{{ asset("assets/js/hoverIntent.min-ver=1.8.1.js") }}'></script>
		<script type='text/javascript' src='{{ asset("assets/flatsome/assets/js/flatsome-ver=3.5.2.js") }}'></script>
		<script type='text/javascript' src='{{ asset("assets/flatsome/assets/js/woocommerce-ver=3.5.2.js") }}'></script>
@endsection