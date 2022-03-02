<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\LoaiSanPham;
use App\Models\BaiViet;

class HomeController extends Controller
{
    public function home()
    {
        $page = "home";
        $listTinTuc = BaiViet::orderBy('created_at', 'desc')->where('loai_bai_viet', 1)->take(3)->get();
        return view(config('template.homeTemplateBladeURL') . 'home', compact('listTinTuc', $listTinTuc, 'page'));
    }

    public function dangNhap()
    {
        return view(config('template.homeTemplateBladeURL') . 'dang-nhap');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->mat_khau])) {
            return redirect()->route('home.home');
        } else {
            return redirect()->route('home.dang_nhap')->with("login", "email hoặc mật khẩu không đúng");
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('home.home');
    }

    public function trangdonHang()
    {
        $listDonHang  = array();
        $item =  (object) [
            "name" => "Bàn đa năng",
            "so_luong" => 2,
            "tong_tien" => 500000,
            "don_gia" => 250000,
            "status" => "Đâng vận chuyển",
            "created_at" => "20/12/2021"
        ];
        array_push($listDonHang, $item);
        array_push($listDonHang, $item);
        array_push($listDonHang, $item);
        array_push($listDonHang, $item);
        array_push($listDonHang, $item);
        return view(config('template.homeTemplateBladeURL') . 'trang-tai-khoan.don-hang', compact('listDonHang'));
    }

    public function dangKy(Request $request)
    {
        $validated_data = [
            'email'          => 'required',
            'mat_khau'       => 'required',
            'dia_chi'        => 'required',
            'so_dien_thoai'  => 'required|integer'
        ];
        $message = [
            'email.required'            => 'Email không được trống',
            'mat_khau.required'         => 'vui lòng nhập mật khẩu',
            'dia_chi.required'          => 'Địa chỉ không được trống',
            'so_dien_thoai.required'    => 'Số điện thoại không được trống',
            'so_dien_thoai.integer'     => 'Số điện thoại sai định dạng',
        ];
        Validator::make($request->all(), $validated_data, $message)->validate();

        $khachHang =  new KhachHang;
        $khachHang->email = $request->email;
        $khachHang->mat_khau = Hash::make($request->mat_khau);
        $khachHang->dia_chi = $request->dia_chi;
        $khachHang->so_dien_thoai = $request->so_dien_thoai;
        $khachHang->save();
        if ($khachHang)
            return redirect()->route('home.home')->with('status', 'Đăng ký thành công');
        return redirect()->back()->with('status', 'Lỗi đăng ký tài khoản');
    }
}
