<nav class="woocommerce-MyAccount-navigation">
    <ul>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
            <a class="link_account"
                href="{{ URL::to('/khach-hang/' . Auth::user()->slug . '-' . Auth::user()->id . '/xem-don-hang') }}">Đơn
                hàng</a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
            <a class="link_account" href="{{ URL::to('/khach-hang/' . Auth::user()->slug . '-' . Auth::user()->id . '/thong-tin-tai-khoan') }}">Thông tin cá
                nhân</a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
            <a class="link_account" href="{{ route('nguoi-dung.dang_xuat') }}">Thoát</a>
        </li>
    </ul>
</nav>
