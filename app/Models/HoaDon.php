<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class HoaDon extends Model
{
    use HasFactory;
    use SoftDeletes, Sortable;
    protected $table = 'hoa_don';
    protected $fillable = [
        'id', 'khach_hang_id', 'thanh_tien', 'khuyen_mai', 'tong_tien', 'trang_thai', 'ngay_thanh_toan', 'phuong_thuc_thanh_toan',
        'tinh_trang_thanh_toan', 'created_at', 'ten', 'email', 'sdt', 'dia_chi', 'ghi_chu', 'ngay_giao'
    ];
    protected $appends = [
        'so_luong', 'ho_ten', 'format_ngay', 'str_trang_thai', 'ngay_tao', 'format_tien', 'format_trang_thai', 'format_ngay_giao'
    ];

    public $sortable = ['ten', 'sdt', 'id', 'thanh_tien', 'phuong_thuc_thanh_toan', 'trang_thai', 'created_at', 'ngay_giao'];

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id', 'id');
    }

    public function ctHoaDon()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'hoa_don_id');
    }

    public function getSoLuongAttribute()
    {
        return $this->ctHoaDon()->count();
    }

    public function getHoTenAttribute()
    {
        if (!empty($this->khachHang)) {
            return $this->khachHang->ho . " " . $this->khachHang->ten;
        }
        return "";
    }

    public function getFormatNgayAttribute()
    {
        if (empty($this->ngay_thanh_toan)) {
            return '';
        }
        return date('d/m/Y H:i:s', strtotime($this->ngay_thanh_toan));
    }

    public function getNgayTaoAttribute()
    {
        if (empty($this->created_at)) {
            return 'N/A';
        }
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        $date->setTimezone('Asia/Ho_Chi_Minh');
        return date('d/m/Y H:i:s', strtotime($date));
    }

    public function getFormatNgayGiaoAttribute()
    {
        if (empty($this->ngay_giao)) {
            return '';
        }
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->ngay_giao);
        $date->setTimezone('Asia/Ho_Chi_Minh');
        return date('d/m/Y H:i:s', strtotime($date));
    }

    public function getStrTrangThaiAttribute()
    {
        if ($this->trang_thai == 1) {
            return '<span class="badge badge-info  inv-status" style="width: 100%;">Mới tạo</span>';
        }
        if ($this->trang_thai == 2) {
            return '<span class="badge badge-primary  inv-status" style="width: 100%;">Đã duyệt</span>';
        }
        if ($this->trang_thai == 3) {
            return '<span class="badge badge-warning  inv-status" style="width: 100%;">Đang giao</span>';
        }
        if ($this->trang_thai == 4) {
            return '<span class="badge badge-success inv-status" style="width: 100%;">Hoàn thành</span>';
        }
        if ($this->trang_thai == 5) {
            return '<span class="badge badge-danger inv-status" style="width: 100%;">Hủy</span>';
        }
    }

    public function getFormatTrangThaiAttribute()
    {
        if ($this->trang_thai == 1) {
            return '<span class="badge badge-info  inv-status" style="width: 30%;">Mới tạo</span>';
        }
        if ($this->trang_thai == 2) {
            return '<span class="badge badge-primary  inv-status" style="width: 30%;">Đã duyệt</span>';
        }
        if ($this->trang_thai == 3) {
            return '<span class="badge badge-warning  inv-status" style="width: 30%;">Đang giao</span>';
        }
        if ($this->trang_thai == 4) {
            return '<span class="badge badge-success inv-status" style="width: 30%;">Hoàn thành</span>';
        }
        if ($this->trang_thai == 5) {
            return '<span class="badge badge-danger inv-status" style="width: 30%;">Hủy</span>';
        }
    }

    public function getFormatTienAttribute()
    {
        return number_format($this->thanh_tien);
    }

    public function scopeSelectDate($query)
    {
        $now = Carbon::now();
        if ((Carbon::now()->dayOfWeek) == 0) {
            $day_mon = Carbon::now()->subDay(6);
        }

        if ((Carbon::now()->dayOfWeek) == 1) {
            $day_mon = Carbon::now();
        }
        if ((Carbon::now()->dayOfWeek) > 1) {
            $day_mon = Carbon::now()->subDay((Carbon::now()->dayOfWeek) - 1);
        }

        // dd($day_mon->setTime(0,0,0));
        $day_check = $day_mon->setTime(0, 0, 0);
        // $day_create = Carbon::parse($hd->created_at);
        // dd($day_mon->lessThanOrEqualTo($day_create));
        // if( $day_check->lessThanOrEqualTo($day_create)){
        //     $ds_hoa_don[]= $hd;
        // }
        // dd($strQuery);
        return $query->whereDate('created_at', '>=', $day_check);
    }

    public function scopeQueryData($query, $req)
    {
        if (!empty($req['ten_khach_hang'])) {
            $query->where('ten', 'like', "%{$req['ten_khach_hang']}%");
        }

        if (!empty($req['sdt'])) {
            $query->where('sdt', 'like', "%{$req['sdt']}%");
        }

        if (!empty($req['phuong_thuc_thanh_toan'])) {
            if ($req['phuong_thuc_thanh_toan'] === "all") {
                $query->get();
            } else {
                $query->where('phuong_thuc_thanh_toan', 'like', "%{$req['phuong_thuc_thanh_toan']}%");
            }
        }

        if (!empty($req['trang_thai'])) {
            if ($req['trang_thai'] === "all") {
                $query->get();
            } else {
                $query->where('trang_thai', 'like', "%{$req['trang_thai']}%");
            }
        }

        if (!empty($req['ngay_bat_dau']) && !empty($req['ngay_ket_thuc'])) {
            $date1 = str_replace('/', '-', $req['ngay_bat_dau']);
            $date2 = str_replace('/', '-', $req['ngay_ket_thuc']);

            $day1 = date('Y-m-d', strtotime($date1));
            $day2 = date('Y-m-d', strtotime($date2));

            $query->whereDate('created_at', '>=', $day1)->whereDate('created_at', '<=', $day2);
        }
        return $query;
    }

    // public function tenSortable($query, $direction) {
    //     return $query->join('khach_hang as kh', 'hoa_don.khach_hang_id', 'kh.id')
    //                  ->whereNull('kh.deleted_at')
    //                  ->orderBy('kh.ten', $direction)
    //                  ->select('hoa_don.*');
    // }
    // public function scopeQueryData($query, $req) {
    //     if (!empty($req['flt_no'])) {
    //         $query->where('flt_no', 'like', "%{$req['flt_no']}%");
    //     }

    //     if (!empty($req['airline'])) {
    //         $query->where('airline_id', $req['airline']);
    //     }

    //     if (!empty($req['dep'])) {
    //         $query->where('dep', 'like', "%{$req['dep']}%");
    //     }

    //     if (!empty($req['arr'])) {
    //         $query->where('arr', 'like', "%{$req['arr']}%");
    //     }
    //     // $timeZone = (Date_::getTime() == 'Zulu') ? '+00:00' : Date_::getTime(). ':00';
    //     if (!empty($req['from']) && !empty($req['to'])) {
    //         $req['from'] = date_format(date_create_from_format(Date_::getDate(), $req['from']), 'Y-m-d');
    //         $req['to'] = date_format(date_create_from_format(Date_::getDate(), $req['to']), 'Y-m-d');
    //         // 
    //         // dd($req['to']);
    //         $convention = "
    //             DATE_FORMAT(CONCAT(flight_schedules.dep_date, ' ', flight_schedules.std), '%Y-%m-%d') >= '{$req['from']}' AND DATE_FORMAT(CONCAT(flight_schedules.dep_date, ' ', flight_schedules.std), '%Y-%m-%d') <= '{$req['to']}'
    //         ";
    //         $query->whereRaw($convention);
    //     } else if (!empty($req['from']) && empty($req['to'])) {
    //         $req['from'] = date_format(date_create_from_format(Date_::getDate(), $req['from']), 'Y-m-d');
    //         $query->whereRaw("
    //             DATE_FORMAT(CONCAT(flight_schedules.dep_date, ' ', flight_schedules.std), '%Y-%m-%d') >= '{$req['from']}'
    //         ");
    //     } else if (empty($req['from']) && !empty($req['to'])) {
    //         $req['to'] = date_format(date_create_from_format(Date_::getDate(), $req['to']), 'Y-m-d');
    //         $query->whereRaw("
    //             DATE_FORMAT(CONCAT(flight_schedules.dep_date, ' ', flight_schedules.std),'%Y-%m-%d') <= '{$req['to']}'
    //         ");
    //     }

    //     return $query;
    // }
}
