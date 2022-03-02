@extends('admin.master')
@section('title')
    <title>Kcook - Chi tiết hóa đơn</title>
@endsection
@section('css')
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('admin/assets/css/apps/invoice-preview.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@section('content')
<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
        <div class="doc-container">
        <a href="{{ route('admin.hoa_don') }}"class="btn btn-info mb-2" type="button" style="position: relative;">Quay lại 
                <i class="fas fa-arrow-left" aria-hidden="true" style="
            position: absolute;
            line-height: 24px;
            top:50%;
            margin-top: -12px;
            left: 4%;"></i></a>

            <div class="row">

                <div class="col-xl-9">

                    <div class="invoice-container">
                        <div class="invoice-inbox">
                            
                            <div id="ct" class="">
                                <div class="invoice-00001">
                                    <div class="content-section">
                                    
                                        <div class="inv--head-section inv--detail-section">
                                        
                                            <div class="row">
                                            
                                                <div class="col-sm-6 col-12 mr-auto">
                                                    <div class="d-flex">
                                                        <p class="inv-list-number"><span class="inv-title">Mã hóa đơn : </span> <span class="inv-number">{{isset($ct_hoa_don)?$ct_hoa_don->id:''}}</span></p>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 text-sm-right">
                                                    <p class="inv-list-number"><span class="inv-title">Trạng thái hóa đơn : </span>{!!isset($ct_hoa_don)?$ct_hoa_don->format_trang_thai:''!!}</p>
                                                </div>

                                                <div class="col-sm-6 align-self-center mt-3">
                                                    <p class="inv-created-date"><span class="inv-title">Ngày đặt hàng : </span> <span class="inv-date">{{isset($ct_hoa_don)?$ct_hoa_don->ngay_tao:''}}</span></p>
                                                    <!-- <p class="inv-due-date"><span class="inv-title">Phương thức thanh toán : </span> <span class="inv-date">{{isset($ct_hoa_don)?$ct_hoa_don->format_ngay:''}}</span></p> -->
                                                    <p class="inv-due-date"><span class="inv-title">Ngày thanh toán : </span> <span class="inv-date">{{isset($ct_hoa_don)?($ct_hoa_don->tinh_trang_thanh_toan == 0 ?'':  $ct_hoa_don->format_ngay):''}}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Ngày giao hàng : </span> <span class="inv-date">{{isset($ct_hoa_don)? $ct_hoa_don->format_ngay_giao : ''}}</span></p>
                                                </div>
                                                <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                    <p class="inv-created-date"><span class="inv-title">Phương thức thanh toán : </span> <span class="inv-date">{{$ct_hoa_don->phuong_thuc_thanh_toan == 0 ? 'COD' : 'Chuyển khoản'}}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Trạng thái : </span> <span class="inv-date">{{$ct_hoa_don->tinh_trang_thanh_toan == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'}}</span></p>
                                                </div>
                                            
                                            </div>
                                            
                                        </div>

                                        <div class="inv--detail-section inv--customer-detail-section">

                                            <div class="row">

                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                    <p class="inv-to">Thông tin khách hàng</p>
                                                </div>

                                                <!-- <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 inv--payment-info">
                                                    <h6 class=" inv-to">Thông tin thanh toán:</h6>
                                                </div> -->
                                                
                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                    <p><span class=" inv-street-addr">Họ Tên:</span> <span>{{isset($ct_hoa_don)?(empty($ct_hoa_don->khach_hang_id)?$ct_hoa_don->ten:$ct_hoa_don->ho_ten):''}}</span></p>
                                                    <p><span class=" inv-street-addr">Địa chỉ: </span> <span>{{isset($ct_hoa_don)?(empty($ct_hoa_don->khach_hang_id)?$ct_hoa_don->dia_chi:$ct_hoa_don->khachHang->dia_chi):''}}</span></p>
                                                    <p><span class=" inv-email-address">Số điện thoại:</span> <span>{{isset($ct_hoa_don)?(empty($ct_hoa_don->khach_hang_id)?$ct_hoa_don->sdt:$ct_hoa_don->khachHang->so_dien_thoai):''}}</span></p>
                                                    <p><span class=" inv-email-address">Email: </span> <span>{{isset($ct_hoa_don)?(empty($ct_hoa_don->khach_hang_id)?$ct_hoa_don->email:$ct_hoa_don->khachHang->email):''}}</span></p>
                                                    <p><span class=" inv-email-address">Ghi chú: </span> <span>{{isset($ct_hoa_don)?$ct_hoa_don->ghi_chu:''}}</span></p>
                                                </div>
                                                
                                                <!-- <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">
                                                    <div>
                                                        <p><span class=" inv-street-addr">Tổng tiền:</span> <span>Bank of America</span></p>
                                                        <p><span class=" inv-street-addr">Khuyến mãi: </span> <span>1234567890</span></p>
                                                        <p><span class=" inv-street-addr">Thành tiền:</span> <span>VS70134</span></p>
                                                        <p><span class=" inv-street-addr">Số lượng: </span> <span>United States</span></p>
                                                    </div>
                                                </div> -->

                                            </div>
                                            
                                        </div>

                                        <div class="inv--product-table-section">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="">
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Sản phẩm</th>
                                                            <th class="text-right" scope="col">Số lượng</th>
                                                            <th class="text-right" scope="col">Giá (VND)</th>
                                                            <th class="text-right" scope="col">Tổng tiền (VND)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($ct_hoa_don->ctHoaDon as $stt => $val)
                                                        <tr>
                                                            <td>{{$stt+1}}</td>
                                                            <td>{{$val->sanPham->ten_san_pham}}</td>
                                                            <td class="text-right">{{$val->so_luong}}</td>
                                                            <td class="text-right">{{$val->sanPham->format_gia_ban}}</td>
                                                            <td class="text-right">{{number_format($val->tong_tien)}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="inv--total-amounts">
                                        
                                            <div class="row mt-4">
                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                </div>
                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                    <div class="text-sm-right">
                                                        <div class="row">
                                                            <!-- <div class="col-sm-8 col-7">
                                                                <p class="">Số lượng: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">{{isset($ct_hoa_don)?$ct_hoa_don->so_luong:''}}</p>
                                                            </div> -->
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Tổng tiền: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">{{isset($ct_hoa_don)?number_format($ct_hoa_don->tong_tien):''}}</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Khuyến mãi: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">{{isset($ct_hoa_don)?number_format($ct_hoa_don->khuyen_mai):''}}</p>
                                                            </div>
                                                            <!-- <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                            </div> -->
                                                            <!-- <div class="col-sm-4 col-5">
                                                                <p class="">$10</p>
                                                            </div> -->
                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                <h4 class="">Thành tiền : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                <h4 class="">{{isset($ct_hoa_don)?$ct_hoa_don->format_tien:''}}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="inv--note">

                                            <div class="row mt-4">
                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div> 
                                
                            </div>


                        </div>

                    </div>

                </div>

                <div class="col-xl-3">

                    <div class="invoice-actions-btn">

                        <div class="invoice-action-btn">

                            <div class="row">
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-send btn-primary {{$ct_hoa_don->trang_thai > 1 ? 'disabled': ''}} btn-thay-doi-trang-thai" data-id='{{$ct_hoa_don->id}}' data-value="2">Duyệt đơn hàng</a>
                                </div>
                                @if($ct_hoa_don->phuong_thuc_thanh_toan == 1)
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-send btn-primary btn-thanh-toan {{$ct_hoa_don->trang_thai > 2 || $ct_hoa_don->trang_thai == 1 || $ct_hoa_don->tinh_trang_thanh_toan == 1 ? 'disabled': ''}}" data-id='{{$ct_hoa_don->id}}' data-value="1">Xác nhận thanh toán</a>
                                </div>
                                @endif
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-warning btn-download {{$ct_hoa_don->trang_thai >= 3 || $ct_hoa_don->trang_thai == 1 || ($ct_hoa_don->phuong_thuc_thanh_toan == 1 && $ct_hoa_don->tinh_trang_thanh_toan == 0) ? 'disabled': ''}} btn-thay-doi-trang-thai" data-id='{{$ct_hoa_don->id}}' data-value="3">Giao hàng</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-success btn-print {{$ct_hoa_don->trang_thai >= 4 || $ct_hoa_don->trang_thai < 3 || ($ct_hoa_don->phuong_thuc_thanh_toan == 1 && $ct_hoa_don->tinh_trang_thanh_toan == 0) ?  'disabled': ''}} btn-thay-doi-trang-thai" data-id='{{$ct_hoa_don->id}}' data-value="4">Hoàn thành</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="apps_invoice-edit.html" class="btn btn-danger btn-edit {{$ct_hoa_don->trang_thai == 5 ||$ct_hoa_don->trang_thai == 4 ? 'disabled': ''}} btn-thay-doi-trang-thai" data-id='{{$ct_hoa_don->id}}' data-value="5">Hủy đơn hàng</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>


            </div>
            
            
        </div>

    </div>
</div>
@endsection
@section('page-js')
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('admin/assets/js/apps/invoice-preview.js') }}"></script>
    @if(session('status'))
        <script type="text/javascript">
            swal.fire({
                title: "{{session('status')}}",
                type: 'success',
                position: 'center',
                padding: '2em',
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
    @if(session('error'))
        <script type="text/javascript">
            swal.fire({
                title: "{{session('error')}}",
                type: 'error',
                position: 'center',
                padding: '2em',
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
    <script>
        $(".btn-thay-doi-trang-thai").click(function(e) {
            var id = $(this).data("id");
            var value = $(this).data("value");
            console.log(id);
            e.preventDefault();
            Swal.fire({
                title: 'Thay đổi trạng thái đơn hàng ?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Thay đổi'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/quan-tri/thay-doi-trang-thai/"+id,
                        type: 'post',
                        data: "trang_thai="+ value,
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
                            setTimeout(function(){
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
    <script>
        $(".btn-thanh-toan").click(function(e) {
            var id = $(this).data("id");
            var value = $(this).data("value");
            console.log(id);
            e.preventDefault();
            Swal.fire({
                title: 'Xác nhận đã thanh toán ?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Xác nhận'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/quan-tri/thay-doi-thanh-toan/"+id,
                        type: 'post',
                        data: "trang_thai="+ value,
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
                            setTimeout(function(){
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
