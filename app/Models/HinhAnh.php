<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class HinhAnh extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'hinh_anh';

    protected $fillable = [
        'url', 'ten_anh', 'san_pham_id', 'loai_anh', 'slug','cau_hinh_id'
    ];
}
