<div class="hien-thi-thong-tin"
    style="position: fixed; bottom: 0; width: 100%; z-index: 9999999999; background:  #7FC142;text-align: center;">
    <div class="row">
        @php
            $cau_hinh = App\Models\CauHinh::first();
        @endphp
        <div class="large-4 hide-for-small" style="padding:7px">
            <p style="color:white;margin-bottom: 0px;font-weight: normal">
                <a href="{{ route('home.home') }}" style="color:white" target="_blank">
                    <i class="fa fa-home" aria-hidden="true"></i> Đồ dùng nhà bếp KCOOK</a>
            </p>
        </div>
        <div class="large-4 small-12" style="padding:7px;border-left: 1px solid white;border-right: 1px solid white">
            <a href=" {{ isset($cau_hinh->so_dien_thoai) ? "tel: 0$cau_hinh->so_dien_thoai" : '/' }}">
                <p style="color:white;margin-bottom: 0px;font-weight: normal">
                    <i class="fa fa-phone" aria-hidden="true"></i> Hotline:
                    {{ isset($cau_hinh->so_dien_thoai) ? '0' . $cau_hinh->so_dien_thoai : 'Chưa nhập số điện thoại liên hệ' }}
                </p>
            </a>
        </div>
        <div class="large-4 hide-for-small" style="padding:7px">
            <a href="{{ route('home.lien_he') }}" target="_blank">
                <p style="color:white;margin-bottom: 0px;font-weight: normal">
                    <i class="fa fa-sun-o" aria-hidden="true"></i> Đăng ký làm đối tác
                </p>
            </a>
        </div>
    </div>
</div>
