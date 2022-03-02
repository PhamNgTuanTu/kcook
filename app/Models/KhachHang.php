<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'khach_hang';
    protected $guard = 'user';

    protected $fillable = [
        'ho', 'ten', 'avatar', 'slug', 'email', 'mat_khau', 'dia_chi', 'so_dien_thoai'
    ];

    protected $hidden = [
        'mat_khau'
    ];

    public function getPasswordAttribute()
    {
        return $this->mat_khau;
    }
}
