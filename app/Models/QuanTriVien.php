<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanTriVien extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'quan_tri_vien';
    protected $guard = 'admin';

    protected $fillable = [
        'ten_dang_nhap', 'mat_khau', 'loai_tai_khoan',
    ];

    protected $hidden = [
        'mat_khau'
    ];

    public function getPasswordAttribute()
    {
    	return $this->mat_khau;
    }
}
