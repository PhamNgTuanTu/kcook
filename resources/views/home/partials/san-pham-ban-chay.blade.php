<aside id="woocommerce_products-2" class="widget woocommerce widget_products">
	<div class="widget-title widget-title-sidebar ">
		<span>Sản phẩm bán chạy</span>
	</div>
	<div class="is-divider small"></div>
	@if($listSanPhamBanChay->isNotEmpty())
	<ul class="product_list_widget">
		@foreach($listSanPhamBanChay as $sanPham)
			@php 
                $anhSanPham = App\Models\HinhAnh::where('san_pham_id',$sanPham->id)->first();
            @endphp
			<li>
				<a href="{{ route('home.chi_tiet_san_pham', $sanPham->slug )}}">
					@if(!empty($anhSanPham->url))
						<img width="300" height="300" src="{{$anhSanPham->url}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="{{ $sanPham->ten_san_pham}}" sizes="(max-width: 300px) 100vw, 300px" />
					@else
						<img width="300" height="300" src="{{ asset('admin/assets/img/300x300.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="{{ $sanPham->ten_san_pham}}" sizes="(max-width: 300px) 100vw, 300px" />
					@endif
					<span class="product-title">{{ $sanPham->ten_san_pham}}</span>
				</a>
				<span class="woocommerce-Price-amount amount">{{ number_format($sanPham->gia_ban, 2)}}&nbsp;<span class="woocommerce-Price-currencySymbol">VNĐ</span>
				</span>
			</li>
		@endforeach
	</ul>
	@endif
</aside>