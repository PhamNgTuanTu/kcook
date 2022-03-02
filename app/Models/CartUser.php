<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartUser extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cart';
    protected $fillable = [
        'san_pham_id',
        'khach_hang_id',
        'so_luong',
        'tong_tien',
        'khuyen_mai',
        'thanh_tien'
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class,'san_pham_id','id');
    }
}
