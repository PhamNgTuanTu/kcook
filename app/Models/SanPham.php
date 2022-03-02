<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class SanPham extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'san_pham';

    protected $fillable = [
        'id',
        'ten_san_pham', 'ma_san_pham', 'mo_ta', 'gia_goc', 'so_luong', 'gia_ban', 'loai_san_pham_id', 'nhom_loai_san_pham_id',
        'trang_thai', 'meta_title', 'meta_description', 'slug'
    ];

    protected $appends = [
        'format_gia_ban', 'format_gia_goc'
    ];

    public function loai_sp()
    {
        return $this->belongsTo(LoaiSanPham::class, 'loai_san_pham_id', 'id')->withTrashed();
    }

    public function hinh_anh()
    {
        return $this->hasMany(HinhAnh::class, 'san_pham_id', 'id');
    }

    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach ($words as $key => $word) {
            /*
        * applying + operator (required word) only big words
        * because smaller ones are not indexed by mysql
        */
            if (strlen($word) >= 1) {
                $words[$key] = '+' . $word  . '*';
            }
        }

        $searchTerm = implode(' ', $words);

        return $searchTerm;
    }

    public function scopeFullTextSearch($query, $columns, $term)
    {
        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($term));
        return $query;
    }

    public function getFormatGiaBanAttribute()
    {
        return number_format($this->gia_ban);
    }

    public function getFormatGiaGocAttribute()
    {
        return number_format($this->gia_goc);
    }

    public function scopeQueryData($query, $req)
    {
        if (!empty($req['ten_san_pham'])) {
            $query->where('ten_san_pham', 'like', "%{$req['ten_san_pham']}%");
        }

        if (!empty($req['ma_san_pham'])) {
            $query->where('ma_san_pham', 'like', "%{$req['ma_san_pham']}%");
        }

        if (!empty($req['loai_san_pham'])) {
            if ($req['loai_san_pham'] === "all") {
                $query->get();
            } else {
                $query->where('loai_san_pham_id', 'like', "%{$req['loai_san_pham']}%");
            }
        }

        if (!empty($req['trang_thai'])) {
            if ($req['trang_thai'] === "all") {
                $query->get();
            } else {
                $query->where('trang_thai', 'like', "%{$req['trang_thai']}%");
            }
        }

        return $query;
    }
}
