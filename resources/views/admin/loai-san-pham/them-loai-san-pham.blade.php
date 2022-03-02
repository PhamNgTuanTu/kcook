<div class="modal fade" id="them_the_loai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm loại sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" data-parsley-validate method="post"
                    action="{{ route('admin.them_loai_san_pham') }}" id="them-the-loai">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="ten-loai-sp">Tên loại sản phẩm *</label>
                            <input type="text" class="form-control" id="ten-loai-sp" name="name"
                                data-parsley-required-message="Vui lòng nhập tên loại sản phẩm"
                                placeholder="Nhập tên loại sản phẩm" data-parsley-maxlength="100"
                                data-parsley-maxlength-message="Vui lòng nhập tên loại sản phẩm ít hơn 100 kí tự"
                                value="" required>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div id="select_menu" class="form-group mb-4">
                                <select class="custom-select" required name="parent_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $optionselect !!}
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng chọn trường này !
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Hủy</button>
                <button type="submit" class="btn btn-primary" form="them-the-loai">Lưu lại</button>
            </div>
        </div>
    </div>
</div>
