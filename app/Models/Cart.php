<?php

namespace App\Models;

class Cart
{
    public $dsSanPham = null; //Danh sách sản phẩm
    public $tongSoLuong = 0; //Tổng số lượng
    public $tongCong = 0; //Tổng tiền khuyến mãi

    public function __construct($cart)
    {
        if ($cart) {
            $this->dsSanPham = $cart->dsSanPham;
            $this->tongSoLuong = $cart->tongSoLuong;
            $this->tongCong = $cart->tongCong;
        }
    }

    // Thêm sản phẩm vào giỏ hàng
    public function AddCart($sanPham, $id)
    {
        $sanPhamMoi = [
            'soLuong' => 0,
            'tongCong' => $sanPham->gia_ban,
            'thongTinSanPham' => $sanPham
        ];
        // Nếu sản phẩm đã tồn tại
        if ($this->dsSanPham) {
            // Nếu tồn tại cái id trong cái product này
            if (array_key_exists($id, $this->dsSanPham)) {
                $sanPhamMoi = $this->dsSanPham[$id];
            }
        }
        $sanPhamMoi['soLuong']++;
        $sanPhamMoi['tongCong'] = (int)($sanPhamMoi['soLuong'] * $sanPham->gia_ban);

        $this->tongSoLuong++;
        $this->tongCong += (int)$sanPham->gia_tien;
        $this->dsSanPham[$id] = $sanPhamMoi;
    }

    // Thêm sản phẩm vào giỏ hàng
    public function AddCartCoSl($sanPham, $id, $sl)
    {
        $sanPhamMoi = [
            'soLuong' => 0,
            'tongCong' => $sanPham->gia_ban,
            'thongTinSanPham' => $sanPham
        ];
        // Nếu sản phẩm đã tồn tại
        if ($this->dsSanPham) {
            // Nếu tồn tại cái id trong cái product này
            if (array_key_exists($id, $this->dsSanPham)) {
                $sanPhamMoi = $this->dsSanPham[$id];
            }
        }
        $sanPhamMoi['soLuong'] += $sl;
        $sanPhamMoi['tongCong'] = (int)($sanPhamMoi['soLuong'] * $sanPham->gia_ban);

        $this->tongSoLuong += $sl;
        $this->tongCong += (int)$sanPham->gia_tien;
        $this->dsSanPham[$id] = $sanPhamMoi;
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function DeleteItemCart($id)
    {
        $this->tongSoLuong -= $this->dsSanPham[$id]['soLuong'];
        $this->tongCong -= $this->dsSanPham[$id]['tongCong'];
        // Xóa bỏ
        unset($this->dsSanPham[$id]);
    }

    // Cập nhật sản phẩm trong giỏ hàng
    public function UpdateItemCart($id, $so_luong)
    {
        $this->tongSoLuong -= $this->dsSanPham[$id]['soLuong'];
        $this->tongCong -= $this->dsSanPham[$id]['tongCong'];

        $this->dsSanPham[$id]['soLuong'] = $so_luong;
        $this->dsSanPham[$id]['tongCong'] = $so_luong * (int)($this->dsSanPham[$id]['thongTinSanPham']->gia_ban);

        $this->tongSoLuong += $this->dsSanPham[$id]['soLuong'];
        $this->tongCong += $this->dsSanPham[$id]['tongCong'];
    }
}
