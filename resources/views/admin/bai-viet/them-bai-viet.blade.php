@extends('admin.master')
@section('title')
    <title>Kcook - Thêm bài viết</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/scrollspyNav.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/assets/plugins/file-upload/file-upload-with-preview.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/editors/quill/quill.snow.css') }}">
    <style>
        .anh-bai-viet {
            box-sizing: border-box;
            transition: all 0.2s ease;
            margin-top: 54px;
            margin-bottom: 40px;
            height: 250px;
            width: 100%;
            border-radius: 4px;
            background-size: contain;
            background-position: center center;
            background-repeat: no-repeat;
            background-color: #fff;
            overflow: auto;
            padding: 15px;
        }

        .button-custom {
            width: 100px;
            float: right;
        }

        .feedback-error {
            color: #e7515a;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
        }

    </style>
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <!-- <a href="{{ route('admin.san_pham') }}"class="btn btn-info mb-2" type="button" style="position: relative;">Quay lại 
                        <i class="fas fa-arrow-left" aria-hidden="true" style="
                    position: absolute;
                    line-height: 24px;
                    top:50%;
                    margin-top: -12px;
                    left: 4%;"></i></a> -->
            <form class="needs-validation" data-parsley-validate id="them-bai-viet" method="post" @if ($edit == true) action="{{ route('admin.do_sua_bai_viet', ['id' => $bai_viet->id]) }}" @else action="{{ route('admin.do_them_bai_viet') }}" @endif
                enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationCustomUsername">Loại bài viết</label>
                        <div id="select_menu" class="form-group mb-4">
                            <select class="custom-select" name="loai_bai_viet"
                                data-parsley-required-message="Vui lòng chọn loại bài viết" required>
                                @if ($edit == true)
                                    <option value="">Chọn loại bài viết</option>
                                    <option value="1" {{ $bai_viet->loai_bai_viet == 1 ? 'selected' : '' }}>Tin tức
                                    </option>
                                    <option value="2" {{ $bai_viet->loai_bai_viet == 2 ? 'selected' : '' }}>Tuyển dụng
                                    </option>
                                @else
                                    <option value="">Chọn loại bài viết</option>
                                    <option value="1">Tin tức</option>
                                    <option value="2">Tuyển dụng</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8 mb-4">
                        <label for="validationCustom01">Tiêu đề</label>
                        <input type="text" class="form-control" id="validationCustom01" name="tieu_de"
                            data-parsley-required-message="Vui lòng nhập tiêu đề bài viết"
                            placeholder="Nhập tiêu đề bài viết" data-parsley-maxlength="255"
                            data-parsley-maxlength-message="Vui lòng nhập tiêu đề bài viết ít hơn 255 kí tự"
                            placeholder="Tiêu đề bài viết" @if ($edit == true) value="{{ $bai_viet->tieu_de }}" @else value="{{ old('tieu_de') }}" @endif required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label>Meta title</label>
                        <input type="text" class="form-control" placeholder="Meta title" data-parsley-maxlength="255"
                            data-parsley-maxlength-message="Vui lòng nhập meta title ít hơn 255 kí tự"
                            @if ($edit == true) value="{{ $bai_viet->meta_title }}" @else value="{{ old('meta_title') }}" @endif name="meta_title">
                    </div>
                    <div class="col-md-5 mb-4">
                        <label>Meta description</label>
                        <input type="text" class="form-control" placeholder="Meta description"
                            data-parsley-maxlength="255"
                            data-parsley-maxlength-message="Vui lòng nhập meta description ít hơn 255 kí tự"
                            name="meta_description" @if ($edit == true) value="{{ $bai_viet->meta_description }}" @else value="{{ old('meta_description') }}" @endif>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="validationCustom08">Slug</label>
                        <input type="text" class="form-control" id="validationCustom08" placeholder="Slug" name="slug"
                            @if ($edit == true) value="{{ $bai_viet->slug }}" @else value="{{ old('slug') }}" @endif readonly>
                    </div>
                </div>
                <div class="form-row" style="margin-bottom: 13%;">
                    <div class="col-md-12 mb-4">
                        <label for="validationCustom02">Phụ đề </label><label class="feedback-error"
                            style="font-size: 20px;">*</label>
                        @if ($errors->has('phu_de'))
                            <div class="feedback-error" id="feedback-validationCustom04">{{ $errors->first('phu_de') }}
                            </div>
                        @endif
                        <input type="hidden" class="form-control" id="phu-de" placeholder="Phụ đề bài viết" name="phu_de"
                            value="{{ $edit == true ? $bai_viet->phu_de : '' }}">
                        <!-- <div id="editor-phuDe">
                                            {!! $edit == true ? $bai_viet->mo_ta : '' !!}
                                        </div> -->
                        <div class="widget-content widget-content-area">
                            <div id="editor-phuDe">{!! $edit == true ? $bai_viet->phu_de : '' !!}</div>
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-bottom: 13%;margin-top: 16%;">
                    <div class="col-md-12 mb-4">
                        <label for="validationCustom09">Nội dung</label><label class="feedback-error"
                            style="font-size: 20px;">*</label>
                        @if ($errors->has('noi_dung')))
                            <div class="feedback-error" id="feedback-validationCustom04">{{ $errors->first('noi_dung') }}
                            </div>
                        @endif
                        <input type="hidden" class="form-control" id="noi-dung" placeholder="Nội dung bài viết"
                            name="noi_dung" value="{{ $edit == true ? $bai_viet->noi_dung : '' }}">
                        <div class="widget-content widget-content-area">
                            <div id="editor-noiDung">
                                {!! $edit == true ? $bai_viet->noi_dung : '' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 16%;">
                    <div class="col-md-12 mb-4">
                        <div class="custom-file-container" data-upload-id="uploadAnhBaiViet">
                            <label>Upload hình ảnh bài viết <a href="javascript:void(0)"
                                    class="custom-file-container__image-clear" title="Clear Image"> (Xóa ảnh)</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                    accept="image/*" name="image_upload">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview custom-file-container__image-preview--active"
                                id="uploadAnhBaiViet" baseImage="">
                                <!-- @if ($edit == true)
                                            @if ($bai_viet->anh != null)
                                                <div class="anh-bai-viet" id="{{ $bai_viet->id }}"
                                                    style="background-image: url('{{ $bai_viet->anh }}');">
                                                </div>
                                            @endif
                                        @endif -->
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-3 button-custom" type="submit" for="them-bai-viet">Lưu</button>
                <a href="{{ route('admin.ds_bai_viet') }}" type="button"
                    class="btn btn-warning mt-3 button-custom them-san-pham">Hủy
                    bỏ</a>
            </form>
        </div>

    </div>
@endsection
@section('page-js')
    <script src="{{ asset('admin/assets/plugins/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/editors/quill/custom-quill.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src={{ asset('admin/assets/plugins/table/datatable/datatables.js') }}></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var check = "{{ isset($bai_viet) }}";
            if (check) {
                var img = "{{ isset($bai_viet) ? $bai_viet->anh : '' }}"
                if (img.length != 0) {
                    var uploadAnhBaiViet = new FileUploadWithPreview('uploadAnhBaiViet', {
                        presetFiles: [
                            "{{ isset($bai_viet) ? $bai_viet->anh : '' }}",
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
        function hover_fields(id) {
            document.getElementById('feedback-' + id).remove();
        }

        ///
        var quill_pd = new Quill('#editor-phuDe', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block']
                ]
            },
            placeholder: 'Phụ đề bài viết',
            theme: 'snow' // or 'bubble'
        });
        /////
        var quill_nd = new Quill('#editor-noiDung', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block']
                ]
            },
            placeholder: 'Nội dung bài viết',
            theme: 'snow' // or 'bubble'
        });
        /////
        var form = document.getElementById("them-bai-viet");
        form.onsubmit = function() {
            // console.log(123)
            // console.log(quill.root.innerHTML);
            var phu_de = document.getElementById("phu-de").value = JSON.stringify(quill_pd.root.innerHTML);
            var noi_dung = document.getElementById("noi-dung").value = JSON.stringify(quill_nd.root.innerHTML);
            // console.log("Submitted", phu_de);
            // console.log("Submitted", noi_dung);
            // return true;
        }
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
                timer: 1500,
                position: 'center',
                padding: '2em',
            })
        </script>
    @endif
@endsection
