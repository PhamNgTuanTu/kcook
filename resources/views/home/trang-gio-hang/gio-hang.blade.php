<div>
    <div class="title">Giỏ hàng</div>

    <div class="cart-wrapper sm-touch-scroll">
        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-name" colspan="3" style="padding-left: 10px">Sản phẩm</th>
                    <th class="product-price" style="padding-left: 10px">Giá</th>
                    <th class="product-quantity" style="padding-left: 10px">Số lượng</th>
                    <th class="product-subtotal" style="padding-right: 10px">Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
                @if (Session::has('Cart') != null)
                    @foreach (Session::get('Cart')->dsSanPham as $val)
                        <tr class="woocommerce-cart-form__cart-item cart_item">
                            <td class="product-remove" style="padding-left: 10px">
                                <a data-id="{{ $val['thongTinSanPham']->id }}" data-quantity="{{ $val['soLuong'] }}"
                                    class="remove action_delete" aria-label="Xóa sản phẩm này">×</a>
                            </td>

                            <td class="product-thumbnail">
                                @php
                                    $anhSanPham = App\Models\HinhAnh::where('san_pham_id', $val['thongTinSanPham']->id)->first();
                                @endphp
                                <a href="{{ route('home.chi_tiet_san_pham', $val['thongTinSanPham']->slug) }}">
                                    @if(!empty($anhSanPham->url))
                                    <img width="300" height="300" src="{{ $anhSanPham->url }}" alt="{{ $val['thongTinSanPham']->ten_san_pham }}"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                        alt="" sizes="(max-width: 300px) 100vw, 300px" />
                                    @else
                                    <img width="300" height="300" src="{{ asset('admin/assets/img/300x300.jpg') }}" alt="{{ $val['thongTinSanPham']->ten_san_pham }}"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                        alt="" 
                                        sizes="(max-width: 300px) 100vw, 300px" />
                                    @endif
                                </a>
                            </td>

                            <td class="product-name" data-title="Sản phẩm">
                                <a
                                    href="{{ route('home.chi_tiet_san_pham', $val['thongTinSanPham']->slug) }}">{{ $val['thongTinSanPham']->ten_san_pham }}</a>
                                <p class="show-for-small mobile-product-price">
                                    <span class="mobile-product-price__qty">2 x </span>
                                    <span
                                        class="woocommerce-Price-amount amount">{{ $val['thongTinSanPham']->gia_ban }}&nbsp;<span
                                            class="woocommerce-Price-currencySymbol">₫</span></span>
                                </p>
                            </td>

                            <td class="product-price" data-title="Giá">
                                <span
                                    class="woocommerce-Price-amount amount">{{ number_format($val['thongTinSanPham']->gia_ban) }}&nbsp;<span
                                        class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                            </td>

                            <td class="product-quantity" data-title="Số lượng">
                                <div class="quantity buttons_added">
                                    <input {{ $val['soLuong'] == 1 ? 'disabled' : '' }} type="button" value="-"
                                        class="minus button is-form quantity__minus"
                                        data-id-quantity="{{ $val['thongTinSanPham']->id }}" />
                                    <input readonly type="number" id="id-quantity"
                                        class="input-text qty text quantity_num" value={{ $val['soLuong'] }} />
                                    <input type="button" value="+" class="plus button is-form quantity__plus"
                                        data-id-quantity="{{ $val['thongTinSanPham']->id }}" />
                                </div>
                            </td>

                            <td class="product-subtotal" data-title="Tổng cộng" style="padding-right: 10px">
                                <span
                                    class="woocommerce-Price-amount amount">{{ number_format($val['tongCong']) }}&nbsp;<span
                                        class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <!-- Giỏ hàng trống -->
                    <tr class="woocommerce-cart-form__cart-item cart_item">
                        <td colspan="6" style="text-align: center">Không có gì trong giỏ hàng !</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script>
    //xóa sp khỏi giỏ hàng
    $(document).ready(function() {
        $(".action_delete").click(function(e) {
            let that = $(this);
            var id = $(this).data("id");
            $.ajax({
                url: '/xoa-san-pham-khoi-gio-hang/' + id,
                type: 'GET',
            }).done(function(res) {
                Render(res)
                that.parent().parent().remove();
                tangSanPham();
                giamSanPham();
                alertify.notify('Đã Xóa Sản Phẩm Thành Công!', 'success');
            });
        })
    })
</script>
