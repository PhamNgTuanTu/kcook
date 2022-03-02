@extends(config('template.homeTemplateBladeURL').'master')
@section('title')
    <title>ĐƠN HÀNG | ĐỒ DÙNG NHÀ BẾP K.COOK</title>
@endsection
@section('seo-meta')
    <meta name="title" content="ĐƠN HÀNG | ĐỒ DÙNG NHÀ BẾP K.COOK" />
    <meta property="og:title" content="ĐƠN HÀNG | ĐỒ DÙNG NHÀ BẾP K.COOK" />
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
                        <div class="col small-12 large-12">
                            <div class="col-inner">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã hóa đơn</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                                <th>Trạng Thái</th>
                                                <th>Ngày Đặt</th>
                                                <th colspan="2"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $post)
                                                <tr>
                                                    <td>#{{ $post->id }}</td>
                                                    <td>{{ number_format($post->thanh_tien) }}&nbsp;VNĐ</td>
                                                    <td>{{ number_format($post->tong_tien) }}&nbsp;VNĐ</td>
                                                    <td>{!! $post->str_trang_thai !!}</td>
                                                    <td>
                                                        <time datetime="{{ $post->created_at }}">
                                                            {{ $post->created_at }}
                                                        </time>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group-order">
                                                            <a href="{{ URL::to('/khach-hang/' . 'don-hang-' . $post->id . '/xem-chi-tiet') }}"
                                                                class="woocommerce-Button button mb-2 btn-detail"
                                                                data-id="{{ $post->id }}">Chi tiết</a>
                                                            <button data-id='{{ $post->id }}' data-value="5"
                                                                {{ $post->trang_thai === 1 ? '' : 'disabled' }}
                                                                class="woocommerce-Button button mb-2 btn-cancel-order btn-huy-don">Hủy
                                                                đơn hàng</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">Không có dữ liệu...</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- .large-9 -->
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
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/khach-hang/" + "don-hang-" + id + "/huy-don-hang",
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
