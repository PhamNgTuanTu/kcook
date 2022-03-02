<?php

use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\QuanTriVienController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('home.')->group(function () {
    Route::get('/', 'HomeController@home')->name("home");
    Route::get('/san-pham/{slug}', 'SanPhamController@chiTietSanPham')->name("chi_tiet_san_pham");
    Route::get('/danh-muc/{slugDanhMuc}', 'SanPhamController@sanPhamTheoDanhMuc')->name("san_pham_theo_danh_muc");
    Route::get('/danh-muc/{slugDanhMuc}/{slugDanhMucCon}', 'SanPhamController@sanPhamTheoDanhMucCon')->name("san_pham_theo_danh_muc_con");
    Route::get('/san-pham', 'SanPhamController@sanPham')->name("san_pham");

    Route::get('/gio-hang', 'GioHangController@gioHang')->name("gio_hang");
    Route::get('/them-vao-gio-hang/{id}', 'GioHangController@AddCart')->name('them_vao_gio_hang');
    Route::post('/them-vao-gio-hang-so-luong/{id}', 'GioHangController@AddCartWithQuantity')->name('them_vao_gio_hang_so_luong');
    Route::get('/xoa-san-pham-khoi-gio-hang/{id}', 'GioHangController@DeleteItemCart')->name('xoa_san_pham_khoi_gio_hang');
    Route::get('/cap-nhat-san-pham-trong-gio-hang/{id}/{quanty}', 'GioHangController@UpdateItemListCart')->name('cap_nhat_san_pham_trong_gio_hang');
    Route::post('/trang-thanh-toan-don-hang', 'GioHangController@thanhToanDonHang')->name('thanh_toan_don_hang');

    Route::get('/gioi-thieu', 'BaiVietController@gioiThieu')->name("gioi_thieu");
    Route::get('/thong-bao', 'BaiVietController@thongBao')->name("thong_bao");
    Route::get('/tin-tuc', 'BaiVietController@tinTuc')->name("tin_tuc");
    Route::get('/tin-tuc/{slug}', 'BaiVietController@chiTietTinTuc')->name("chi_tiet_tin_tuc");
    Route::get('/tuyen-dung', 'BaiVietController@tuyenDung')->name("tuyen_dung");
    Route::get('/tuyen-dung/{slug}', 'BaiVietController@chiTietTuyenDung')->name("chi_tiet_tuyen_dung");
    Route::get('/lien-he', 'BaiVietController@lienHe')->name("lien_he");
    Route::post('/lien-he', 'BaiVietController@themLienHe')->name('them_lien_he');
    Route::get('/thong-bao-lien-he', 'BaiVietController@thongBaoLienHe')->name('thong_bao_lien_he');

    Route::get('/dang-nhap', 'KhachHangController@getDangNhap')->name("dang_nhap");
    Route::post('/dang-nhap', 'KhachHangController@postDangNhap')->name("post_dang_nhap");
    Route::post('/dang-ky-nguoi-dung', 'KhachHangController@postDangKy')->name('dang_ky_nguoi_dung');
    Route::post('/dang-xuat', 'HomeController@logout')->name("logout");

    Route::get('/trang-tai-khoan', 'HomeController@trangTaiKhoan')->name("trang-tai-khoan");
    Route::get('/trang-tai-khoan/don-hang', 'HomeController@trangdonHang')->name("trang-don-hang");
    Route::get('/trang-tai-khoan/thong-tin-ca-nhan', 'HomeController@thongTinCaNhan')->name("thong-tin-ca-nhan");
    Route::post('/tim-kiem', 'SanPhamController@searchFullText')->name("tim_kiem");
    Route::post('/ket-qua-tim-kiem', 'SanPhamController@ketQuaTimkiem')->name("ket_qua_tim_kiem");
    Route::post('/user-comment', 'SanPhamReviewController@store')->name('user-comment');
    Route::get('/khach-hang/vang-lai/{hoaDonId}', 'KhachHangController@checkVangLaiHoaDon')->name('vang_lai_hoa_don');
    Route::post('/khach-hang-vang-lai/{slug}/huy-don-hang', 'KhachHangController@huyDonHang')->name('huy_don_hang_vang_lai');
});

/* USER ROUTES */
Route::middleware('CheckUserLogin')->group(function () {
    Route::name('nguoi-dung.')->group(function () {
        Route::get('khach-hang/dang-xuat', [KhachHangController::class, 'dangXuatNguoiDung'])->name('dang_xuat');
        Route::get('/khach-hang/{slug}/trang-ca-nhan', 'KhachHangController@index')->name('trang_ca_nhan');
        Route::get('/khach-hang/{slug}/thong-tin-tai-khoan', 'KhachHangController@thongTinCaNhan')->name('thong_tin_ca_nhan');
        Route::post('/khach-hang/{slug}/cap-nhat-thong-tin-tai-khoan', 'KhachHangController@postThongTinCaNhan')->name('post_thong_tin_ca_nhan');

        //đơn hàng
        Route::get('/khach-hang/{slug}/xem-don-hang', 'KhachHangController@xemDonHang')->name('don_hang');
        Route::get('/khach-hang/{slug}/xem-chi-tiet', 'KhachHangController@xemChiTietDonHang')->name('xem_chi_tiet_don_hang');
        Route::post('/khach-hang/{slug}/huy-don-hang', 'KhachHangController@huyDonHang')->name('huy_don_hang');

        //giỏ hàng
        Route::get('/khach-hang/{slug}/gio-hang', 'KhachHangController@xemGioHang')->name('gio_hang_user');
        Route::get('/khach-hang/{id}/them-gio-hang', 'KhachHangController@themGioHang')->name('user_them_vao_gio_hang');
        Route::post('/khach-hang/{id}/them-gio-hang-so-luong', 'KhachHangController@AddCartWithQuantity')->name('them_vao_gio_hang_nguoi_dung_so_luong');
        Route::get('/khach-hang/{id}/{sl}/cap-nhat-gio-hang', 'KhachHangController@capNhatGioHang')->name('user_cap_nhat_gio_hang');
        Route::get('/khach-hang/{id}/xoa-gio-hang', 'KhachHangController@xoaGioHang')->name('user_xoa_gio_hang');

        //thanh toán
        Route::post('/khach-hang/{slug}/thanh-toan', 'KhachHangController@thanhToanGioHang')->name('user_thanh_toan_gio_hang');
    });
});

//login
Route::group(['prefix' => 'quan-tri'], function () {
    Route::get('/dang-nhap', 'QuanTriVienController@getLogin')->name('getLogin');
    Route::post('dang-nhap', 'QuanTriVienController@postLogin')->name('postLogin');
    // Route::get('/dang-xuat','QuanTriVienController@getLogout')->name('getLogout');
});

/* ADMIN ROUTES */
Route::middleware('CheckAdminLogin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('/dang-xuat', [QuanTriVienController::class, 'getLogout'])->name('getLogout');
        Route::prefix('quan-tri')->group(function () {
            Route::get('/', 'QuanTriVienController@index')->name('trang_chu');

            // //loại sản phẩm
            Route::get('/loai-san-pham', 'LoaiSanPhamController@index')->name('loai_san_pham');
            Route::get('/them-loai-san-pham', 'LoaiSanPhamController@create')->name('them_loai_san_pham');
            Route::post('/them-loai-san-pham', 'LoaiSanPhamController@themLoaiSanPham')->name('them_loai_san_pham');
            Route::post('/sua-loai-san-pham', 'LoaiSanPhamController@update')->name('sua_loai_san_pham');
            Route::delete('/xoa-loai-san-pham/{id}', 'LoaiSanPhamController@xoaLoaiSanPham')->name('xoa_loai_san_pham');

            //sản phẩm
            Route::get('/san-pham', 'SanPhamController@index')->name('san_pham');
            Route::get('/them-san-pham', 'SanPhamController@store')->name('view_them_san_pham');
            Route::post('/them-san-pham', 'SanPhamController@create')->name('them_san_pham');
            Route::get('/san-pham/{id}', 'SanPhamController@edit')->name('view_sua_san_pham');
            Route::post('/sua-san-pham/{id}', 'SanPhamController@update')->name('sua_san_pham');
            Route::delete('/xoa-san-pham/{id}', 'SanPhamController@destroy')->name('xoa_san_pham');

            //bài viết
            Route::get('/bai-viet', 'BaiVietController@index')->name('ds_bai_viet');
            Route::get('/them-bai-viet', 'BaiVietController@them')->name('them_bai_viet');
            Route::post('/them-bai-viet', 'BaiVietController@themBaiViet')->name('do_them_bai_viet');
            Route::get('/bai-viet/{id}', 'BaiVietController@edit')->name('sua_bai_viet');
            Route::post('/sua-bai-viet/{id}', 'BaiVietController@updateBaiViet')->name('do_sua_bai_viet');
            Route::delete('/xoa-bai-viet/{id}', 'BaiVietController@xoaBaiViet')->name('xoa_bai_viet');

            //cấu hình
            Route::get('/cau-hinh', 'CauHinhController@index')->name('cau_hinh');
            Route::post('/cau-hinh', 'CauHinhController@store')->name('edit_cau_hinh');

            //hóa đơn
            Route::get('/hoa-don', 'HoaDonController@index')->name('hoa_don');
            Route::get('/chi-tiet-hoa-don/{id}', 'HoaDonController@show')->name('ct_hoa_don');
            Route::post('/thay-doi-trang-thai/{id}', 'HoaDonController@update')->name('thay_doi_trang_thai_hoa_don');
            Route::post('/thay-doi-thanh-toan/{id}', 'HoaDonController@updateThanhToan')->name('thay_doi_thanh_toan');
        });
    });
});
