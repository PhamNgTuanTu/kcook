<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LienHe extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'lien_he';
    protected $fillable = [
        'ho_ten', 'email', 'so_dien_thoai', 'noi_dung'
    ];
}
