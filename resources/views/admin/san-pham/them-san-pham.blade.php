<div class="modal fade" id="them_san_pham" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate method="post"
                    action="{{ route('admin.them_loai_san_pham') }}" id="them-the-loai">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label for="ten-loai-sp">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="ten-loai-sp" name="name"
                                placeholder="Nhập tên loại sản phẩm" value="" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập trường này !
                            </div>
                        </div>
                        <div class="col col-md-6 mb-4">
                            <label for="ten-loai-sp">Mã sản phẩm</label>
                            <input type="text" class="form-control" id="ten-loai-sp" name="name"
                                placeholder="Nhập mã sản phẩm" value="" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập trường này !
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="ten-loai-sp">Loại sản phẩm</label>
                            <div id="select_menu" class="form-group mb-4">
                                <select class="custom-select" required  name="parent_id">
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
