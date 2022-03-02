<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\ChiTietHoaDon;
use App\Models\SanPham;
use Carbon\Carbon;
use App\Models\HoaDon;
use App\Jobs\sendMailTinhTrangHoaDonJob;

class GioHangController extends Controller
{
    private $sanPham;
    public function __construct(SanPham $sanPham)
    {
        $this->sanPham = $sanPham;
    }

    public function gioHang()
    {
        return view('home.trang-gio-hang.index');
    }

    // Thêm sản phẩm vào giỏ hàng
    public function AddCart(Request $req, $id)
    {
        $sanPham = $this->sanPham->where('id', $id)->first();
        if ($sanPham != null) {
            $oldcart = Session('Cart') ? Session('Cart') : null;  // giỏ hàng hiện tại
            $newCart = new Cart($oldcart); // giỏ hàng khi thêm mới

            $newCart->AddCart($sanPham, $id);
            $req->session()->put('Cart', $newCart);
        }
        $gio_hang = view('home.partials.main-menu')->render();
        return response()->json([
            'gio-hang' => $gio_hang,
        ]);
    }

    // Thêm sản phẩm vào giỏ hàng có số lượng
    public function AddCartWithQuantity(Request $req, $id)
    {
        $sanPham = $this->sanPham->where('id', $id)->first();
        $sl = $req->so_luong;
        if ($sanPham != null) {
            $oldcart = Session('Cart') ? Session('Cart') : null;  // giỏ hàng hiện tại
            $newCart = new Cart($oldcart); // giỏ hàng khi thêm mới

            $newCart->AddCartCoSl($sanPham, $id, $sl);
            $req->session()->put('Cart', $newCart);
        }
        $gio_hang = view('home.partials.main-menu')->render();
        return response()->json([
            'gio-hang' => $gio_hang,
        ]);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function DeleteItemCart(Request $req, $id)
    {
        $oldcart = Session('Cart') ? Session('Cart') : null;  // giỏ hàng hiện tại
        $newCart = new Cart($oldcart); // giỏ hàng khi thêm mới
        $newCart->DeleteItemCart($id);
        if (Count($newCart->dsSanPham) > 0) {
            $req->session()->put('Cart', $newCart);
        } else {
            $req->session()->forget('Cart');
        }
        $gio_hang = view('home.partials.main-menu')->render();
        $thong_tin_thanh_toan = view('home.trang-gio-hang.hinh-thuc-thanh-toan')->render();
        $thong_tin_khach_hang = view('home.trang-gio-hang.thong-tin-khach-hang')->render();
        $display_gio_hang = view('home.trang-gio-hang.gio-hang')->render();
        return response()->json([
            'gio-hang' => $gio_hang,
            'hinh-thuc-thanh-toan' =>  $thong_tin_thanh_toan,
            'thong-tin-khach-hang' =>  $thong_tin_khach_hang,
            'display_gio_hang' => $display_gio_hang,
        ]);
    }

    // Cập nhật số lượng sản phẩm trong danh sách giỏ hàng
    public function UpdateItemListCart(Request $req, $id, $so_luong)
    {
        $oldcart = Session('Cart') ? Session('Cart') : null;  // giỏ hàng hiện tại
        $newCart = new Cart($oldcart); // giỏ hàng khi thêm mới
        $newCart->UpdateItemCart($id, $so_luong);
        $req->session()->put('Cart', $newCart);
        $gio_hang = view('home.partials.main-menu')->render();
        $thong_tin_thanh_toan = view('home.trang-gio-hang.hinh-thuc-thanh-toan')->render();
        $thong_tin_khach_hang = view('home.trang-gio-hang.thong-tin-khach-hang')->render();
        $display_gio_hang = view('home.trang-gio-hang.gio-hang')->render();
        return response()->json([
            'gio-hang' => $gio_hang,
            'hinh-thuc-thanh-toan' =>  $thong_tin_thanh_toan,
            'thong-tin-khach-hang' =>  $thong_tin_khach_hang,
            'display_gio_hang' => $display_gio_hang,
        ]);
    }

    //đặt hàng
    public function thanhToanDonHang(Request $request)
    {
        //bảng hóa đơn
        $khach_hang_id = auth()->id();
        $thanh_tien = $request->tong_thanh_tien;
        $khuyen_mai = 0;
        $tong_tien = $request->tong_thanh_tien;
        $trang_thai = 1;
        $ngay_thanh_toan = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $hinh_thuc_thanh_toan = $request->hinh_Thuc_thanh_toan;

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $order_comments = $request->order_comments;

        $ds_gio_hang = Session('Cart') ? Session('Cart') : null;
        if ($ds_gio_hang != null) {
            // Kiểm tra số lượng mua và số lượng trong kho
            foreach ($ds_gio_hang->dsSanPham as $val) {
                $kho = SanPham::where('id', $val['thongTinSanPham']->id)->first();
                if ((int)($kho->so_luong) < (int)($val['soLuong'])) {
                    return response()->json([
                        'status' => 'error',
                        'message' => $kho->ten_san_pham  . ' còn ' . $kho->so_luong . ' sản phẩm !',
                    ], 200);
                }
            }

            $them_don_hang = new HoaDon();
            $them_don_hang->khach_hang_id = $khach_hang_id;
            $them_don_hang->thanh_tien = $thanh_tien;
            $them_don_hang->khuyen_mai = $khuyen_mai;
            $them_don_hang->tong_tien = $tong_tien;
            $them_don_hang->trang_thai = $trang_thai;
            $them_don_hang->ngay_thanh_toan = $ngay_thanh_toan;
            $them_don_hang->phuong_thuc_thanh_toan = $hinh_thuc_thanh_toan;

            $them_don_hang->ten = $name;
            $them_don_hang->email = $email;
            $them_don_hang->sdt = $phone;
            $them_don_hang->dia_chi = $address;
            $them_don_hang->ghi_chu = $order_comments;
            $them_don_hang->created_at = $ngay_thanh_toan;
            $them_don_hang->save();

            if ($them_don_hang) {
                foreach ($ds_gio_hang->dsSanPham as $val) {
                    // Thêm thông tin vào bảng chi tiết hóa đơn
                    $them_chi_tiet = new ChiTietHoaDon();
                    $them_chi_tiet->san_pham_id = $val['thongTinSanPham']->id;
                    $them_chi_tiet->khach_hang_id = $them_don_hang->khach_hang_id;
                    $them_chi_tiet->so_luong = $val['soLuong'];
                    $them_chi_tiet->tong_tien = $val['tongCong'];
                    $them_chi_tiet->trang_thai = $them_don_hang->trang_thai;
                    $them_chi_tiet->hoa_don_id = $them_don_hang->id;

                    // Trừ số lượng tồn trong sản phẩm
                    $san_pham = SanPham::where('id', $them_chi_tiet->san_pham_id)->first();
                    $san_pham->so_luong -= $val['soLuong'];
                    $san_pham->save();

                    $them_chi_tiet->save();
                    session()->forget('Cart');
                }
                if (empty($them_don_hang->khach_hang_id)) {
                    $data = [
                        'email' => $email,
                        'url' => env('APP_URL'),
                        'hoa_don_id' => $them_don_hang->id
                    ];
                    dispatch(new sendMailTinhTrangHoaDonJob($data));
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đơn Hàng Của Bạn Đã Được Tạo Thành Công !',
                ], 200);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Không Có Sản Phẩm Trong Giỏ Hàng !',
            ], 200);
        }
    }
}
