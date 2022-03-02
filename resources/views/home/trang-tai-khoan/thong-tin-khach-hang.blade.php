<div>
    <div class="customer">
        @php
            $user = App\Models\KhachHang::where('id', Auth::user()->id)->first();
        @endphp
        {{-- {{ dd($user) }} --}}
        <div class="title">Thông tin khách hàng</div>
        <p>Mục có dấu <span class="t_red">*</span> là thông tin bắt buộc</p>
        <div class="form-group">
            <input name="name" type="text" placeholder="Họ và tên *" class="form-control"
                value="{{ !empty($user) && isset($user->ho) && isset($user->ten) ? $user->ho . ' ' . $user->ten : '' }}"
                required data-parsley-required-message="Vui lòng nhập họ tên" data-parsley-maxlength="50"
                data-parsley-maxlength-message="Vui lòng nhập họ tên ít hơn 50 kí tự" />
        </div>
        <div class="form-group">
            <input name="email" type="email" data-parsley-trigger="change" required placeholder="Địa chỉ E-mail *"
                class="form-control" value="{{ !empty($user) && isset($user->email) ? $user->email : '' }}"
                data-parsley-type-message="Email không đúng định dạng" data-parsley-type="email"
                data-parsley-required-message="Vui lòng nhập email" data-parsley-maxlength="255"
                data-parsley-maxlength-message="Vui lòng nhập email ít hơn 255 kí tự" required
                data-parsley-pattern="^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$"
                data-parsley-pattern-message="Email không đúng định dạng" />
        </div>
        <div class="form-group">
            <input name="phone" type="tel" data-parsley-trigger="change" required placeholder="Số điện thoại *"
                class="form-control"
                value="{{ !empty($user) && isset($user->so_dien_thoai) ? 0 . $user->so_dien_thoai : '' }}"
                data-parsley-pattern="/(0[3|5|7|8|9])+([0-9]{8})\b/"
                data-parsley-required-message="Vui lòng nhập số điện thoại"
                data-parsley-error-message="Số điện thoại không hợp lệ" />
        </div>
        <div class="form-group">
            <input name="address" type="text" data-parsley-trigger="change" required
                data-parsley-required-message="Vui lòng nhập địa chỉ nhập hàng" placeholder="Địa chỉ nhận hàng *"
                class="form-control" data-parsley-maxlength="255"
                data-parsley-maxlength-message="Vui lòng nhập địa chỉ ít hơn 255 kí tự"
                value="{{ !empty($user) && isset($user->dia_chi) ? $user->dia_chi : '' }}" />
        </div>
        <div class="form-group">
            <textarea name="order_comments" class="form-control" placeholder="Lời nhắn" rows="5"></textarea>
        </div>
    </div>
    {{-- <div class="shiping d-none" id="divShip" style="display: none;">
        <div class="title">Thông tin nhận hàng</div>
        <div class="form-group">
            <input name="shipping_first_name" class="form-control" type="text" placeholder="Họ và tên" />
        </div>
        <div class="form-group">
            <input name="shipping_email" class="form-control" type="text" placeholder="Địa chỉ email" />
        </div>
        <div class="form-group">
            <input name="shipping_phone" class="form-control" type="text" placeholder="Số điện thoại" />
        </div>
        <div class="form-group">
            <input name="shipping_address_1" class="form-control" type="text" placeholder="Địa chỉ" />
        </div>
    </div> --}}
</div>
