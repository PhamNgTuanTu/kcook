<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_hoa_don';
    protected $fillable = [
        'san_pham_id', 'khach_hang_id', 'so_luong', 'tong_tien', 'trang_thai', 'hoa_don_id'
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class,'san_pham_id','id');
    }

    public function hoaDon()
    {
        return $this->belongsTo(SanPham::class,'hoa_don_id','id');
    }
}
