@extends('admin.master')
@section('title')
    <title>Kcook - Hóa đơn</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="card component-card_8 mb-2">
                    <div class="card-body">
                        <div class="progress-order ">
                            <div class="progress-order-header">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <h6>Tìm kiếm</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="progress-order-body ">
                                <form id="form-tim-kiem" data-parsley-validate class="mb-0"
                                    action="{{ route('admin.hoa_don') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="search" id="ten_khach_hang" name="ten_khach_hang"
                                                class="form-control" placeholder="Nhập tên khách hàng ..."
                                                value="{{ isset($inputSearch['ten_khach_hang']) ? $inputSearch['ten_khach_hang'] : null }}"
                                                aria-controls="zero-config">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="search" id="sdt" name="sdt" class="form-control"
                                                placeholder="Nhập số điện thoại ..."
                                                value="{{ isset($inputSearch['sdt']) ? $inputSearch['sdt'] : null }}"
                                                aria-controls="zero-config">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="selectpicker form-control show-tick select-filter"
                                                    name="phuong_thuc_thanh_toan" title="Phương thức thanh toán">
                                                    <option value="all" @if (isset($inputSearch['phuong_thuc_thanh_toan'])) {{ $inputSearch['phuong_thuc_thanh_toan'] == 'all' ? 'selected' : '' }} @endif>Tất cả</option>
                                                    <option value="0" @if (isset($inputSearch['phuong_thuc_thanh_toan'])) {{ $inputSearch['phuong_thuc_thanh_toan'] == '0' ? 'selected' : '' }} @endif>COD</option>
                                                    <option value="1" @if (isset($inputSearch['phuong_thuc_thanh_toan'])) {{ $inputSearch['phuong_thuc_thanh_toan'] == '1' ? 'selected' : '' }} @endif>Chuyển khoản</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="selectpicker form-control show-tick select-filter"
                                                    name="trang_thai" title="Tùy chọn trạng thái">
                                                    <option value="all" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == 'all' ? 'selected' : '' }} @endif>Tất cả</option>
                                                    <option value="1" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == '1' ? 'selected' : '' }} @endif>Mới tạo</option>
                                                    <option value="2" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == '2' ? 'selected' : '' }} @endif>Đã duyệt</option>
                                                    <option value="3" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == '3' ? 'selected' : '' }} @endif>Đang giao</option>
                                                    <option value="4" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == '4' ? 'selected' : '' }} @endif>Hoàn thành</option>
                                                    <option value="5" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == '5' ? 'selected' : '' }} @endif>Đã hủy</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="flatpickr wrap-calendar" id="ngay_bat_dau_calendar">
                                                <input type="text" id="ngay_bat_dau" class="form-control flatpickr-input"
                                                    placeholder="Ngày tạo từ" data-input
                                                    data-parsley-required-message="Vui lòng chọn ngày tạo từ"
                                                    value="{{ isset($inputSearch['ngay_bat_dau']) ? $inputSearch['ngay_bat_dau'] : null }}"
                                                    name="ngay_bat_dau">
                                                <i class="fa fa-calendar icon-calendar" data-toggle></i>
                                                <ul class="parsley-errors-list filled" id="parsley-date-bat-dau">
                                                    <li class="parsley-required">Vui lòng chọn ngày tạo từ nhỏ hơn ngày tạo
                                                        đến
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="flatpickr wrap-calendar" id="ngay_ket_thuc_calendar">
                                                <input type="text" class="form-control flatpickr-input" data-input
                                                    id="ngay_ket_thuc"
                                                    data-parsley-required-message="Vui lòng chọn ngày tạo đến"
                                                    value="{{ isset($inputSearch['ngay_ket_thuc']) ? $inputSearch['ngay_ket_thuc'] : null }}"
                                                    name="ngay_ket_thuc" placeholder="Ngày tạo đến">
                                                <i class="fa fa-calendar icon-calendar" data-toggle></i>
                                                <ul class="parsley-errors-list filled" id="parsley-date-ket-thuc">
                                                    <li class="parsley-required">Vui lòng chọn ngày tạo đến nhỏ hơn ngày tạo
                                                        từ
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex align-items-center justify-content-end">
                                        <div>
                                            <a class="btn btn-info button-custom" href="{{ route('admin.hoa_don') }}">Làm
                                                mới</a>
                                            <button id="btnSubmit" class="btn btn-primary button-custom" type="submit">Tìm
                                                kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table id="zero-config" class="table dt-table-hover dataTable no-footer" style="width:100%"
                            role="grid" aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    <th>Mã HD</th>
                                    <th>Khách hàng</th>
                                    <th>SDT</th>
                                    <th>Thành Tiền (VND)</th>
                                    <th>PTTT</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th class="no-content"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($ds_hoa_don) > 0)
                                    @foreach ($ds_hoa_don as $stt => $val)
                                        <tr>
                                            <td>{{ $val->id }}</td>
                                            <td>{{ $val->ten }}</td>
                                            <td>{{ $val->sdt }}</td>
                                            <td class="text-left">{{ $val->format_tien }}</td>
                                            <td class="text-left">
                                                {{ $val->phuong_thuc_thanh_toan == 0 ? 'COD' : 'Chuyển khoản' }}</td>
                                            <td>{!! $val->str_trang_thai !!}</td>
                                            <td>
                                                <time datetime="{{ isset($val->created_at) ? $val->created_at : '' }}">
                                                    {{-- {{ isset($val->created_at) ? $val->created_at : '' }} --}}
                                                </time>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.ct_hoa_don', ['id' => $val->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 table-cancel action_change"
                                                        data-toggle="modal" data-id="{{ $val->id }}">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">Không tồn tại dữ liệu</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src={{ asset('admin/assets/plugins/table/datatable/datatables.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
        integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function($) {
            $('time').each(function(i, e) {
                var time = moment($(e).attr('datetime'));
                $(e).html('<span>' + moment(time, "YYYY-DD-MM HH:mm:ss").format("HH:mm DD/MM/YYYY") +
                    '</span>');
            });

        });
    </script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Hiển thị trang _PAGE_ / _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Nhập từ khóa...",
                "sLengthMenu": "Số items hiển thị :  _MENU_",
                "sEmptyTable": "Không tồn tại dữ liệu",
                "sInfoEmpty": "Hiển thị trang 0/0",
                "sZeroRecords": "Không tồn tại dữ liệu",
                "sInfoFiltered": "",
            },
            "order": [
                [2, "desc"]
            ],
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 25
        });
    </script>
    <script>
        const compareDate = (datetime1, datetime2, format) => {
            var message = 1
            // 1 = "=", 2 = "<" , 3 = ">"
            var date1 = moment(datetime1, format).date()
            var month1 = moment(datetime1, format).month()
            var year1 = moment(datetime1, format).year()
            var date2 = moment(datetime2, format).date()
            var month2 = moment(datetime2, format).month()
            var year2 = moment(datetime2, format).year()
            var newDate1 = moment(new Date(year1, month1, date1)).format('YYYY-MM-DD')
            var newDate2 = moment(new Date(year2, month2, date2)).format('YYYY-MM-DD')
            newDate1 < newDate2 ? message = 3 : (newDate1 > newDate2 ? message = 2 : message = 1)
            return message
        }

        $('#ngay_bat_dau').on('change input keyup', function(e) {
            if (this.value) {
                $('#ngay_ket_thuc').prop('required', true).parsley().validate();
                const val = document.getElementById('ngay_ket_thuc').value;
                if (val) {
                    var type = compareDate(e.target.value, val, "DD/MM/YYYY");
                    if (type === 2) {
                        var element = document.getElementById("ngay_bat_dau");
                        element.classList.add("error-date");
                        $('#btnSubmit').prop('disabled', true);
                    } else {
                        var element = document.getElementById("ngay_bat_dau");
                        element.classList.remove("error-date");
                        $('#btnSubmit').prop('disabled', false);
                    }
                }
            } else {
                $('#ngay_ket_thuc').prop('required', false).parsley().validate();
            }
        });
        $('#ngay_ket_thuc').on('change input keyup', function(e) {
            if (this.value) {
                $('#ngay_bat_dau').prop('required', true).parsley().validate();
                const val = document.getElementById('ngay_bat_dau').value;
                if (val) {
                    var type = compareDate(e.target.value, val, "DD/MM/YYYY");
                    if (type === 3) {
                        var element = document.getElementById("ngay_ket_thuc");
                        element.classList.add("error-date");
                        $('#btnSubmit').prop('disabled', true);
                    } else {
                        var element = document.getElementById("ngay_ket_thuc");
                        element.classList.remove("error-date");
                        $('#btnSubmit').prop('disabled', false);
                    }
                }
            } else {
                $('#ngay_bat_dau').prop('required', false).parsley().validate();
            }
        });
    </script>
    <script>
        $("#ngay_bat_dau_calendar").flatpickr({
            enableTime: false,
            dateFormat: "d/m/Y",
            wrap: true,
            // maxDate: "today",
            locale: {
                weekdays: {
                    shorthand: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
                    longhand: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
                },
                months: {
                    shorthand: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                        'Tháng 8', 'Tháng 9',
                        'Tháng 10', 'Tháng 11', 'Tháng 12'
                    ],
                    longhand: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                        'Tháng 8', 'Tháng 9',
                        'Tháng 10', 'Tháng 11', 'Tháng 12'
                    ],
                },
            },
        });
        $("#ngay_ket_thuc_calendar").flatpickr({
            enableTime: false,
            dateFormat: "d/m/Y",
            wrap: true,
            // maxDate: "today",
            locale: {
                weekdays: {
                    shorthand: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
                    longhand: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
                },
                months: {
                    shorthand: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                        'Tháng 8', 'Tháng 9',
                        'Tháng 10', 'Tháng 11', 'Tháng 12'
                    ],
                    longhand: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                        'Tháng 8', 'Tháng 9',
                        'Tháng 10', 'Tháng 11', 'Tháng 12'
                    ],
                },
            },
        });
    </script>
    <script>
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                    //reset form when close modal
                }, false);
            });
        }, false);
    </script>
    @if (session('status'))
        <script type="text/javascript">
            swal.fire({
                title: "{{ session('status') }}",
                type: 'success',
                showCancelButton: false,
                showConfirmButton: false,
                position: 'center',
                padding: '2em',
                timer: 1500,
            })
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            swal.fire({
                title: "{{ session('error') }}",
                type: 'error',
                showCancelButton: false,
                showConfirmButton: false,
                position: 'center',
                padding: '2em',
                timer: 1500,
            })
        </script>
    @endif

@endsection
