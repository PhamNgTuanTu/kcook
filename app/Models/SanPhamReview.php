<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPhamReview extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'email', 'comment', 'rating', 'san_pham_id'];
}
