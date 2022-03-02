<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoaiSanPham;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*LoaiSanPham::create([
            'ten_loai' => 'Bàn làm việc văn phòng',
            'parent_id' => null,
            'slug' => 'ban_lam_viec_van_phong'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn giám đốc',
            'parent_id' => null,
            'slug' => 'ban_giam_doc'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn họp',
            'parent_id' => null,
            'slug' => 'ban_hop'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn làm việc tại nhà',
            'parent_id' => null,
            'slug' => 'ban_lam_viec_Tai_nha'
        ]);


        LoaiSanPham::create([
            'ten_loai' => 'Bàn quầy lễ tiếp tân',
            'parent_id' => null,
            'slug' => 'ban_quay_le_tiep_tan'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Tủ quần áo',
            'parent_id' => null,
            'slug' => 'tu_quan_ao'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Giường ngủ',
            'parent_id' => null,
            'slug' => 'giuong_ngu'
        ]);*/

         LoaiSanPham::create([
            'ten_loai' => 'Bàn trang điểm',
            'parent_id' => null,
            'slug' => 'ban_trang_diem'
        ]);
    }
}
