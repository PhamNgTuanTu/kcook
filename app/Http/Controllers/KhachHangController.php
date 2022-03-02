<?php

namespace App\Http\Controllers;

use App\Models\CartUser;
use App\Models\ChiTietHoaDon;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;



class KhachHangController extends Controller
{
    private $hoaDon;
    private $ctHoaDon;
    private $khachHang;
    private $gioHang;
    private $sanPham;

    public function __construct(SanPham $sanPham, HoaDon $hoaDon, ChiTietHoaDon $ctHoaDon, KhachHang $khachHang, CartUser $gioHang)
    {
        $this->hoaDon = $hoaDon;
        $this->ctHoaDon = $ctHoaDon;
        $this->khachHang = $khachHang;
        $this->gioHang = $gioHang;
        $this->sanPham = $sanPham;
    }

    public function getDangNhap()
    {
        if (Auth::check()) {
            return redirect()->route('nguoi-dung.trang_ca_nhan');
        } else {
            return view('home.dang-nhap');
        }
    }

    public function postDangNhap(request $request)
    {

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->mat_khau
        ])) {
            $checkStatus = KhachHang::where('email', $request->email)->where('deleted_at', null)->first();
            if ($checkStatus) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đăng nhập thành công',
                    'url' => '/'
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Tài khoản đã bị xóa'
                ], 201);
            }
            // return redirect('/')->with('name', Auth::user()->email);
        } else {
            // return redirect()->back()->with('status', 'Tên đăng nhập hoặc mật khẩu không đúng');
            return response()->json([
                'status' => 'error',
                'message' => 'Tên đăng nhập hoặc mật khẩu không đúng'
            ], 201);
        }
    }

    public function postDangKy(request $request)
    {
        $checkDup = KhachHang::where('email', 'like', $request->email_dang_ky)->first();
        if ($checkDup) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email đã được đăng ký! Vui lòng nhập email khác'
            ], 200);
        }
        $khachHang =  new KhachHang();
        $khachHang->email = $request->email_dang_ky;
        $khachHang->mat_khau = Hash::make($request->mat_khau_dang_ky);
        $khachHang->ho = $request->ho;
        $khachHang->ten = $request->ten;
        $khachHang->dia_chi = $request->dia_chi;
        $khachHang->so_dien_thoai = $request->so_dien_thoai;
        $khachHang->slug = Str::slug($request->ho . ' ' . $request->ten);
        $khachHang->save();
        if ($khachHang) {
            return response()->json([
                'status' => 'success',
                'message' => 'Đăng ký tài khoản thành công'
            ], 200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Đăng ký tài khoản thất bại'
        ], 200);
    }

    public function dangXuatNguoiDung()
    {
        Auth::logout();
        return redirect()->route('home.dang_nhap');
    }

    public function index()
    {
        return view('home.trang-tai-khoan.index');
    }

    public function xemDonHang($slug)
    {
        $arrSlug = explode("-", $slug);
        $id = end($arrSlug);
        $data = $this->hoaDon::orderBy('created_at', 'desc')->where('khach_hang_id', $id)->get();
        return view('home.trang-tai-khoan.don-hang', compact(['data']));
    }

    public function xemChiTietDonHang($slug)
    {
        $arrSlug = explode("-", $slug);
        $id = end($arrSlug);
        $ct_hoa_don = $this->hoaDon->where('id', $id)->first();
        return view('home.trang-tai-khoan.chi-tiet-hoa-don', compact(['ct_hoa_don']));
    }

    public function checkVangLaiHoaDon($hoaDonId)
    {   
        $isNotTaiKhoan = true;
        $ct_hoa_don = $this->hoaDon->where('id', $hoaDonId)->first();
        return view('home.trang-tai-khoan.chi-tiet-hoa-don', compact(['ct_hoa_don', 'isNotTaiKhoan']));
    }

    public function huyDonHang(Request $request, $slug)
    {
        $arrSlug = explode("-", $slug);
        $id = end($arrSlug);
        $data = [
            'trang_thai' => $request->trang_thai
        ];
        try {
            $this->hoaDon->find($id)->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Đã hủy đơn hàng !',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể hủy đơn hàng !',
            ], 200);
        }
    }

    public function thongTinCaNhan($slug)
    {
        $arrSlug = explode("-", $slug);
        $id = end($arrSlug);
        $data = $this->khachHang->where('id', $id)->first();
        return view('home.trang-tai-khoan.thong-tin-ca-nhan', compact(['data']));
    }

    public function postThongTinCaNhan(Request $request, $slug)
    {
        $arrSlug = explode("-", $slug);
        $id = end($arrSlug);
        if (!empty($request->mat_khau) && !empty($request->mat_khau_moi) && !empty($request->mat_khau_moi_confirm)) {
            $user = auth()->user();
            // check old password
            $checkPassword = Hash::check($request->mat_khau, $user->password);
            $data = [
                'ho' => $request->ho,
                'ten' => $request->ten,
                'email' => $request->email,
                'dia_chi' => $request->dia_chi,
                'so_dien_thoai' => $request->so_dien_thoai,
                'slug' => Str::slug($request->ho . ' ' . $request->ten),
            ];
            if ($checkPassword) {
                $data["mat_khau"] = bcrypt($request->mat_khau_moi_confirm);
                try {
                    $this->khachHang->find($id)->update($data);
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Cập nhật thông tin thành công',
                    ], 200);
                } catch (Exception $e) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Không thể cập nhật thông tin',
                    ], 201);
                }
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Sai mật khẩu',
            ], 201);
        } else {
            $data = [
                'ho' => $request->ho,
                'ten' => $request->ten,
                'email' => $request->email,
                'dia_chi' => $request->dia_chi,
                'so_dien_thoai' => $request->so_dien_thoai,
                'slug' => Str::slug($request->ho . ' ' . $request->ten),
            ];
            try {
                $this->khachHang->find($id)->update($data);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Cập nhật thông tin thành công',
                ], 200);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không thể cập nhật thông tin',
                ], 201);
            }
        }
    }

    public function xemGioHang($slug)
    {
        $arrSlug = explode("-", $slug);
        $id = end($arrSlug);
        $data = $this->gioHang->where('khach_hang_id', $id)->get();
        return view('home.trang-tai-khoan.gio-hang-user', compact(['data']));
    }

    public function themGioHang($id)
    {
        $data = $this->gioHang->where('san_pham_id', $id)->first();
        $sanPham = $this->sanPham->where('id', $id)->first();
        $khach_hang_id = auth()->id();
        if (!empty($data)) {
            $res = [
                'so_luong' => $data['so_luong'] + 1,
                'tong_tien' => $data['tong_tien'] + $sanPham->gia_ban,
                'khuyen_mai' => 0,
                'thanh_tien' => $data['tong_tien'] + $sanPham->gia_ban,
            ];
            $this->gioHang->where('san_pham_id', $id)->update($res);
            $gio_hang = view('home.partials.main-menu')->render();
            return response()->json([
                'gio-hang' => $gio_hang,
            ]);
        } else {
            $res = [
                'san_pham_id' => $id,
                'khach_hang_id' => $khach_hang_id,
                'so_luong' =>  1,
                'tong_tien' => $sanPham->gia_ban,
                'khuyen_mai' => 0,
                'thanh_tien' => $sanPham->gia_ban
            ];
            $this->gioHang->where('san_pham_id', $id)->create($res);
            $gio_hang = view('home.partials.main-menu')->render();
            return response()->json([
                'gio-hang' => $gio_hang,
            ]);
        }
    }

    // Thêm sản phẩm vào giỏ hàng có số lượng
    public function AddCartWithQuantity(Request $req, $id)
    {
        $data = $this->gioHang->where('san_pham_id', $id)->first();
        $sanPham = $this->sanPham->where('id', $id)->first();
        $sl = $req->so_luong;
        $khach_hang_id = auth()->id();
        if (!empty($data)) {
            $res = [
                'so_luong' => $data['so_luong'] + $sl,
                'tong_tien' =>  $data['tong_tien'] + ($sl * $sanPham->gia_ban),
                'khuyen_mai' => 0,
                'thanh_tien' => $data['tong_tien'] + ($sl * $sanPham->gia_ban),
            ];
            $this->gioHang->where('san_pham_id', $id)->update($res);
            $gio_hang = view('home.partials.main-menu')->render();
            return response()->json([
                'gio-hang' => $gio_hang,
            ]);
        } else {
            $res = [
                'san_pham_id' => $id,
                'khach_hang_id' => $khach_hang_id,
                'so_luong' =>  $sl,
                'tong_tien' => $sl * $sanPham->gia_ban,
                'khuyen_mai' => 0,
                'thanh_tien' => $sl * $sanPham->gia_ban
            ];
            $this->gioHang->where('san_pham_id', $id)->create($res);
            $gio_hang = view('home.partials.main-menu')->render();
            return response()->json([
                'gio-hang' => $gio_hang,
            ]);
        }
    }

    public function xoaGioHang($id)
    {
        $this->gioHang->where('san_pham_id', $id)->delete();
        $gio_hang = view('home.partials.main-menu')->render();
        $thong_tin_thanh_toan = view('home.trang-tai-khoan.hinh-thuc-thanh-toan')->render();
        $thong_tin_khach_hang = view('home.trang-tai-khoan.thong-tin-khach-hang')->render();
        $display_gio_hang = view('home.trang-tai-khoan.gio-hang')->render();
        return response()->json([
            'gio-hang' => $gio_hang,
            'hinh-thuc-thanh-toan' =>  $thong_tin_thanh_toan,
            'thong-tin-khach-hang' =>  $thong_tin_khach_hang,
            'display_gio_hang' => $display_gio_hang,
        ]);
    }

    public function capNhatGioHang($id, $sl)
    {
        $data = $this->gioHang->where('san_pham_id', $id)->first();
        $sanPham = $this->sanPham->where('id', $id)->first();
        if (!empty($data)) {
            $res = [
                'so_luong' => $sl,
                'tong_tien' => $sl * $sanPham->gia_ban,
                'khuyen_mai' => 0,
                'thanh_tien' => $sl * $sanPham->gia_ban,
            ];
            $this->gioHang->where('san_pham_id', $id)->update($res);
            $gio_hang = view('home.partials.main-menu')->render();
            $thong_tin_thanh_toan = view('home.trang-tai-khoan.hinh-thuc-thanh-toan')->render();
            $thong_tin_khach_hang = view('home.trang-tai-khoan.thong-tin-khach-hang')->render();
            $display_gio_hang = view('home.trang-tai-khoan.gio-hang')->render();
            return response()->json([
                'gio-hang' => $gio_hang,
                'hinh-thuc-thanh-toan' =>  $thong_tin_thanh_toan,
                'thong-tin-khach-hang' =>  $thong_tin_khach_hang,
                'display_gio_hang' => $display_gio_hang,
            ]);
        }
    }

    public function thanhToanGioHang(Request $request, $slug)
    {
        $arrSlug = explode("-", $slug);
        $id = end($arrSlug);
        //bảng hóa đơn
        $khach_hang_id = auth()->id();
        $thanh_tien = $request->tong_thanh_tien;
        $khuyen_mai = 0;
        $tong_tien = $request->tong_thanh_tien;
        $trang_thai = 1;
        $ngay_dat = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $hinh_thuc_thanh_toan = $request->hinh_Thuc_thanh_toan;

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $order_comments = $request->order_comments;

        // $ds_gio_hang = Session('Cart') ? Session('Cart') : null;
        $ds_gio_hang = $this->gioHang->where('khach_hang_id', $id)->get();
        if ($ds_gio_hang != null) {
            // Kiểm tra số lượng mua và số lượng trong kho
            foreach ($ds_gio_hang as $val) {
                $kho = SanPham::where('id', $val->san_pham_id)->first();
                if ((int)($kho->so_luong) < (int)($val->so_luong)) {
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
            $them_don_hang->ngay_thanh_toan = $ngay_dat;
            $them_don_hang->phuong_thuc_thanh_toan = $hinh_thuc_thanh_toan;

            $them_don_hang->ten = $name;
            $them_don_hang->email = $email;
            $them_don_hang->sdt = $phone;
            $them_don_hang->dia_chi = $address;
            $them_don_hang->ghi_chu = $order_comments;
            $them_don_hang->created_at = $ngay_dat;
            $them_don_hang->save();

            if ($them_don_hang) {
                foreach ($ds_gio_hang as $val) {
                    // Thêm thông tin vào bảng chi tiết hóa đơn
                    $them_chi_tiet = new ChiTietHoaDon();
                    $them_chi_tiet->san_pham_id = $val->san_pham_id;
                    $them_chi_tiet->khach_hang_id = $them_don_hang->khach_hang_id;
                    $them_chi_tiet->so_luong = $val->so_luong;
                    $them_chi_tiet->tong_tien = $val->thanh_tien;
                    $them_chi_tiet->trang_thai = $them_don_hang->trang_thai;
                    $them_chi_tiet->hoa_don_id = $them_don_hang->id;

                    // Trừ số lượng tồn trong sản phẩm
                    $san_pham = SanPham::where('id', $them_chi_tiet->san_pham_id)->first();
                    $san_pham->so_luong -= $val->so_luong;
                    $san_pham->save();

                    $them_chi_tiet->save();

                    $this->gioHang->where('san_pham_id', $val->san_pham_id)->delete();
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đơn Hàng Của Bạn Đã Được Tạo Thành Công !',
                    'id' => $them_don_hang->id,
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
