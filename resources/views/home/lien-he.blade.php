@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>LIÊN HỆ | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="LIÊN HỆ | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="LIÊN HỆ | ĐỒ DÙNG NHÀ BẾP K.COOK" />
@endsection
@section('content')
    <main id="main" class="">
        @php
            $cau_hinh = App\Models\CauHinh::first();
            $arrHotline = isset($cau_hinh->hotline) ? json_decode($cau_hinh->hotline) : [];
        @endphp
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
                    <form class="needs-validation" data-parsley-validate method="post"
                        action="{{ route('home.them_lien_he') }}" id="form-lien-he">
                        @csrf
                        <div class="title">
                            <h5>Liên hệ</h5>
                        </div>
                        <div class="row">
                            <div class="large-6 col pb-0">
                                <div class="form-group">
                                    <input name="ho_ten" type="text" placeholder="Họ và tên *" class="form-control"
                                        value="" required data-parsley-required-message="Vui lòng nhập họ tên"
                                        data-parsley-maxlength="100"
                                        data-parsley-maxlength-message="Vui lòng nhập họ tên ít hơn 100 kí tự" />
                                </div>
                            </div>

                            <div class="large-6 col pb-0">
                                <div class="form-group">
                                    <input name="so_dien_thoai" type="text" placeholder="Số điện thoại *"
                                        class="form-control" value="" data-parsley-pattern="/(0[3|5|7|8|9])+([0-9]{8})\b/"
                                        data-parsley-required-message="Vui lòng nhập số điện thoại"
                                        data-parsley-pattern-message="Số điện thoại không hợp lệ" required />
                                </div>
                            </div>
                            <div class="large-12 col pb-0">
                                <div class="form-group">
                                    <input name="email" type="email" placeholder="Địa chỉ email *" class="form-control"
                                        value="" required data-parsley-required-message="Vui lòng nhập email"
                                        data-parsley-type-message="Email không đúng định dạng" data-parsley-type="email"
                                        required data-parsley-pattern="^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$"
                                        data-parsley-pattern-message="Email không đúng định dạng" />
                                </div>
                            </div>
                            <div class="large-12 col pb-0">
                                <div class="form-group">
                                    <textarea name="noi_dung" class="form-control" placeholder="Lời nhắn"
                                        rows="5"></textarea>
                                </div>
                            </div>
                            <div class="large-12 col pb-0 div-contact-btn">
                                <button id="btn-lien-he" type="submit" class="woocommerce-Button button">Gửi yêu cầu</button>
                            </div>
                        </div>
                    </form>
                    <div class="title">
                        @if (isset($cau_hinh->source))
                            <h5 class="info-contact info-contact-title">
                                {{ isset($cau_hinh->ten_cong_ty) ? $cau_hinh->ten_cong_ty : 'Chưa nhập tên công ty' }}
                            </h5>
                            <span class="info-contact">Số điện thoại:
                                @if ($cau_hinh->so_dien_thoai)
                                    <a class="tel-contact"
                                        href="tel:{{ '0' . $cau_hinh->so_dien_thoai }}">{{ '0' . $cau_hinh->so_dien_thoai }}</a>
                                @else
                                    <a>Chưa nhập số điện thoại</a>
                                @endif
                            </span><br>
                            <span class="info-contact">Email:
                                @if ($cau_hinh->email)
                                    <a class="mail-contact info-contact-email"
                                        href="mailto:{{ $cau_hinh->email }}">{{ $cau_hinh->email }}</a>
                                @else
                                    <a>Chưa nhập email</a>
                                @endif
                            </span><br>
                            <span class="info-contact">Địa chỉ:
                                @if ($cau_hinh->tru_so_chinh)
                                    <a class="tel-contact">{{ $cau_hinh->tru_so_chinh }}</a>
                                @else
                                    <a>Chưa nhập địa chỉ</a>
                                @endif

                            </span><br>
                            <iframe src="{{ $cau_hinh->source }}" width="100%" height="450"
                                style="border:0; margin-top : 10px;" allowfullscreen="" loading="lazy"></iframe>
                        @else
                            <h5>Chưa cấu hình </h5>
                        @endif
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
    <script type='text/javascript' src='{{ asset('assets/plugins/mega_main_menu/src/js/frontend-ver=2.1.5.js') }}'>
    </script>
    <script type='text/javascript' src='{{ asset('assets/js/hoverIntent.min-ver=1.8.1.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/flatsome-ver=3.5.2.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/woocommerce-ver=3.5.2.js') }}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#form-lien-he").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $(this).find('#btn-lien-he').prop('disabled', true);
            if ($('#form-lien-he').parsley().isValid()) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data) {
                        {
                            if (data.status == 'success') {
                                Swal.fire({
                                    text: data.message,
                                    icon: 'success',
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                }).then((result) => {
                                    if (result.isDismissed) {
                                        window.location.reload();
                                    }
                                })

                            }
                            if (data.status == 'error') {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                                $('#btn-lien-he').prop('disabled', false);
                            }
                        }
                    }
                });
            } else {
                $('#btn-lien-he').prop('disabled', false);
            }
        });
    </script>
@endsection
