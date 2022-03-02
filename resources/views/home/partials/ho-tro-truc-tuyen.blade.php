<aside id="text-7" class="widget widget_text">
    <div class="widget-title widget-title-sidebar ">
        <span>Hỗ trợ trực tuyến</span>
    </div>
    <div class="is-divider small"></div>
    <div class="textwidget">
        <p>
            <img class="alignnone size-full hinh-full wp-image-364" src="{{ asset('assets/images/support.png') }}"
                alt="" width="234" height="158" />
        </p>
        @php
            $cau_hinh = App\Models\CauHinh::first();
            $arrHotline = isset($cau_hinh->hotline) ? json_decode($cau_hinh->hotline) : [];
        @endphp
        @if (isset($cau_hinh->hotline))
            @foreach ($arrHotline as $stt => $val)
                <div class="div-truc-tuyen">
                    <p>Hỗ trợ trực tuyến {{ $stt + 1 }}</p>
                    <p><img class="alignnone size-full wp-image-363"
                            src="{{ asset('assets/images/phone-support_2.png') }}" alt="" width="21"
                            height="21" />{{ $val }}</p>
                </div>
            @endforeach
        @else
            <div class="div-truc-tuyen">
                <p>Chưa nhập số liên hệ !</p>
            </div>
        @endif
    </div>
</aside>
