<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoaiSanPham;

class LoaiSanPhamV2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá hoa cương',
            'parent_id' => 1,
            'slug' => 'ban_da_hoa_cuong'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn gỗ bên',
            'parent_id' => 1,
            'slug' => 'ban_go_ben'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn nhôm loại 1',
            'parent_id' => 1,
            'slug' => 'ban_da_thach_anh'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá hoa cương',
            'parent_id' => 2,
            'slug' => 'ban_da_hoa_cuong'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn gỗ tràm',
            'parent_id' => 2,
            'slug' => 'ban_go_tram'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá thạch anh',
            'parent_id' => 2,
            'slug' => 'ban_da_thach_anh'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá hoa cương',
            'parent_id' => 3,
            'slug' => 'ban_da_hoa_cuong'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn gỗ tràm',
            'parent_id' => 3,
            'slug' => 'ban_go_tram'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá thạch anh',
            'parent_id' => 3,
            'slug' => 'ban_da_thach_anh'
        ]);


        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá hoa cương',
            'parent_id' => 4,
            'slug' => 'ban_da_hoa_cuong'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn gỗ tràm',
            'parent_id' => 4,
            'slug' => 'ban_go_tram'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá thạch anh',
            'parent_id' => 4,
            'slug' => 'ban_da_thach_anh'
        ]);


        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá hoa cương',
            'parent_id' => 5,
            'slug' => 'ban_da_hoa_cuong'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn gỗ tràm',
            'parent_id' => 5,
            'slug' => 'ban_go_tram'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Bàn đá thạch anh',
            'parent_id' => 5,
            'slug' => 'ban_da_thach_anh'
        ]);


        LoaiSanPham::create([
            'ten_loai' => 'Tủ đá hoa cương',
            'parent_id' => 6,
            'slug' => 'tu_da_hoa_cuong'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Tủ gỗ tràm',
            'parent_id' => 6,
            'slug' => 'tu_go_tram'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Tủ đá thạch anh',
            'parent_id' => 6,
            'slug' => 'tu_da_thach_anh'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Giường gấp đa năng',
            'parent_id' => 7,
            'slug' => 'giuong_gap_da_nang'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Giường 2 tầng',
            'parent_id' => 7,
            'slug' => 'giuong_2_tang'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Giường 3 tầng',
            'parent_id' => 7,
            'slug' => 'giuong_3_tang'
        ]);

        LoaiSanPham::create([
            'ten_loai' => 'Giường nệm hơi',
            'parent_id' => 7,
            'slug' => 'giuong_nem_hoi'
        ]);
    }
}
