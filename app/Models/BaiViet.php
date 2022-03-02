<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class BaiViet extends Model
{
    use Notifiable, SoftDeletes, Sortable;

    protected $table = 'bai_viet';
    
    protected $fillable = [
        'tieu_de', 'phu_de', 'noi_dung', 'loai_bai_viet', 'anh', 'slug', 'meta_title', 'meta_description', 'created_at'
    ];

    protected $appends = [
        'format_ngay'
    ];

    public $sortable = ['tieu_de', 'loai_bai_viet', 'created_at'];

    public function getFormatNgayAttribute()
    {
        if(empty($this->created_at)){
            return 'N/A';
        }
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        $date->setTimezone('Asia/Ho_Chi_Minh');
        return date('d/m/Y H:i:s', strtotime($date)) ;
        // return date('d-m-Y H:i:s', strtotime($this->created_at)) ;
    }

    public function scopeQueryData($query, $req)
    {
        if (!empty($req['tieu_de'])) {
            $query->where('tieu_de', 'like', "%{$req['tieu_de']}%");
        }

        if (!empty($req['loai_bai_viet'])) {
            if ($req['loai_bai_viet'] === "all") {
                $query->get();
            } else {
                $query->where('loai_bai_viet', 'like', "%{$req['loai_bai_viet']}%");
            }
        }

        return $query;
    }
    
}
