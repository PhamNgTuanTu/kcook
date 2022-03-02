<div class="modal fade" id="sua_the_loai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa loại sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate method="post" action="{{ route('admin.sua_loai_san_pham') }}" id="sua-the-loai">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <input type="hidden" class="form-control" id="id-sua-loai-sp" name="id_can_sua">
                            <label for="ten-loai-sp">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" id="sua-ten-loai-sp"
                                name="ten_loai"  placeholder="Nhập tên loại sản phẩm" value="" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập trường này !
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div id="select_menu" class="form-group mb-4">
                                <select id="parent-sua-loai-sp" class="custom-select" required  name="parent_id">
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
                <button type="submit" class="btn btn-primary" form="sua-the-loai">Lưu lại</button>
            </div>
        </div>
    </div>
</div>
