@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>CHI TIẾT HOÁ ĐƠN | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="CHI TIẾT HOÁ ĐƠN | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="CHI TIẾT HOÁ ĐƠN | ĐỒ DÙNG NHÀ BẾP K.COOK" />
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
                    <div class="row">
                        {{-- <div class="col small-12 large-4">
                            <div class="col-inner">
                                <h4>Chi tiết đơn hàng</h4>
                                @include('home.partials.tai-khoan-menu')
                            </div>
                        </div> --}}
                        <div class="col small-12 large-12">
                            <div class="row">
                                <div class="col small-12 large-12">
                                    <div class="col-inner">
                                        <h4>Thông tin đơn hàng</h4>
                                    </div>
                                </div>
                                <div class="col small-12 large-12">
                                    <div class="col-inner">
                                        <div class="table-responsive">
                                            <table class="table table-hover item-table">
                                                <thead>
                                                    <tr>
                                                        <th>Mã hóa đơn</th>
                                                        <th>Trạng thái HĐ</th>
                                                        <th>Ngày đặt</th>
                                                        <th>HT thanh toán</th>
                                                        <th>Trạng thái TT</th>
                                                        <th>Tổng tiền</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ isset($ct_hoa_don) ? $ct_hoa_don->id : '' }}</td>
                                                        <td>{!! isset($ct_hoa_don) ? $ct_hoa_don->str_trang_thai : '' !!}</td>
                                                        <td>
                                                            <time
                                                                datetime="{{ isset($ct_hoa_don->created_at) ? $ct_hoa_don->created_at : '' }}">
                                                                {{ isset($ct_hoa_don->created_at) ? $ct_hoa_don->created_at : '' }}
                                                            </time>
                                                        </td>
                                                        <td>{{ $ct_hoa_don->phuong_thuc_thanh_toan == 0 ? 'COD' : 'Chuyển khoản' }}
                                                        </td>
                                                        <td>{{ $ct_hoa_don->tinh_trang_thanh_toan == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}
                                                        </td>
                                                        <td>{{ isset($ct_hoa_don) ? number_format($ct_hoa_don->tong_tien) : '' }}&nbsp;VNĐ
                                                        </td>
                                                        <td><button data-id='{{ $ct_hoa_don->id }}' data-value="5"
                                                                {{ $ct_hoa_don->trang_thai === 1 ? '' : 'disabled' }}
                                                                class="woocommerce-Button button mb-2 btn-cancel-order btn-huy-don">Hủy
                                                                đơn hàng</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col small-12 large-12">
                                    <div class="col-inner">
                                        <h4>Thông tin khách nhận hàng</h4>
                                    </div>
                                </div>
                                <div class="col small-12 large-12">
                                    <div class="col-inner">
                                        <div class="table-responsive">
                                            <table class="table table-hover item-table">
                                                <thead>
                                                    <tr>
                                                        <th>Họ Tên</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Email</th>
                                                        <th>Ghi chú</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            {{ isset($ct_hoa_don) ? $ct_hoa_don->ten : '' }}
                                                        </td>
                                                        <td>{{ isset($ct_hoa_don) ? $ct_hoa_don->dia_chi : '' }}
                                                        </td>
                                                        <td>{{ isset($ct_hoa_don) ? $ct_hoa_don->sdt : '' }}
                                                        </td>
                                                        <td>{{ isset($ct_hoa_don) ? $ct_hoa_don->email : '' }}
                                                        </td>
                                                        <td>{{ isset($ct_hoa_don) ? $ct_hoa_don->ghi_chu : '' }}
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col small-12 large-12">
                                    <div class="col-inner">
                                        <h4>Chi tiết hóa đơn</h4>
                                    </div>
                                </div>
                                <div class="col small-12 large-12">
                                    <div class="col-inner">
                                        <div class="table-responsive">
                                            <table class="table table-hover item-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Sản phẩm</th>
                                                        <th class="text-right" scope="col">Số lượng</th>
                                                        <th class="text-right" scope="col">Giá (VND)</th>
                                                        <th class="text-right" scope="col">Tổng tiền (VND)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ct_hoa_don->ctHoaDon as $stt => $val)
                                                        <tr>
                                                            <td>{{ $stt + 1 }}</td>
                                                            <td>{{ $val->sanPham->ten_san_pham }}</td>
                                                            <td class="text-right">{{ $val->so_luong }}</td>
                                                            <td class="text-right">
                                                                {{ number_format($val->sanPham->gia_ban) }}&nbsp;VNĐ</td>
                                                            <td class="text-right">
                                                                {{ number_format($val->tong_tien) }}&nbsp;VNĐ</td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- <tr>
                                                        <td colspan="3">Số lượng:</td>
                                                        <td colspan="2" class="text-right">
                                                            {{ isset($ct_hoa_don) ? $ct_hoa_don->so_luong : '' }}</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td colspan="3">Tổng tiền:</td>
                                                        <td colspan="2" class="text-right">
                                                            {{ isset($ct_hoa_don) ? number_format($ct_hoa_don->tong_tien) : '' }}&nbsp;VNĐ
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">Khuyến mãi:</td>
                                                        <td colspan="2" class="text-right">
                                                            {{ isset($ct_hoa_don) ? number_format($ct_hoa_don->khuyen_mai) : '' }}&nbsp;VNĐ
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">Thành tiền:</td>
                                                        <td colspan="2" class="text-right">
                                                            <h4 class="">
                                                                {{ isset($ct_hoa_don) ? number_format($ct_hoa_don->thanh_tien) : '' }}&nbsp;VNĐ
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div><!-- .row -->
        </div><!-- .page-wrapper .blog-wrapper -->
    </main><!-- #main -->
    {{-- @include('home.trang-tai-khoan.chi-tiet-hoa-don') --}}
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
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
        integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function($) {

            var now = moment();

            $('time').each(function(i, e) {
                var time = moment($(e).attr('datetime'));

                if (now.diff(time, 'days') <= 1) {
                    $(e).html('<span>' + moment(time, "YYYY-DD-MM h:mm:ss a").format("HH:mm DD/MM/YYYY") +
                        '</span>');
                }
            });

        });
    </script>
    <script>
        $(".btn-huy-don").click(function(e) {
            var id = $(this).data("id");
            var value = $(this).data("value");
            e.preventDefault();
            Swal.fire({
                title: 'Xác nhận hủy đơn hàng ?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.value) {
                    var urlBase = '@if(isset($isNotTaiKhoan)) /khach-hang-vang-lai/ @else /khach-hang/  @endif';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: urlBase + "don-hang-" + id + "/huy-don-hang",
                        type: 'post',
                        data: "trang_thai=" + value,
                    }).done(function(res) {
                        if (res.status == 'success') {
                            swal.fire({
                                title: res.message,
                                type: 'success',
                                position: 'center',
                                padding: '2em',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        } else {
                            Swal.fire({
                                title: res.message,
                                type: 'error',
                                position: 'center',
                                padding: '2em',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                        }
                    });

                }
            })
        });
    </script>
@endsection
