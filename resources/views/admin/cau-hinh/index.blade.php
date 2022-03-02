@extends('admin.master')
@section('title')
    <title>Kcook - Cấu hình website</title>
@endsection
@section('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('admin/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('admin/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/assets/plugins/file-upload/file-upload-with-preview.min.css') }}" />
    <style>
        .anh-bai-viet {
            position: relative;
            box-sizing: border-box;
            transition: all 0.2s ease;
            border-radius: 6px;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            float: left;
            margin: 1.858736%;
            width: 29.615861214%;
            height: 90px;
            box-shadow: 0 4px 10px 0 rgb(51 51 51 / 25%);
        }

    </style>
@section('content')
    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <form id="form-submit" method="post" action="{{ route('admin.edit_cau_hinh') }}" class="w-100"
                        enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">
                                <div class="info">
                                    <h6 class="">Cấu hình website</h6>
                                    <div class="row">
                                        <div class="col-lg-12 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" class="dropify logo"
                                                            name="logo"
                                                            data-default-file="{{ isset($cau_hinh) ? $cau_hinh->logo : asset('admin/assets/img/200x200.jpg') }}"
                                                            data-max-file-size="2M" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            Upload Logo</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-4">
                                                    <div class="form" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control mb-4 email"
                                                                        name="email" id="email" placeholder="email"
                                                                        data-parsley-maxlength="255"
                                                                        data-parsley-maxlength-message="Vui lòng nhập email ít hơn 255 kí tự"
                                                                        data-parsley-pattern="^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$"
                                                                        data-parsley-pattern-message="Email không đúng định dạng"
                                                                        value="{{ isset($cau_hinh) ? $cau_hinh->email : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input" for="sdt">Số điện
                                                                    thoại</label>
                                                                <input type="text" class="form-control mb-4"
                                                                    name="so_dien_thoai" id="sdt"
                                                                    placeholder="số điện thoại"
                                                                    data-parsley-pattern="/(0[3|5|7|8|9])+([0-9]{8})\b/"
                                                                    data-parsley-pattern-message="Số điện thoại không hợp lệ"
                                                                    value="{{ isset($cau_hinh) ? '0' . $cau_hinh->so_dien_thoai : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-4">
                                                                <label>Meta title</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Meta title" data-parsley-maxlength="255"
                                                                    data-parsley-maxlength-message="Vui lòng nhập meta title ít hơn 255 kí tự"
                                                                    value="{{ isset($cau_hinh) ? $cau_hinh->meta_title : '' }}"
                                                                    name="meta_title">
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <label>Meta description</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Meta description"
                                                                    data-parsley-maxlength="255"
                                                                    data-parsley-maxlength-message="Vui lòng nhập meta description ít hơn 255 kí tự"
                                                                    name="meta_description"
                                                                    value="{{ isset($cau_hinh) ? $cau_hinh->meta_description : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fullName">Ngân hàng</label>
                                                            <input type="text" class="form-control mb-4 tru-so-chinh"
                                                                name="ten_ngan_hang" id="fullName"
                                                                placeholder="Tên ngân hàng" data-parsley-maxlength="255"
                                                                data-parsley-maxlength-message="Vui lòng nhập ngân hàng ít hơn 255 kí tự"
                                                                value="{{ isset($cau_hinh) ? $cau_hinh->ten_ngan_hang : '' }}">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="profession">Số tài khoản</label>
                                                                    <input type="number" class="form-control mb-4 email"
                                                                        name="so_tai_khoan" id="profession"
                                                                        placeholder="Số tài khoản"
                                                                        data-parsley-maxlength="20"
                                                                        data-parsley-maxlength-message="Vui lòng nhập số tài khoản ít hơn 20 kí tự"
                                                                        value="{{ isset($cau_hinh) ? $cau_hinh->so_tai_khoan : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Tên chủ tài khoản</label>
                                                                <input type="text" class="form-control mb-4"
                                                                    name="ten_chu_the" id="profession"
                                                                    placeholder="Chủ tài khoản" data-parsley-maxlength="50"
                                                                    data-parsley-maxlength-message="Vui lòng nhập tên chủ tài khoản ít hơn 50 kí tự"
                                                                    value="{{ isset($cau_hinh) ? $cau_hinh->ten_chu_the : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fullName">Tên cửa hàng</label>
                                                            <input type="text" class="form-control mb-4 tru-so-chinh"
                                                                name="ten_cong_ty" id="fullName" placeholder="Tên cửa hàng"
                                                                data-parsley-maxlength="100"
                                                                data-parsley-maxlength-message="Vui lòng nhập tên cửa hàng ít hơn 100 kí tự"
                                                                value="{{ isset($cau_hinh) ? $cau_hinh->ten_cong_ty : '' }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fullName">Trụ sở chính</label>
                                                            <input type="text" class="form-control mb-4 tru-so-chinh"
                                                                name="tru_so_chinh" id="fullName"
                                                                placeholder="Địa chỉ trụ sở chính"
                                                                data-parsley-maxlength="255"
                                                                data-parsley-maxlength-message="Vui lòng nhập địa chỉ trụ sở chính ít hơn 255 kí tự"
                                                                value="{{ isset($cau_hinh) ? $cau_hinh->tru_so_chinh : '' }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fullName">Source bản đồ</label>
                                                            <textarea class="form-control mb-4" rows="3" name="iframe"
                                                                id="textarea-copy">{{ isset($cau_hinh) ? $cau_hinh->iframe : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">

                                <div class="info">
                                    <h6 class="">Chi nhánh</h6>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <input type="hidden" name="chi_nhanh" id="chi-nhanh">
                                                <div class="row">
                                                    <div class="col-md-10 mx-auto">

                                                    </div>
                                                    <div class="col-md-2 mx-auto">
                                                        <div class="input-form">
                                                            <button type="button"
                                                                class="form-control btn btn-primary additem">Thêm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mx-auto">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped mb-4 item-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Địa chỉ</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!isset($cau_hinh))
                                                            <tr>
                                                                <td>Chưa có thông tin chi nhánh</td>
                                                                <td></td>
                                                            </tr>
                                                        @elseif(empty($cau_hinh->chi_nhanh))
                                                            <tr>
                                                                <td>Chưa có thông tin chi nhánh</td>
                                                                <td></td>
                                                            </tr>
                                                        @else
                                                            @foreach (json_decode($cau_hinh->chi_nhanh) as $key => $value)
                                                                <tr>
                                                                    <input type="hidden"
                                                                        class="form-control  form-control-sm"
                                                                        placeholder="Chi nhánh" name="chi_nhanh[]"
                                                                        value="{{ $value }}">
                                                                    <td>{{ $value }}</td>
                                                                    <td class="text-center delete-item"
                                                                        onclick="deleteItemRowV2($(this))"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-x t-icon t-hover-icon">
                                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                        </svg></td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">

                                <div class="info">
                                    <h6 class="">Hotline</h6>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <input type="hidden" name="hotline" id="hotline">

                                                <div class="row">
                                                    <div class="col-md-10 mx-auto">
                                                    </div>
                                                    <div class="col-md-2 mx-auto">
                                                        <div class="input-form">
                                                            <button type="button"
                                                                class="form-control btn btn-primary additem2">Thêm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mx-auto">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped mb-4 item-table2">
                                                    <thead>
                                                        <tr>
                                                            <th>Hotline</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!isset($cau_hinh))
                                                            <tr>
                                                                <td>Chưa có thông tin hotline</td>
                                                                <td></td>
                                                            </tr>
                                                        @elseif(empty($cau_hinh->hotline))
                                                            <tr>
                                                                <td>Chưa có thông tin chi nhánh</td>
                                                                <td></td>
                                                            </tr>
                                                        @else
                                                            @foreach (json_decode($cau_hinh->hotline) as $key => $value)
                                                                <tr>
                                                                    <input type="hidden"
                                                                        class="form-control  form-control-sm"
                                                                        placeholder="Hotline" name="hotline[]"
                                                                        value="{{ $value }}">
                                                                    <td>{{ $value }}</td>
                                                                    <td class="text-center"
                                                                        onclick="deleteItemRowV2($(this))"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-x t-icon t-hover-icon">
                                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                        </svg></td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">
                                <div class="info">
                                    <h6 class="">banner</h6>
                                    <div class="form-row" style="display: initial;">
                                        <div class="custom-file-container" data-upload-id="uploadAnhBaiViet">
                                            <label>Upload hình ảnh banner <a href="javascript:void(0)"
                                                    class="custom-file-container__image-clear" title="Clear Image"> (Xóa
                                                    ảnh)</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" id="banner_upload"
                                                    class="custom-file-container__custom-file__custom-file-input"
                                                    accept="image/*" name="banner_upload"
                                                    value="{{ $cau_hinh->banner }}">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview custom-file-container__image-preview--active"
                                                id="uploadAnhBaiViet">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">
                                <div class="info">
                                    <h6 class="">Slide Show</h6>
                                    <div class="form-row" style="display: initial;">
                                        <div class="col-md-12 mb-4">
                                            <div class="custom-file-container" data-upload-id="uploadSlideShow">
                                                <label>Slide Show <a href="javascript:void(0)"
                                                        class="custom-file-container__image-clear" title="Clear Image">(
                                                        Xóa ảnh )</a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file"
                                                        class="custom-file-container__custom-file__custom-file-input"
                                                        name="slide_show_upload[]" enctype="multipart/form-data" accept=".png, .jpg, .jpeg"
                                                        multiple="multiple">
                                                    <input type="hidden" id="image-upload-delete" name="image_upload_delete" 
                                                        value="">
                                                    <span
                                                        class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                @if (isset($cau_hinh))
                                                    <div class="custom-file-container__image-preview">
                                                        @foreach ($cau_hinh->sildeShow as $img)
                                                            <div class="anh-bai-viet" id="{{ $img->ten_anh }}"
                                                                style="background-image: url('{{ $img->url }}'); width: 200px; height: 100%;">
                                                                <span
                                                                    class="custom-file-container__image-multi-preview__single-image-clear">
                                                                    <span
                                                                        class="custom-file-container__image-multi-preview__single-image-clear__icon delete-hinh-anh"
                                                                        data-upload-token="{{ $img->ten_anh }}"
                                                                        onclick="remove_image('{{ $img->ten_anh }}')">x</span>
                                                                </span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="custom-file-container__image-preview"></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="account-settings-footer">
            <div class="as-footer-container" style="padding-left: 72%;">
                <button id="btn-submit" type="submit" form="form-submit" class="btn btn-primary">Lưu thay
                    đổi</button>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script src="{{ asset('admin/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/assets/js/apps/invoice-edit.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var check = "{{ isset($cau_hinh) }}";
            if (check) {
                var img = "{{ $cau_hinh->banner }}"
                if (img.length != 0) {
                    var uploadAnhBaiViet = new FileUploadWithPreview('uploadAnhBaiViet', {
                        presetFiles: [
                            "{{ $cau_hinh->banner }}",
                        ],
                    });
                } else {
                    var uploadAnhBaiViet = new FileUploadWithPreview('uploadAnhBaiViet');
                }
            } else {
                var uploadAnhBaiViet = new FileUploadWithPreview('uploadAnhBaiViet');
            }
        }, false);
    </script>
    <script>
        function remove_image(img) {
            document.getElementById(img).remove();
        }

        var attachArray = [];
        $('.delete-hinh-anh').on('click', function(e) {
            e.preventDefault();
            attachArray.push($(this).data('upload-token'));
            console.log(attachArray);
            $('#image-upload-delete').val(attachArray);

        });
        document.addEventListener('DOMContentLoaded', function() {
            var check = "{{ isset($cau_hinh) }}";
            if (check) {
                var checkNull = "{{ count($cau_hinh->sildeShow) }}";
                if (checkNull == 0) {
                    var uploadSlideShow = new FileUploadWithPreview('uploadSlideShow');
                } else {
                    // var fileArray = [<?php echo '"' . implode('","', $cau_hinh->slide_show) . '"'; ?>];
                    var uploadSlideShow = new FileUploadWithPreview('uploadSlideShow');
                }

            } else {
                var uploadSlideShow = new FileUploadWithPreview('uploadSlideShow');
            }

        }, false);
    </script>


    <script>
        $("#form-submit").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $("#btn-submit").text("Vui lòng chờ ...");
            $('#btn-submit').prop('disabled', true);
            if ($('#form-submit').parsley().isValid()) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data) {
                        {
                            if (data.status == 'success') {
                                Swal.fire({
                                    position: 'center',
                                    type: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1000
                                })
                                window.location.reload();
                            }
                            if (data.status == 'error') {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                                $("#btn-submit").text("Lưu thay đổi");
                                $('#btn-submit').prop('disabled', false);
                            }
                        }
                    }
                });
            } else {
                $("#btn-submit").text("Lưu thay đổi");
                $('#btn-submit').prop('disabled', false);
            }
        });
    </script>

    <script>
        function deleteItemRow() {
            deleteItem = document.querySelectorAll('.delete-item');
            for (var i = 0; i < deleteItem.length; i++) {
                deleteItem[i].addEventListener('click', function() {
                    this.parentElement.parentNode.parentNode.parentNode.remove();
                })
            }
        }

        function deleteItemRowV2(row) {
            row.closest('tr').remove();
        }
        document.getElementsByClassName('additem')[0].addEventListener('click', function() {
            getTableElement = document.querySelector('.item-table');
            currentIndex = getTableElement.rows.length;

            $html = '<tr>' +
                '<td class="rate">' +
                '<input type="text" class="form-control  form-control-sm" placeholder="Chi nhánh" name="chi_nhanh[]"> ' +
                ' </td>' +
                '<td class="delete-item-row text-center">' +
                '<ul class="table-controls">' +
                '<li><a class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>' +
                '</ul>' +
                '</td>' +
                '</tr>';

            $(".item-table tbody").append($html);
            deleteItemRow();
        })

        document.getElementsByClassName('additem2')[0].addEventListener('click', function() {
            getTableElement = document.querySelector('.item-table2');
            currentIndex = getTableElement.rows.length;

            $html = '<tr>' +
                '<td class="rate">' +
                '<input type="text" class="form-control  form-control-sm" placeholder="Hotline" name="hotline[]"> ' +
                ' </td>' +
                '<td class="delete-item-row text-center">' +
                '<ul class="table-controls">' +
                '<li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>' +
                '</ul>' +
                '</td>' +
                '</tr>';

            $(".item-table2 tbody").append($html);
            deleteItemRow();
        })
    </script>
    @if (session('status'))
        <script type="text/javascript">
            swal.fire({
                title: "{{ session('status') }}",
                type: 'success',
                position: 'center',
                padding: '2em',
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            Swal.fire({
                title: "{{ session('error') }}",
                type: 'error',
                position: 'center',
                padding: '2em',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endsection
