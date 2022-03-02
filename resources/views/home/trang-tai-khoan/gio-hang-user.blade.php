@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>GIỎ HÀNG | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="GIỎ HÀNG | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="GIỎ HÀNG | ĐỒ DÙNG NHÀ BẾP K.COOK" />
@endsection
@section('content')
    <main id="main" class="page-cart">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main row-thanh-toan">
                <div class="large-12">
                    <div class="col-inner">
                        <div class="woocommerce">
                            <div class="row-thanh-toan cart-in-mobile" id="render-cart-empty">
                                <form id="form-dat-hang" data-parsley-validate method="post" class="w-100"
                                    action="{{ URL::to('/khach-hang/' . Auth::user()->slug . '-' . Auth::user()->id . '/thanh-toan') }}">
                                    @csrf
                                    <div class="row-cart-item">
                                        <div id="render-cart" class="col large-6 pb-0">
                                            @include('home.trang-tai-khoan.gio-hang')
                                        </div>
                                        <div class="col large-3" id="render-cart-info">
                                            @include('home.trang-tai-khoan.thong-tin-khach-hang')
                                        </div>
                                        <div class="col large-3" id="render-cart-pay">
                                            @include('home.trang-tai-khoan.hinh-thuc-thanh-toan')
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="cart-footer-content after-cart-content relative"></div>
                        </div>
                    </div>
                    <!-- .col-inner -->
                </div>
                <!-- .large-12 -->
            </div>
            <!-- .row -->
        </div>
    </main>
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
    <script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bootstrap/js/popper.min.js') }}"></script>
    <script type='text/javascript' src='{{ asset('assets/plugins/mega_main_menu/src/js/frontend-ver=2.1.5.js') }}'>
    </script>
    <script type='text/javascript' src='{{ asset('assets/js/hoverIntent.min-ver=1.8.1.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/flatsome-ver=3.5.2.js') }}'></script>
    <script type='text/javascript' src='{{ asset('assets/flatsome/assets/js/woocommerce-ver=3.5.2.js') }}'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"
        integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css"
        integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //update số lượng
        function updateItemListCart(id, so_luong) {
            $.ajax({
                url: '/khach-hang/' + Number(id) + '/' + Number(so_luong) + '/cap-nhat-gio-hang',
                type: 'GET',
            }).done(function(res) {
                Render(res)
                tangSanPham();
                giamSanPham();
            });
        }

        //reder html 
        function Render(res) {
            //giỏ hàng header
            $('#change-item-cart').empty();
            $('#change-item-cart').html(res['gio-hang']);
            //bảng giỏ hàng
            $('#render-cart').empty();
            $('#render-cart').html(res['display_gio_hang']);
            //button thanh toán và số tiền phải trả
            $('#render-cart-pay').empty();
            $('#render-cart-pay').html(res['hinh-thuc-thanh-toan']);
        }

        // tăng sp
        tangSanPham();
        let valueCount;

        function tangSanPham() {
            let btnPlus = document.getElementsByClassName('quantity__plus');
            for (let i = 0; i < btnPlus.length; i++) {
                btnPlus[i].addEventListener('click', function() {
                    // Lấy giá trị input
                    valueCount = document.getElementsByClassName('quantity_num')[i];
                    // Tăng giá trị lên 1
                    valueCount.value++;
                    updateItemListCart($(this).data('id-quantity'), valueCount.value);
                    if (valueCount.value > 1) {
                        document.getElementsByClassName("quantity__minus")[i].removeAttribute("disabled");
                        document.getElementsByClassName("quantity__minus")[i].classList.remove("disabled");
                    }
                });
            }
        }

        //giảm sp
        giamSanPham();

        function giamSanPham() {
            let btnMinus = document.getElementsByClassName('quantity__minus');
            for (let i = 0; i < btnMinus.length; i++) {
                btnMinus[i].addEventListener('click', function() {
                    // Lấy giá trị input
                    valueCount = document.getElementsByClassName('quantity_num')[i];

                    // Giảm giá trị lên 1
                    valueCount.value--;
                    updateItemListCart($(this).data('id-quantity'), valueCount.value);
                    if (valueCount.value == 1) {
                        document.getElementsByClassName("quantity__minus")[i].setAttribute("disabled", "disabled");
                    }
                });
            }
        }
    </script>
    <script>
        $("#form-dat-hang").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');

            Parsley.on('form:submit', function() {
                //return true; // Don't submit form for this demo
                Swal.fire({
                    title: 'Xác nhận đặt hàng ?',
                    icon: 'info',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#0d6efd',
                    cancelButtonText: 'Hủy',
                    confirmButtonText: 'Đồng ý'
                }).then((result) => {
                    if (result.isConfirmed) {
                        submitForm = true;
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
                                                window.location = '/khach-hang/don-hang-' + data.id + '/xem-chi-tiet'
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
                                    }
                                }
                            }
                        });

                    }
                })
            });

        });
    </script>
@endsection
