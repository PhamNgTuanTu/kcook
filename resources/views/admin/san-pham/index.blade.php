@extends('admin.master')
@section('title')
    <title>Kcook - Sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="{{ route('admin.view_them_san_pham') }}" class="btn btn-primary mb-2" type="button">Thêm mới <i
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
                                <form class="mb-0" action="{{ route('admin.san_pham') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="search" id="ten_san_pham" name="ten_san_pham"
                                                class="form-control" placeholder="Nhập tên sản phẩm ..."
                                                value="{{ isset($inputSearch['ten_san_pham']) ? $inputSearch['ten_san_pham'] : null }}"
                                                aria-controls="zero-config">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="search" id="ma_san_pham" name="ma_san_pham" class="form-control"
                                                placeholder="Nhập mã sản phẩm ..."
                                                value="{{ isset($inputSearch['ma_san_pham']) ? $inputSearch['ma_san_pham'] : null }}"
                                                aria-controls="zero-config">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="selectpicker form-control show-tick select-filter"
                                                    name="loai_san_pham" data-live-search="true"
                                                    title="Tùy chọn loại sản phẩm">
                                                    @if (isset($htmlOptionSearch))
                                                        <option value="all" @if (isset($inputSearch['loai_san_pham'])) {{ $inputSearch['loai_san_pham'] == 'all' ? 'selected' : '' }} @endif>Tất cả</option>
                                                        {!! $htmlOptionSearch !!}
                                                    @else
                                                        @foreach ($dataOption as $item)
                                                            <option value="all" @if (isset($inputSearch['loai_san_pham'])) {{ $inputSearch['loai_san_pham'] == 'all' ? 'selected' : '' }} @endif>Tất cả</option>
                                                            <option value="{{ $item->id }}"
                                                                {{ old('loai_san_pham') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->ten_loai }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="selectpicker form-control show-tick select-filter"
                                                    name="trang_thai" title="Tùy chọn trạng thái">
                                                    <option value="all" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == 'all' ? 'selected' : '' }} @endif>Tất cả</option>
                                                    <option value="1" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == '1' ? 'selected' : '' }} @endif>Còn hàng</option>
                                                    <option value="2" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == '2' ? 'selected' : '' }} @endif>Hết hàng</option>
                                                    <option value="3" @if (isset($inputSearch['trang_thai'])) {{ $inputSearch['trang_thai'] == '3' ? 'selected' : '' }} @endif>Ngưng bán</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex align-items-center justify-content-end">
                                        <div>
                                            <a class="btn btn-info button-custom"
                                                href="{{ route('admin.san_pham') }}">Làm mới</a>
                                            <button class="btn btn-primary button-custom" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th>#</th> --}}
                            <th>Mã</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá gốc</th>
                            <th>Giá bán</th>
                            <th>Trạng thái</th>
                            <th class="no-content"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $stt => $val)
                            <tr>
                                {{-- <td scope="row" class="stt">{{ $stt + 1 }}</td> --}}
                                <td>{{ $val->ma_san_pham }}</td>
                                <td>{{ $val->ten_san_pham }}</td>
                                <td>{{ $val->loai_sp->ten_loai }}</td>
                                <td>{{ $val->so_luong }}</td>
                                <td>{{ $val->format_gia_goc }}</td>
                                <td>{{ $val->format_gia_ban }}</td>
                                @if ($val->trang_thai == 1)
                                    <td><span class="badge badge-success inv-status" style="width: 100%;">Còn hàng</span>
                                    </td>
                                @elseif($val->trang_thai == 2)
                                    <td><span class="badge badge-warning inv-status" style="width: 100%;">Hết hàng</span>
                                    </td>
                                @else
                                    <td><span class="badge badge-danger inv-status" style="width: 100%;">Ngưng bán</span>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ route('admin.view_sua_san_pham', ['id' => $val->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-edit-2 table-cancel action_change" data-toggle="modal"
                                            data-id="{{ $val->id }}">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.xoa_san_pham', ['id' => $val->id]) }}">
                                        <svg data-id="{{ $val->id }}" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x-circle table-cancel action_delete">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@section('modal')
    @include('admin.san-pham.them-san-pham')
    @include('admin.san-pham.sua-san-pham')
@endsection
@section('page-js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src={{ asset('admin/assets/plugins/table/datatable/datatables.js') }}></script>
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
                showCancelButton: false,
                showConfirmButton: false,
                timer: 1500,
                padding: '2em'
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
                timer: 1500,
                padding: '2em'
            })
        </script>
    @endif
    <script>
        $(".action_delete").click(function(e) {
            var id = $(this).data("id");
            let that = $(this);
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc muốn xóa sản phẩm này ?',
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
                        url: "xoa-san-pham/" + id,
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
                                timer: 3000,
                                position: 'center',
                                padding: '2em'
                            })
                            location.reload();
                        } else {
                            Swal.fire({
                                title: res.message,
                                type: 'error',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 3000,
                                position: 'center',
                                padding: '2em'
                            })
                        }
                    });

                }
            })
        });
    </script>
@endsection
