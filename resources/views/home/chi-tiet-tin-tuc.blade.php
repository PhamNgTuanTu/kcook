@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>CHI TIẾT TIN TỨC | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="{{$tinTuc->meta_title}}" />
    <meta name="description" content="{{$tinTuc->meta_description}}" />
    <meta property="og:title" content="{{$tinTuc->meta_title}}" />
    <meta property="og:description" content="{{$tinTuc->meta_description}}" />
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
					<article id="post-227" class="post-227 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
					    <div class="article-inner">
					        <header class="entry-header">
					            <div class="entry-header-text entry-header-text-top text-left">
					                <h3 class="entry-title font-20">{{$tinTuc->tieu_de}}</h3>

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

					        <div class="entry-content single-page font-14">
					            {!!$tinTuc->noi_dung!!}
					            {{-- <div class="blog-share text-center">
					                <div class="social-icons share-icons share-row relative icon-style-outline">
					                    <a
					                        href="whatsapp://send?text=10%20sai%20l%E1%BA%A7m%20trong%20c%C3%A1ch%20s%E1%BA%AFp%20x%E1%BA%BFp%20n%E1%BB%99i%20th%E1%BA%A5t%20ph%C3%B2ng%20kh%C3%A1ch%20n%C3%AAn%20tr%C3%A1nh - http://noithat21.giaodienwebmau.com/10-sai-lam-trong-cach-sap-xep-noi-phong-khach-nen-tranh/"
					                        data-action="share/whatsapp/share"
					                        class="icon button circle is-outline tooltip whatsapp show-for-medium tooltipstered"
					                    >
					                        <i class="icon-phone"></i>
					                    </a>
					                    <a
					                        href="http://www.facebook.com/sharer.php?u=http://noithat21.giaodienwebmau.com/10-sai-lam-trong-cach-sap-xep-noi-phong-khach-nen-tranh/"
					                        data-label="Facebook"
					                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
					                        rel="nofollow"
					                        target="_blank"
					                        class="icon button circle is-outline tooltip facebook tooltipstered"
					                    >
					                        <i class="icon-facebook"></i>
					                    </a>
					                    <a
					                        href="http://twitter.com/share?url=http://noithat21.giaodienwebmau.com/10-sai-lam-trong-cach-sap-xep-noi-phong-khach-nen-tranh/"
					                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
					                        rel="nofollow"
					                        target="_blank"
					                        class="icon button circle is-outline tooltip twitter tooltipstered"
					                    >
					                        <i class="icon-twitter"></i>
					                    </a>
					                    <a
					                        href="mailto:enteryour@addresshere.com?subject=10%20sai%20l%E1%BA%A7m%20trong%20c%C3%A1ch%20s%E1%BA%AFp%20x%E1%BA%BFp%20n%E1%BB%99i%20th%E1%BA%A5t%20ph%C3%B2ng%20kh%C3%A1ch%20n%C3%AAn%20tr%C3%A1nh&amp;body=Check%20this%20out:%20http://noithat21.giaodienwebmau.com/10-sai-lam-trong-cach-sap-xep-noi-phong-khach-nen-tranh/"
					                        rel="nofollow"
					                        class="icon button circle is-outline tooltip email tooltipstered"
					                    >
					                        <i class="icon-envelop"></i>
					                    </a>
					                    <a
					                        href="http://pinterest.com/pin/create/button/?url=http://noithat21.giaodienwebmau.com/10-sai-lam-trong-cach-sap-xep-noi-phong-khach-nen-tranh/&amp;media=http://noithat21.giaodienwebmau.com/wp-content/uploads/2017/07/mau1-2.jpg&amp;description=10%20sai%20l%E1%BA%A7m%20trong%20c%C3%A1ch%20s%E1%BA%AFp%20x%E1%BA%BFp%20n%E1%BB%99i%20th%E1%BA%A5t%20ph%C3%B2ng%20kh%C3%A1ch%20n%C3%AAn%20tr%C3%A1nh"
					                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
					                        rel="nofollow"
					                        target="_blank"
					                        class="icon button circle is-outline tooltip pinterest tooltipstered"
					                    >
					                        <i class="icon-pinterest"></i>
					                    </a>
					                    <a
					                        href="http://plus.google.com/share?url=http://noithat21.giaodienwebmau.com/10-sai-lam-trong-cach-sap-xep-noi-phong-khach-nen-tranh/"
					                        target="_blank"
					                        class="icon button circle is-outline tooltip google-plus tooltipstered"
					                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
					                        rel="nofollow"
					                    >
					                        <i class="icon-google-plus"></i>
					                    </a>
					                    <a
					                        href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://noithat21.giaodienwebmau.com/10-sai-lam-trong-cach-sap-xep-noi-phong-khach-nen-tranh/&amp;title=10%20sai%20l%E1%BA%A7m%20trong%20c%C3%A1ch%20s%E1%BA%AFp%20x%E1%BA%BFp%20n%E1%BB%99i%20th%E1%BA%A5t%20ph%C3%B2ng%20kh%C3%A1ch%20n%C3%AAn%20tr%C3%A1nh"
					                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
					                        rel="nofollow"
					                        target="_blank"
					                        class="icon button circle is-outline tooltip linkedin tooltipstered"
					                    >
					                        <i class="icon-linkedin"></i>
					                    </a>
					                </div>
					            </div> --}}
					        </div>
					        <!-- .entry-content2 -->

					        <!--<footer class="entry-meta text-left">
					            This entry was posted in <a href="../category/tin-tuc/index.html" rel="category tag">Tin tức</a>. Bookmark the
					            <a href="index.html" title="Permalink to 10 sai lầm trong cách sắp xếp nội thất phòng khách nên tránh" rel="bookmark">permalink</a>.
					        </footer>-->
					        <!-- .entry-meta -->
					        @if($tinTucLienQuan->isNotEmpty())
					        <div class="related-post">
					            <div class="" style="margin-top: 30px; margin-bottom: 20px;">
					                <h7>TIN LIÊN QUAN</h7>
					                {{-- <div class="duong-line"></div> --}}
					            </div>
					            <div class="clearfix"></div>
					            <div class="row large-columns-3 medium-columns-2 small-columns-1 has-shadow row-box-shadow-1 row-box-shadow-1-hover" style="margin-top: 10px">
					            	@foreach ($tinTucLienQuan as $tinTuc)
									
					                <div class="col post-item">
					                    <div class="col-inner">
					                        <a href="{{route('home.chi_tiet_tin_tuc', $tinTuc->slug)}}" class="plain">
					                            <div class="box box-bounce box-text-bottom box-blog-post has-hover">
					                                <div class="box-image">
					                                    <div class="image-cover" style="padding-top: 56%;">
					                                        <img
					                                            width="800"
					                                            height="531"
					                                            src="{{$tinTuc->anh}}"
					                                            class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
					                                            alt="{{$tinTuc->tieu_de}}"
					                                            
					                                            sizes="(max-width: 800px) 100vw, 800px"
					                                        />
					                                    </div>
					                                </div>
					                                <!-- .box-image -->
					                                <div class="box-text text-center">
					                                    <div class="box-text-inner blog-post-inner">
					                                        <h5 class="post-title is-large font-16">{{$tinTuc->tieu_de}}</h5>
					                                        <div class="post-meta is-small op-8 font-14"> {!! mb_strimwidth($tinTuc->phu_de, 0, 100, '[...]') !!}</div>
					                                        <div class="is-divider"></div>
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
					                <!-- .col -->
					                @endforeach
					            </div>
					        </div>
					        @endif
					    </div>
					    <!-- .article-inner -->
					</article>


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