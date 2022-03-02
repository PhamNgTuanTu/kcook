@extends('admin.master')
@section('title')
    <title>Kcook - Sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/scrollspyNav.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/assets/plugins/file-upload/file-upload-with-preview.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/editors/quill/quill.snow.css') }}">
    <style>
        .anh-san-pham {
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

        .feedback-error {
            color: #e7515a;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .button-custom {
            width: 100px;
            float: right;
        }

    </style>
@section('content')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <!-- <a href="{{ route('admin.san_pham') }}"class="btn btn-info mb-2" type="button" style="position: relative;">Quay lại  -->
            <!-- <i class="fas fa-arrow-left" aria-hidden="true" style="
                                                                                                position: absolute;
                                                                                                line-height: 24px;
                                                                                                top:50%;
                                                                                                margin-top: -12px;
                                                                                                left: 4%;"></i></a> -->

            <form class="needs-validation" data-parsley-validate method="post" @if ($edit == true) action="{{ route('admin.sua_san_pham', ['id' => $ct_san_pham->id]) }}" @else action="{{ route('admin.them_san_pham') }}" @endif
                id="{{ $edit == true ? 'sua-san-pham' : 'them-san-pham' }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationCustom01">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="ten_san_pham"
                            data-parsley-required-message="Vui lòng nhập tên sản phẩm" placeholder="Nhập tên sản phẩm"
                            data-parsley-maxlength="100"
                            data-parsley-maxlength-message="Vui lòng nhập tên sản phẩm ít hơn 100 kí tự"
                            placeholder="Tên sản phẩm" @if ($edit == true) value="{{ $ct_san_pham->ten_san_pham }}" @else value="{{ old('ten_san_pham') }}" @endif required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationCustom02">Mã sản phẩm</label>
                        <input type="text" class="form-control" name="ma_san_pham"
                            data-parsley-required-message="Vui lòng nhập mã sản phẩm" placeholder="Nhập mã sản phẩm"
                            data-parsley-maxlength="50"
                            data-parsley-maxlength-message="Vui lòng nhập mã sản phẩm ít hơn 50 kí tự"
                            placeholder="Mã sản phẩm" @if ($edit == true) value="{{ $ct_san_pham->ma_san_pham }}" @else value="{{ old('ma_san_pham') }}" @endif required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationCustomUsername">Loại sản phẩm</label>
                        <div id="select_menu" class="form-group mb-4">
                            <select class="custom-select" name="loai_san_pham_id"
                                data-parsley-required-message="Vui lòng chọn loại sản phẩm" required>
                                @if ($edit == true)
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($loai_san_pham as $loai)
                                        @if ($ct_san_pham->loai_san_pham_id == $loai->id)
                                            <option value="{{ $loai->id }}" selected>{{ $loai->ten_loai }}</option>
                                        @else
                                            <option value="{{ $loai->id }}">{{ $loai->ten_loai }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">Chọn danh mục</option>
                                    {!! $optionselect !!}
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-4">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" placeholder="Nhập số lượng"
                            data-parsley-required-message="Vui lòng nhập số lượng" data-parsley-min="1"
                            data-parsley-min-message="Vui lòng nhập số lượng lớn hơn 1" data-parsley-max="9999"
                            data-parsley-type="number" data-parsley-type-message="Vui lòng nhập số nguyên"
                            data-parsley-max-message="Vui lòng nhập số lượng ít hơn 9999" name="so_luong"
                            @if ($edit == true) value="{{ $ct_san_pham->so_luong }}" @else value="{{ old('so_luong') }}" @endif required>

                        @if ($errors->has('so_luong'))
                            <div class="feedback-error" id="feedback-validationCustom03">{{ $errors->first('so_luong') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3 mb-4">
                        <label>Giá gốc</label>
                        <input type="number" class="form-control" data-parsley-required-message="Vui lòng nhập giá gốc"
                            data-parsley-min="1000" data-parsley-min-message="Vui lòng nhập giá gốc lớn hơn 1000 VNĐ"
                            data-parsley-type="number" data-parsley-type-message="Vui lòng nhập số nguyên"
                            data-parsley-max="999999999"
                            data-parsley-max-message="Vui lòng nhập giá gốc ít hơn 999.999.999 VNĐ" placeholder="VND"
                            name="gia_goc" @if ($edit == true) value="{{ $ct_san_pham->gia_goc }}" @else value="{{ old('gia_goc') }}" @endif required>
                        @if ($errors->has('gia_goc'))
                            <div class="feedback-error" id="feedback-validationCustom04">{{ $errors->first('gia_goc') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3 mb-4">
                        <label>Giá bán</label>
                        <input type="number" class="form-control" placeholder="VND" name="gia_ban"
                            data-parsley-required-message="Vui lòng nhập giá bán" data-parsley-min="1000"
                            data-parsley-type="number" data-parsley-type-message="Vui lòng nhập số nguyên"
                            data-parsley-min-message="Vui lòng nhập giá bán lớn hơn 1000 VNĐ" data-parsley-max="999999999"
                            data-parsley-max-message="Vui lòng nhập giá bán ít hơn 999.999.999 VNĐ" @if ($edit == true) value="{{ $ct_san_pham->gia_ban }}" @else value="{{ old('gia_ban') }}" @endif
                            required>
                        @if ($errors->has('gia_ban'))
                            <div class="feedback-error" id="feedback-validationCustom05">{{ $errors->first('gia_ban') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3 mb-4">
                        <label>Trạng thái</label>
                        <div id="select_menu" class="form-group mb-4">
                            <select class="custom-select" name="trang_thai">
                                <option value="1" @if ($edit == true) @if ($ct_san_pham->trang_thai == 1) selected @endif @else selected @endif>Còn Hàng</option>
                                <option value="2" @if ($edit == true) @if ($ct_san_pham->trang_thai == 2) selected @endif @endif>Hết Hàng</option>
                                <option value="3" @if ($edit == true) @if ($ct_san_pham->trang_thai == 3) selected @endif @endif>Ngưng Bán</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label>Meta title</label>
                        <input type="text" class="form-control" placeholder="Meta title" data-parsley-maxlength="255"
                            data-parsley-maxlength-message="Vui lòng nhập meta title ít hơn 255 kí tự"
                            data-parsley-required-message="Vui lòng nhập meta title" required @if ($edit == true) value="{{ $ct_san_pham->meta_title }}" @else value="{{ old('meta_title') }}" @endif
                            name="meta_title">
                    </div>
                    <div class="col-md-5 mb-4">
                        <label>Meta description</label>
                        <input type="text" class="form-control" placeholder="Meta description"
                            data-parsley-maxlength="255"
                            data-parsley-maxlength-message="Vui lòng nhập meta description ít hơn 255 kí tự"
                            name="meta_description" @if ($edit == true) value="{{ $ct_san_pham->meta_description }}" @else value="{{ old('meta_description') }}" @endif>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="validationCustom08">Slug</label>
                        <input type="text" class="form-control" id="validationCustom08" placeholder="Slug" name="slug"
                            @if ($edit == true) value="{{ $ct_san_pham->slug }}" @else value="{{ old('slug') }}" @endif readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-4 h-100">
                        <label for="validationCustom09">Mô tả</label>
                        <input type="hidden" class="form-control" id="mo-ta" placeholder="Mô tả sản phẩm" name="mo_ta"
                            value="{{ $edit == true ? $ct_san_pham->mo_ta : '' }}">
                        <div class="widget-content widget-content-area">
                            <div id="editor-moTa">
                                {!! $edit == true ? $ct_san_pham->mo_ta : '' !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-4">
                        <div class="custom-file-container" data-upload-id="uploadAnhSanPham">
                            <label>Hình ảnh <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">( Xóa ảnh )</a></label>
                            <label class="custom-file-container__custom-file" >
                                            <input name="image_upload[]" type="file" class="custom-file-container__custom-file__custom-file-input" multiple>
                                            
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                        @if ($edit == true)
                                            <input type="hidden" id="edit-data-image" value="{{$ct_san_pham->hinh_anh}}">
                                            <input type="hidden" id="remove-data-image" name="image_upload_delete" value="false">

                                            <input type="hidden" id="data-image-after-delete" name="image_after_delete" value="">
                                        @endif
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-4 ">
                        <button class="btn btn-primary mt-3 button-custom them-san-pham" type="submit"
                            id="btn-submit">Lưu</button>
                        <a href="{{ route('admin.san_pham') }}" type="button"
                            class="btn btn-warning mt-3 button-custom them-san-pham">Hủy
                            bỏ</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
@section('modal')
    @include('admin.san-pham.them-san-pham')
    @include('admin.san-pham.sua-san-pham')
@endsection
@section('page-js')
    <script src="{{ asset('admin/assets/plugins/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/editors/quill/custom-quill.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src={{ asset('admin/assets/plugins/table/datatable/datatables.js') }}></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap-maxlength/custom-bs-maxlength.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/sweetalerts/custom-sweetalert.js') }}"></script>

    <script>
        $('#validationCustom01').maxlength({
            threshold: 100,
        });
        $('#validationCustom02').maxlength({
            threshold: 30,
        });
        @if ($edit == true)
            var arrImage = JSON.parse($('#edit-data-image').val());
            var data = new Array();
            for (var i = 0; i < arrImage.length; i++) {
                data.push(arrImage[i].url);
            }
            var uploadAnhSanPham = new FileUploadWithPreview('uploadAnhSanPham', {
                presetFiles: data 
            })

            
            window.addEventListener('fileUploadWithPreview:imageDeleted', function (e) {
            if (e.detail.uploadId === 'uploadAnhSanPham') {

                var arr_delete = new Array();
                var current_arr = e.detail.cachedFileArray;
                for (var i = 0; i < current_arr.length ; i++) {
                    arr_delete.push(current_arr[i].name);
                }
                $('#remove-data-image').val(true);
                $('#data-image-after-delete').val(JSON.stringify(arr_delete));
                console.log(arr_delete);
            }
        })
        @else
            var uploadAnhSanPham = new FileUploadWithPreview('uploadAnhSanPham')
        @endif

        function remove_image(img) {
            document.getElementById(img).remove();
        }

        function hover_fields(id) {
            document.getElementById('feedback-' + id).remove();
        }
        var quill = new Quill('#editor-moTa', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['image']
                ]

            },
            placeholder: 'Mô tả sản phẩm',
            theme: 'snow',
        });

        function imageHandler() {
            var range = this.quill.getSelection();
            var value = prompt('What is the image URL');
            this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
        }
        /////
        var form = document.getElementById("them-san-pham");
        form.onsubmit = function() {
            // console.log(quill.root.innerHTML);
            var name = document.getElementById("mo-ta").value = JSON.stringify(quill.root.innerHTML);
            // console.log("Submitted", name);
            // return true;
        }
        /////
   
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
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
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
                padding: '2em',
                showCancelButton: false,
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
    <script type="text/javascript">
        
    </script>
  
@endsection
