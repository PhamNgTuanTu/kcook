@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>THÔNG BÁO | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="THÔNG BÁO | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="THÔNG BÁO | ĐỒ DÙNG NHÀ BẾP K.COOK" />
@endsection
@section('content')
	<main id="main" class="page-cart">
    <div id="content" class="content-area page-wrapper" role="main">
        <div class="row row-main">
            <div class="large-12">
                <div class="col-inner">
                    <h4>Chúng tôi sẽ phản hồi cho bạn sớm nhất có thể, xin cảm ơn!</h4>
                </div>
                <!-- .col-inner -->
            </div>
            <!-- .large-12 -->
        </div>
        <!-- .row -->
    </div>
</main>

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