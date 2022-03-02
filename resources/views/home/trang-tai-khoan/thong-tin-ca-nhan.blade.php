@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>THÔNG TIN CÁ NHÂN| ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="THÔNG TIN CÁ NHÂN | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="THÔNG TIN CÁ NHÂN | ĐỒ DÙNG NHÀ BẾP K.COOK" />
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
                    <div class="row" id="row-28013216">
                        <div class="col small-12 large-3">
                            <div class="col-inner">
                                <h4>Tài khoản</h4>
                                @include('home.partials.tai-khoan-menu')
                            </div>
                        </div>
                        <div class="col small-12 large-9">
                            <div class="col-inner">
                                <div class="customer">
                                    <h5>Thông tin khách hàng</h5>
                                    <form data-parsley-validate method="post" id="form-thong-tin-khach-hang"
                                        action="{{ URL::to('/khach-hang/' . $data->slug . '-' . $data->id . '/cap-nhat-thong-tin-tai-khoan') }}">
                                        {{-- action="{{ route('nguoi-dung.post_thong_tin_ca_nhan', $data->id) }}"> --}}
                                        @csrf
                                        <div class="form-group">
                                            <input name="ho" type="text" placeholder="Họ *" class="form-control"
                                                value="{{ isset($data->ho) ? $data->ho : '' }}" required
                                                data-parsley-required-message="Vui lòng nhập họ người dùng"
                                                data-parsley-maxlength="10"
                                                data-parsley-maxlength-message="Vui lòng nhập họ ít hơn 10 kí tự" />
                                        </div>
                                        <div class="form-group">
                                            <input name="ten" type="text" placeholder="Tên *" class="form-control"
                                                value="{{ isset($data->ten) ? $data->ten : '' }}" required
                                                data-parsley-required-message="Vui lòng nhập tên người dùng"
                                                data-parsley-maxlength="50"
                                                data-parsley-maxlength-message="Vui lòng nhập tên ít hơn 50 kí tự" />
                                        </div>
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="Địa chỉ E-mail *"
                                                class="form-control input-disable" readonly
                                                value="{{ isset($data->email) ? $data->email : '' }}" required
                                                data-parsley-required-message="Vui lòng nhập email"
                                                data-parsley-type-message="vui lòng nhập định dạng email"
                                                data-parsley-type="email" />
                                        </div>
                                        <div class="form-group">
                                            <input name="so_dien_thoai" type="text" placeholder="Số điện thoại *"
                                                class="form-control"
                                                value="{{ isset($data->so_dien_thoai) ? 0 . $data->so_dien_thoai : '' }}"
                                                data-parsley-pattern="/(0[3|5|7|8|9])+([0-9]{8})\b/"
                                                data-parsley-required-message="Vui lòng nhập số điện thoại"
                                                data-parsley-pattern-message="Số điện thoại không hợp lệ" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="dia_chi" placeholder="Địa chỉ *" class="form-control"
                                                value="{{ isset($data->dia_chi) ? $data->dia_chi : '' }}" required
                                                data-parsley-required-message="Vui lòng nhập địa chỉ"
                                                data-parsley-maxlength="255"
                                                data-parsley-maxlength-message="Vui lòng nhập tên ít hơn 255 kí tự" />
                                        </div>
                                        <div class="form-group">
                                            <input name="mat_khau" id="mat_khau" type="password"
                                                placeholder="Mật khẩu hiện tại" class="form-control" value=""
                                                data-parsley-minlength="6" data-parsley-maxlength="12"
                                                data-parsley-minlength-message="Vui lòng nhập mật khẩu tối thiểu 6 ký tự"
                                                data-parsley-maxlength-message="Vui lòng nhập mật khẩu tối đa 12 ký tự"
                                                data-parsley-required-message="Vui lòng nhập mật khẩu hiện tại" />
                                        </div>
                                        <div class="form-group">
                                            <input name="mat_khau_moi" type="password" placeholder="Mật khẩu mới"
                                                class="form-control" value="" id="mat_khau_moi" data-parsley-minlength="6"
                                                data-parsley-maxlength="12"
                                                data-parsley-minlength-message="Vui lòng nhập mật khẩu tối thiểu 6 ký tự"
                                                data-parsley-maxlength-message="Vui lòng nhập mật khẩu tối đa 12 ký tự"
                                                data-parsley-required-message="Vui lòng nhập mật khẩu mới" />
                                        </div>
                                        <div class="form-group">
                                            <input name="mat_khau_moi_confirm" type="password" id="mat_khau_moi_confirm"
                                                placeholder="Nhập lại mật khẩu mới" class="form-control" value=""
                                                data-parsley-equalto="#mat_khau_moi" data-parsley-minlength="6"
                                                data-parsley-maxlength="12"
                                                data-parsley-minlength-message="Vui lòng nhập mật khẩu tối thiểu 6 ký tự"
                                                data-parsley-maxlength-message="Vui lòng nhập mật khẩu tối đa 12 ký tự"
                                                data-parsley-required-message="Vui lòng nhập lại mật khẩu mới"
                                                data-parsley-equalto-message="Mật khẩu nhập lại không khớp" />
                                        </div>
                                        <div class="form-group div-btn-change-info">
                                            <button type="submit" class="button-continue-shopping button danger is-outline"
                                                id="btnThayDoiThongTin">
                                                Lưu thay đổi </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#mat_khau').on('change input keyup', function() {
            if (this.value) {
                $('#mat_khau_moi').prop('required', true).parsley().validate();
                $('#mat_khau_moi_confirm').prop('required', true).parsley().validate();
            } else {
                $('#mat_khau_moi').prop('required', false).parsley().validate();
                $('#mat_khau_moi_confirm').prop('required', false).parsley().validate();
            }
        });
    </script>
    <script>
        $("#form-thong-tin-khach-hang").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $(this).find('#btnThayDoiThongTin').prop('disabled', true);
            if ($('#form-thong-tin-khach-hang').parsley().isValid()) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data) {
                        {
                            if (data.status == 'success') {
                                swal.fire({
                                    title: data.message,
                                    type: 'success',
                                    position: 'center',
                                    padding: '2em',
                                    showConfirmButton: false,
                                    timer: 1500,
                                })
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1500);
                            }
                            if (data.status == 'error') {
                                Swal.fire({
                                    position: 'center',
                                    type: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                                $('#btnThayDoiThongTin').prop('disabled', false);
                            }
                        }
                    }
                });
            } else {
                $('#btnThayDoiThongTin').prop('disabled', false);
            }
        });
    </script>
@endsection
