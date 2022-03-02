<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Null_;

class CauHinh extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'cau_hinh';

    protected $fillable = [
        'logo', 'tru_so_chinh', 'so_dien_thoai', 'email', 'chi_nhanh', 'hotline', 'banner'
    ];

    protected $appends = [
        'slide_show'
    ];

    public function sildeShow()
    {
        return $this->hasMany(HinhAnh::class,'cau_hinh_id');
    }

    public function getSlideShowAttribute()
    {   
        $arr = [];
        foreach($this->sildeShow as $dataitem){
            array_push($arr, $dataitem->url);
        }
        return $arr;
    }
}
