@extends('admin.master')
@section('title')
    <title>Kcook - Loại sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/dt-global_style.css') }}">
@section('content')
    <div class="row layout-top-spacing hidden-search" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#them_the_loai">Thêm mới <i
                        class="fas fa-plus"></i></button>
                {{-- <div class="card component-card_8 mb-2">
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
                                <form class="mb-0" action="{{ route('admin.loai_san_pham') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="search" id="ten_loai" name="ten_loai" class="form-control"
                                                placeholder="Nhập tên loại ..."
                                                value="{{ isset($inputSearch['ten_loai']) ? $inputSearch['ten_loai'] : null }}"
                                                aria-controls="zero-config">
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex align-items-center justify-content-end">
                                        <div>
                                            <a class="btn btn-info button-custom"
                                                href="{{ route('admin.loai_san_pham') }}">làm mới</a>
                                            <button class="btn btn-primary button-custom" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> --}}
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr role="row">
                            <th>Tên danh mục</th>
                            <th class="no-content"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $stt => $val)
                            <tr>
                                <td>{{ $val->ten_loai }}</td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit-2 table-cancel action_change"
                                        data-toggle="modal" data-target="#sua_the_loai" data-id="{{ $val->id }}"
                                        data-value="{{ $val->ten_loai }}" onclick="detailLSP(this)"
                                        @if ($val->parent_id) data-parent="{{ $val->parent_id }}" @endif>
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                    <svg data-id="{{ $val->id }}" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-x-circle table-cancel action_delete"
                                        onclick="deleteLSP(this)">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                    </svg>
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
    @include('admin.loai-san-pham.them-loai-san-pham')
    @include('admin.loai-san-pham.sua-loai-san-pham')
@endsection
@section('page-js')
    <script src={{ asset('admin/assets/plugins/table/datatable/datatables.js') }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
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
        $(document).ready(function() {
            $('#them_the_loai').on('hidden.bs.modal', function() {
                $('#them-the-loai').parsley().reset();
                $('#them-the-loai')[0].reset();
            });
            $('#sua_the_loai').on('hidden.bs.modal', function() {
                $('#sua-the-loai').parsley().reset();
                $('#sua-the-loai')[0].reset();
            });
        })
    </script>
    <script>
        //thêm
        $(document).ready(function() {
            $("them-the-loai").parsley();
            var submitForm = false;
            $("#them-the-loai").on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var url = form.attr('action');

                form.parsley().validate();

                // If the form is valid
                if (form.parsley().isValid()) {
                    submitForm = true;
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        success: function(data) {
                            if (data.status == 'success') {
                                // $('#them_the_loai').modal('hide');
                                setTimeout(function() {
                                    window.location.replace(
                                        "{{ url('/quan-tri/loai-san-pham') }}");
                                }, 100);

                                swal.fire({
                                    title: data.message,
                                    type: 'success',
                                    position: 'center',
                                    padding: '2em',
                                    showConfirmButton: false,
                                    timer: 1500,
                                })

                            }
                            if (data.status == 'error') {
                                Swal.fire({
                                    position: 'center',
                                    type: 'error',
                                    title: data.message,
                                    padding: '2em',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    });
                } else {
                    submitForm = false;
                }
            });
        });
    </script>
    <script>
        //add value form
        function detailLSP(e) {
            e = $(e);
            var id = $(e).data("id");
            var value = $(e).data("value");
            var parent = $(e).data("parent");
            $("#parent-sua-loai-sp").val(0)

            if (typeof parent !== 'undefined')
                $("#parent-sua-loai-sp").val(parent).change();
            $('#sua-ten-loai-sp').val(value);
            $('#id-sua-loai-sp').val(id);

            e.preventDefault();
        };

        // $(".action_change").click(function(e) {
        //     var id = $(this).data("id");
        //     var value = $(this).data("value");
        //     var parent = $(this).data("parent");
        //     $("#parent-sua-loai-sp").val(0)

        //     if (typeof parent !== 'undefined')
        //         $("#parent-sua-loai-sp").val(parent).change();
        //     $('#sua-ten-loai-sp').val(value);
        //     $('#id-sua-loai-sp').val(id);

        //     e.preventDefault();
        // });
        //sửa
        $(document).ready(function(e) {
            $("sua-the-loai").parsley();
            var submitForm = false;
            $("#sua-the-loai").on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var url = form.attr('action');

                form.parsley().validate();

                // If the form is valid
                if (form.parsley().isValid()) {
                    submitForm = true;
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        success: function(data) {
                            if (data.status == 'success') {
                                $('#sua_the_loai').modal('hide');
                                Swal.fire({
                                    position: 'center',
                                    type: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1000
                                })
                                window.setTimeout(function() {
                                    window.location.reload();
                                }, 500);
                            }
                            if (data.status == 'error') {
                                Swal.fire({
                                    position: 'center',
                                    type: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    });
                } else {
                    submitForm = false;
                }
            });
        });
    </script>
    <script>
        //xóa
        function deleteLSP(e) {
            var id = $(e).data("id");
            let that = $(e);
            console.log(id);
            Swal.fire({
                title: 'Bạn có chắc muốn xóa danh mục này ?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#fff',
                confirmButtonColor: '#4361ee',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Xóa'
            }).then((result) => {
                console.log(result.value);
                if (result.value) {
                    console.log(123);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "xoa-loai-san-pham/" + id,
                        type: 'delete',
                    }).done(function(res) {
                        if (res.status == 'success') {
                            that.parent().parent().remove();
                            let stt = document.getElementsByClassName('stt');
                            for (i = 0; i < stt.length; i++) {
                                stt[i].innerHTML = i + 1;
                            }
                            window.setTimeout(function() {
                                window.location.reload();
                            }, 1000);

                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1000
                            })

                        } else {
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });

                }
            })
        }

        // $(".action_delete").click(function(e) {
        //     var id = $(this).data("id");
        //     let that = $(this);
        //     // console.log(id);
        //     e.preventDefault();
        //     Swal.fire({
        //         title: 'Bạn có chắc muốn xóa danh mục này ?',
        //         type: 'warning',
        //         showCancelButton: true,
        //         cancelButtonColor: '#fff',
        //         confirmButtonColor: '#4361ee',
        //         cancelButtonText: 'Hủy',
        //         confirmButtonText: 'Xóa'
        //     }).then((result) => {
        //         console.log(result.value);
        //         if (result.value) {
        //             console.log(123);
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });
        //             $.ajax({
        //                 url: "xoa-loai-san-pham/" + id,
        //                 type: 'delete',
        //             }).done(function(res) {
        //                 if (res.status == 'success') {
        //                     that.parent().parent().remove();
        //                     let stt = document.getElementsByClassName('stt');
        //                     for (i = 0; i < stt.length; i++) {
        //                         stt[i].innerHTML = i + 1;
        //                     }
        //                     Swal.fire({
        //                         position: 'center',
        //                         type: 'success',
        //                         title: res.message,
        //                         showConfirmButton: false,
        //                         timer: 1500
        //                     })

        //                 } else {
        //                     Swal.fire({
        //                         position: 'center',
        //                         type: 'error',
        //                         title: res.message,
        //                         showConfirmButton: false,
        //                         timer: 1500
        //                     })
        //                 }
        //             });

        //         }
        //     })
        // });
    </script>
    @if (session('status'))
        <script type="text/javascript">
            swal.fire({
                title: "{{ session('status') }}",
                type: 'success',
                padding: '2em'
            })
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            swal.fire({
                title: "{{ session('error') }}",
                type: 'error',
                padding: '2em'
            })
        </script>
    @endif
@endsection
