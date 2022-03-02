@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>ĐĂNG NHẬP | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="ĐĂNG NHẬP | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="ĐĂNG NHẬP | ĐỒ DÙNG NHÀ BẾP K.COOK" />
@endsection
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-6 col">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="account-container lightbox-inner">
                                <div class="account-login-inner">
                                    <h3 class="uppercase">Đăng nhập</h3>

                                    <form class="woocommerce-form woocommerce-form-login login" method="post"
                                        onsubmit="return checkForm(this);" id="form-dang-nhap" data-parsley-validate
                                        action="{{ route('home.post_dang_nhap') }}">
                                        @csrf
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Địa chỉ email <span
                                                    class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text" name="email"
                                                id="email" value="" type="email"
                                                data-parsley-type-message="Email không đúng định dạng"
                                                data-parsley-type="email" placeholder="Nhập email"
                                                data-parsley-required-message="Vui lòng nhập email" required required
                                                data-parsley-pattern="^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$"
                                                data-parsley-pattern-message="Email không đúng định dạng" />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Mật khẩu <span class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text"
                                                type="password" name="mat_khau" id="mat_khau" value=""
                                                placeholder="Nhập mật khẩu" data-parsley-minlength="6"
                                                data-parsley-maxlength="12"
                                                data-parsley-minlength-message="Vui lòng nhập mật khẩu tối thiểu 6 ký tự"
                                                data-parsley-maxlength-message="Vui lòng nhập mật khẩu tối đa 12 ký tự"
                                                data-parsley-required-message="Vui lòng nhập mật khẩu" required />
                                        </p>
                                        @if (session('status'))
                                            <ul>
                                                <li style="margin-left: 0" class="notification-message">
                                                    {{ session('status') }}</li>
                                            </ul>
                                        @endif
                                        <p class="form-row">
                                            <button type="submit" class="woocommerce-Button button" name="login"
                                                id="sign-in" value="Đăng nhập">Đăng nhập</button>
                                            <label
                                                class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                                    name="rememberme" type="checkbox" value="forever" />
                                                <span>Ghi nhớ mật khẩu</span>
                                            </label>
                                        </p>

                                        <p class="woocommerce-LostPassword lost_password">
                                            <a href="lost-password/index.html">Quên mật khẩu?</a>
                                        </p>
                                    </form>
                                </div>
                                <!-- .login-inner -->
                            </div>
                            <!-- .account-login-container -->
                        </div>
                    </div>
                    <!-- .col-inner -->
                </div>
                <div class="large-6 col">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="account-container lightbox-inner">
                                <div class="account-login-inner">
                                    <h3 class="uppercase">Đăng ký</h3>
                                    {{-- @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif --}}
                                    <form class="woocommerce-form woocommerce-form-login login" method="post"
                                        id="form-dang-ky" data-parsley-validate
                                        action="{{ route('home.dang_ky_nguoi_dung') }}">
                                        @csrf
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Địa chỉ email <span
                                                    class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text"
                                                name="email_dang_ky" id="email_dang_ky" value="" type="email"
                                                data-parsley-type-message="Email không đúng định dạng"
                                                data-parsley-type="email" placeholder="Nhập email"
                                                data-parsley-required-message="Vui lòng nhập email" required
                                                data-parsley-maxlength="255"
                                                data-parsley-maxlength-message="Vui lòng nhập email ít hơn 255 kí tự"
                                                required data-parsley-pattern="^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$"
                                                data-parsley-pattern-message="Email không đúng định dạng" />
                                        </p>


                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Họ <span class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                name="ho" id="ho" data-parsley-required-message="Vui lòng nhập họ"
                                                placeholder="Nhập họ" required value="" data-parsley-maxlength="10"
                                                data-parsley-maxlength-message="Vui lòng nhập họ ít hơn 10 kí tự" />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Tên <span class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                name="ten" id="ten" data-parsley-required-message="Vui lòng nhập tên"
                                                placeholder="Nhập tên" required value="" data-parsley-maxlength="50"
                                                data-parsley-maxlength-message="Vui lòng nhập tên ít hơn 50 kí tự" />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Số điện thoại <span
                                                    class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                name="so_dien_thoai" id="sdt" required placeholder="Nhập số điện thoại *"
                                                class="form-control" value=""
                                                data-parsley-pattern="/(0[3|5|7|8|9])+([0-9]{8})\b/"
                                                data-parsley-required-message="Vui lòng nhập số điện thoại"
                                                data-parsley-pattern-message="Số điện thoại không hợp lệ" />
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Địa chỉ <span class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="text"
                                                name="dia_chi" id="dia-chi" placeholder="Nhập địa chỉ"
                                                data-parsley-required-message="Vui lòng nhập địa chỉ" required value=""
                                                data-parsley-maxlength="255"
                                                data-parsley-maxlength-message="Vui lòng nhập địa chỉ ít hơn 255 kí tự" />
                                        </p>

                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Mật khẩu <span class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text" value=""
                                                type="password" name="mat_khau_dang_ky" id="mat_khau_dang_ky"
                                                placeholder="Nhập mật khẩu" data-parsley-minlength="6"
                                                data-parsley-maxlength="12"
                                                data-parsley-minlength-message="Vui lòng nhập mật khẩu tối thiểu 6 ký tự"
                                                data-parsley-maxlength-message="Vui lòng nhập mật khẩu tối đa 12 ký tự"
                                                data-parsley-required-message="Vui lòng nhập mật khẩu" required />
                                        </p>

                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Nhập lại mật khẩu <span
                                                    class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text" value=""
                                                type="password" name="mat_khau_dang_ky_nhap_lai"
                                                id="mat_khau_dang_ky_nhap_lai" placeholder="Nhập lại mật khẩu"
                                                data-parsley-minlength="6" data-parsley-maxlength="12"
                                                data-parsley-equalto="#mat_khau_dang_ky"
                                                data-parsley-equalto-message="Mật khẩu nhập lại không khớp"
                                                data-parsley-minlength-message="Vui lòng nhập mật khẩu tối thiểu 6 ký tự"
                                                data-parsley-maxlength-message="Vui lòng nhập mật khẩu tối đa 12 ký tự"
                                                data-parsley-required-message="Vui lòng lại nhập mật khẩu" required />
                                        </p>
                                        {{-- @if (session('status-sign-up'))
                                            <ul>
                                                <li class="notification-message-success"> {{ session('status-sign-up') }}
                                                </li>
                                            </ul>
                                        @endif --}}
                                        <p class="form-row">
                                            <button type="submit" class="woocommerce-Button button" name="sign-up"
                                                id="sign-up" value="Đăng ký">Đăng ký</button>
                                        </p>
                                    </form>
                                </div>
                                <!-- .login-inner -->
                            </div>
                            <!-- .account-login-container -->
                        </div>
                    </div>
                    <!-- .col-inner -->
                </div>
            </div>
            <!-- .row -->
        </div>
    </main>
    <!-- #main -->
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#form-dang-ky").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $(this).find('#sign-up').prop('disabled', true);
            if ($('#form-dang-ky').parsley().isValid()) {
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
                                $('#sign-up').prop('disabled', false);
                            }
                        }
                    }
                });
            } else {
                $('#sign-up').prop('disabled', false);
            }
        });
    </script>
    <script>
        $("#form-dang-nhap").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $(this).find('#sign-in').prop('disabled', true);
            if ($('#form-dang-nhap').parsley().isValid()) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data) {
                        {
                            if (data.status == 'success') {
                                window.location = data.url
                            }
                            if (data.status == 'error') {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                                $('#sign-in').prop('disabled', false);
                            }
                        }
                    }
                });
            } else {
                $('#sign-in').prop('disabled', false);
            }
        });
    </script>
@endsection
