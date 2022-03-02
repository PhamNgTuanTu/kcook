@extends('admin.master')
@section('title')
    <title>Kcook - Bài viết</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="{{ route('admin.them_bai_viet') }}" class="btn btn-primary mb-2" type="button">Thêm mới <i
                        class="fas fa-plus"></i></a>
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
                                <form class="mb-0" action="{{ route('admin.ds_bai_viet') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="search" 
                                                id="tieu_de" 
                                                name="tieu_de" 
                                                class="form-control"
                                                placeholder="Nhập tiêu đề ..."
                                                value="{{ isset($inputSearch['tieu_de']) ? $inputSearch['tieu_de'] : null }}"
                                                aria-controls="zero-config">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="selectpicker form-control show-tick select-filter"
                                                    name="loai_bai_viet" title="Loại bài viết">
                                                    <option value="all" @if (isset($inputSearch['loai_bai_viet'])) {{ $inputSearch['loai_bai_viet'] == 'all' ? 'selected' : '' }} @endif>Tất cả</option>
                                                    <option value="1" @if (isset($inputSearch['loai_bai_viet'])) {{ $inputSearch['loai_bai_viet'] == '1' ? 'selected' : '' }} @endif>Tin tức</option>
                                                    <option value="2" @if (isset($inputSearch['loai_bai_viet'])) {{ $inputSearch['loai_bai_viet'] == '2' ? 'selected' : '' }} @endif>Tuyển dụng</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex align-items-center justify-content-end">
                                        <div>
                                            <a class="btn btn-info button-custom"
                                                href="{{ route('admin.ds_bai_viet') }}">Làm
                                                mới</a>
                                            <button class="btn btn-primary button-custom" type="submit">Tìm
                                                kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="zero-config_length"><label>Số items hiển thị : <select
                                            name="zero-config_length" aria-controls="zero-config" class="form-control">
                                            <option value="7">7</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                        </select></label></div>
                            </div>
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                                <!-- <div id="zero-config_filter" class="dataTables_filter">
                                                                                    <div id="select_menu" class="form-group mb-4">
                                                                                        <select class="custom-select" name="loai_bai_viet"
                                                                                            data-parsley-required-message="Filter" style="padding-right: 30px;">
                                                                                                <option value="0" selected>Filter All</option>
                                                                                                <option value="ngay_bat_dau" >Tiêu đề</option>
                                                                                                <option value="ngay_ket_thuc" >Loại bài vi</option>
                                                                                                <option value="trang_thai" >Trạng thái hóa đơn</option>
                                                                                                <option value="ten_khach" >Tên khách hàng</option>
                                                                                                <option value="sdt" >Số điện thoại</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div> -->
                                <!-- <div id="zero-config_filter" class="dataTables_filter">
                                                                                <label>
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                                                        <circle cx="11" cy="11" r="8"></circle>
                                                                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                                                    </svg>
                                                                                    <input type="search" class="form-control" placeholder="Nhập từ khóa..." aria-controls="zero-config" style="width: 100%;font-size: unset;">
                                                                                </label>
                                                                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="zero-config" class="table dt-table-hover dataTable no-footer" style="width:100%"
                            role="grid" aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    <th>Tiêu đề</th>
                                    <th>Loại bài viết</th>
                                    <th>Ngày đăng</th>
                                    <th class="no-content"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($ds_bai_viet) > 0)
                                    @foreach ($ds_bai_viet as $stt => $val)
                                        <tr>
                                            <td>{{ $val->tieu_de }}</td>
                                            <td>{{ $val->loai_bai_viet == 1 ? 'Tin tức' : 'Tuyển dụng' }}</td>
                                            <td>
                                                <time datetime="{{ isset($val->created_at) ? $val->created_at : '' }}">
                                                    {{ isset($val->created_at) ? $val->created_at : '' }}
                                                </time>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.sua_bai_viet', ['id' => $val->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 table-cancel action_change"
                                                        data-toggle="modal" data-id="{{ $val->id }}">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.xoa_bai_viet', ['id' => $val->id]) }}">
                                                    <svg data-id="{{ $val->id }}" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-x-circle table-cancel action_delete">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                                    </svg>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Không tồn tại dữ liệu</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                        <div class="dt--pages-count  mb-sm-0 mb-3">
                            <div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Hiển thị
                                trang {{ $ds_bai_viet->currentPage() }} / {{ $ds_bai_viet->lastPage() }}</div>
                        </div>
                        <div class="dt--pagination">
                            <div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous @if ($ds_bai_viet->currentPage() == 1) disabled @endif"
                                        id="zero-config_previous">
                                        <a href="{{ $ds_bai_viet->previousPageUrl() }}" aria-controls="zero-config"
                                            data-dt-idx="0" tabindex="0" class="page-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-arrow-left">
                                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                                <polyline points="12 19 5 12 12 5"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $ds_bai_viet->lastPage(); $i++)
                                        <li class="paginate_button page-item @if ($i == $ds_bai_viet->currentPage()) active @endif"><a
                                                href="{{ $ds_bai_viet->url($i) }}" aria-controls="zero-config"
                                                data-dt-idx="1" tabindex="0" class="page-link">
                                                {{ $i }}</a></li>

                                    @endfor
                                    <!-- <li class="paginate_button page-item active"><a href="#" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link">{{ $ds_bai_viet->currentPage() }}</a></li> -->
                                    <li class="paginate_button page-item next @if ($ds_bai_viet->currentPage() == $ds_bai_viet->lastPage()) disabled @endif"
                                        id="zero-config_next">
                                        <a href="{{ $ds_bai_viet->nextPageUrl() }}" aria-controls="zero-config"
                                            data-dt-idx="2" tabindex="0" class="page-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function($) {
            $('time').each(function(i, e) {
                var time = moment($(e).attr('datetime'));
                $(e).html('<span>' + moment(time, "YYYY-DD-MM h:mm:ss a").format("HH:mm DD/MM/YYYY") +
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
                    $('#them_san_pham').on('hidden.bs.modal', function() {
                        $('#them_san_pham form')[0].reset();
                        form.classList.remove('was-validated');
                    });
                    $('#sua_the_loai').on('hidden.bs.modal', function() {
                        $('#sua_the_loai form')[0].reset();
                        form.classList.remove('was-validated');
                    });
                }, false);
            });
        }, false);
    </script>
    @if (session('status'))
        <script type="text/javascript">
            swal.fire({
                title: "{{ session('status') }}",
                type: 'success',
                padding: '2em',
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            swal.fire({
                title: "{{ session('error') }}",
                type: 'error',
                padding: '2em',
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
    <script>
        $(".action_delete").click(function(e) {
            var id = $(this).data("id");
            let that = $(this);
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc muốn xóa bài viết ?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Xóa'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "xoa-bai-viet/" + id,
                        type: 'delete',
                    }).done(function(res) {
                        if (res.status == 'success') {
                            that.parent().parent().remove();
                            let stt = document.getElementsByClassName('stt');
                            for (i = 0; i < stt.length; i++) {
                                stt[i].innerHTML = i + 1;
                            }
                            swal.fire({
                                title: res.message,
                                type: 'success',
                                showCancelButton: false,
                                showConfirmButton: false,
                                position: 'center',
                                padding: '2em',
                                timer: 1500,
                            })
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        } else {
                            Swal.fire({
                                title: res.message,
                                type: 'error',
                                showCancelButton: false,
                                showConfirmButton: false,
                                position: 'center',
                                padding: '2em',
                                timer: 1500,
                            })
                        }
                    });

                }
            })
        });

        $("#filter").change(function() {
            if ($(this).val() == 'ngay_dang') {
                $('#search_date').removeAttr('hidden');
                $('#search_value').prop("hidden", !this.checked);
            } else {
                $('#search_value').removeAttr('hidden');
                $('#search_date').prop("hidden", !this.checked);
            }
        })
    </script>
@endsection
