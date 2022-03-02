<div>
    <div class="payWay">
        <div class="title">Hình thức thanh toán</div>
        @php
            $cau_hinh = App\Models\CauHinh::first();
        @endphp
        <div class="PaymentMethod">
            <div class="PaymentMethod_Name">
                <label for="payment_method_cod" class="payment_method">
                    <input type="radio" checked name="hinh_Thuc_thanh_toan" value="{{ 0 }}"
                        id="payment_method_cod" />
                    Trả tiền khi nhận hàng (COD)</label>
            </div>
            <div class="PaymentMethod_Info" id="cod" style="display: none;">
                <p>Quý khách sẽ thanh toán tiền cho nhân viên giao hàng.</p>
            </div>
        </div>

        <div class="PaymentMethod">
            <div class="PaymentMethod_Name">
                <label for="payment_method_bacs" class="payment_method">
                    <input type="radio" name="hinh_Thuc_thanh_toan" value="{{ 1 }}"
                        id="payment_method_bacs" />
                    Chuyển khoản ngân hàng</label>
            </div>
            <div class="PaymentMethod_Info" id="bacs" style="">
                @if (isset($cau_hinh->ten_ngan_hang))
                    <p>
                        Tài khoản Ngân hàng {{ $cau_hinh->ten_ngan_hang }}<br />
                        – Số tài khoản:
                        {{ isset($cau_hinh->so_tai_khoan) ? $cau_hinh->so_tai_khoan : 'Chưa nhập số tài khoản' }}<br />
                        – Chủ tài khoản:
                        {{ isset($cau_hinh->ten_chu_the) ? $cau_hinh->ten_chu_the : 'Chưa nhập tên chủ tài khoản' }}
                    </p>
                @else
                    <p>
                        Chưa nhập thông tin !
                    </p>
                @endif

            </div>
        </div>
    </div>
    <div class="cart-info t_right mt30">
        <div class="cartInfo-price">
            <span>Tổng thanh toán:</span>
            <span class="bold t_red totalPay">
                <span class="woocommerce-Price-amount amount">
                    @php
                        $cart = App\Models\CartUser::where('khach_hang_id', Auth::user()->id)->get();
                    @endphp
                    @if (!empty($cart) && count($cart) > 0)
                        <?php
                        $value = 0;
                        foreach ($cart as $val) {
                            $value += $val->tong_tien;
                        }
                        echo '<bdi>' . number_format($value) . '&nbsp;<span class="woocommerce-Price-currencySymbol">VNĐ</span></bdi>';
                        echo '<input type="text" value="' . $value . '" name="tong_thanh_tien" style="display: none" />';
                        ?>
                    @else
                        <bdi>0<span class="woocommerce-Price-currencySymbol">₫</span></bdi>
                    @endif

                </span>
            </span>
        </div>
        <p class="t_red italic">Giá chưa bao gồm VAT 10% và phí vận chuyển</p>
        {{-- <input type="hidden" id="total_amount" name="total_amount" value="1380000" /> --}}
        <div class="btnCart">
            <button type="submit" {{ !empty($cart) && count($cart) > 0 ? '' : 'disabled' }}
                class="woocommerce-Button button custom-btn btn-hoan-tat w-100" id="btnMuaHang" form="form-dat-hang">
                <i class="fa fa-check" aria-hidden="true"></i> Hoàn tất đơn hàng </button>

            <a class="woocommerce-Button button custom-btn w-100" href="/">← Tiếp
                tục mua hàng</a>
        </div>
    </div>
</div>
