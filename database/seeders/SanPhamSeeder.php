<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SanPham;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*SanPham::create([
            'ten_san_pham' => 'Bàn đá Acus',
            'ma_san_pham' => 'ms_001',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 360000,
            'so_luong' => 26,
            'gia_ban' => 400000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_da_acus',
            'meta_description' => 'ban_da_acus...',
            'slug' => 'ban_da_acus'
        ]);

        SanPham::create([
            'ten_san_pham' => 'Bàn gỗ Bên Metatinic - 2',
            'ma_san_pham' => 'ms_002',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 500000,
            'so_luong' => 41,
            'gia_ban' => 599000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_da_metatinic_2',
            'meta_description' => 'ban_da_metatinic_2...',
            'slug' => 'ban_da_metatinic_2'
        ]);

        SanPham::create([
            'ten_san_pham' => 'Bàn đá hoa cương Tân Tân',
            'ma_san_pham' => 'ms_003',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 190000,
            'so_luong' => 77,
            'gia_ban' => 250000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_da_tan_tan',
            'meta_description' => 'ban_da_tan_tan...',
            'slug' => 'ban_da_tan_tan'
        ]);

        SanPham::create([
            'ten_san_pham' => 'Bàn đá hoa cương Tân Tân 2',
            'ma_san_pham' => 'ms_004',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 200000,
            'so_luong' => 77,
            'gia_ban' => 530000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_da_tan_tan',
            'meta_description' => 'ban_da_tan_tan_2...',
            'slug' => 'ban_da_tan_tan_2'
        ]);

        SanPham::create([
            'ten_san_pham' => 'Bàn gỗ điêu khắc',
            'ma_san_pham' => 'ms_005',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 200000,
            'so_luong' => 77,
            'gia_ban' => 420000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_da_dieu_khac',
            'meta_description' => 'ban_da_dieu_khac...',
            'slug' => 'ban_da_dieu_khac'
        ]);

        SanPham::create([
            'ten_san_pham' => 'Bàn gỗ điêu khắc Hồng Sơn',
            'ma_san_pham' => 'ms_006',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 60000,
            'so_luong' => 77,
            'gia_ban' => 110000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_da_dieu_khac_hong_son',
            'meta_description' => 'ban_da_dieu_khac_hong_son...',
            'slug' => 'ban_da_dieu_khac_hong_son'
        ]);


        SanPham::create([
            'ten_san_pham' => 'Bàn gỗ điêu khắc Như Huỳnh',
            'ma_san_pham' => 'ms_007',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 60000,
            'so_luong' => 77,
            'gia_ban' => 140000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_da_dieu_khac_nhu_huynh',
            'meta_description' => 'ban_da_dieu_khac_nhu_huynh...',
            'slug' => 'ban_da_dieu_khac_nhu_huynh'
        ]);

        SanPham::create([
            'ten_san_pham' => 'Bàn gỗ điêu khắc Như Huỳnh 2',
            'ma_san_pham' => 'ms_008',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 60000,
            'so_luong' => 77,
            'gia_ban' => 200000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_da_dieu_khac_nhu_huynh_2',
            'meta_description' => 'ban_da_dieu_khac_nhu_huynh_2...',
            'slug' => 'ban_da_dieu_khac_nhu_huynh_2'
        ]);


        SanPham::create([
            'ten_san_pham' => 'Bàn gỗ trầm hương Leeave',
            'ma_san_pham' => 'ms_009',
            'mo_ta' => 'Cải thiện không gian làm việc tốt...',
            'gia_goc' => 190000,
            'so_luong' => 77,
            'gia_ban' => 200000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_go_tram_leeave',
            'meta_description' => 'ban_go_tram_leeave...',
            'slug' => 'ban_go_tram_leeave'
        ]);

        SanPham::create([
            'ten_san_pham' => 'Bàn gỗ trầm hương Lạng Sơn',
            'ma_san_pham' => 'ms_010',
            'mo_ta' => 'Bàn gỗ trầm hương Lạng Sơn...',
            'gia_goc' => 190000,
            'so_luong' => 77,
            'gia_ban' => 200000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_go_tram_huong_lang_son',
            'meta_description' => 'ban_go_tram_huong_lang_son...',
            'slug' => 'ban_go_tram_huong_lang_son'
        ]);

        SanPham::create([
            'ten_san_pham' => 'Bàn gỗ trầm hương Ninh Thuận',
            'ma_san_pham' => 'ms_011',
            'mo_ta' => 'Bàn gỗ trầm hương Ninh Thuận...',
            'gia_goc' => 400000,
            'so_luong' => 77,
            'gia_ban' => 560000,
            'loai_san_pham_id' => 8,
            'nhom_loai_san_pham_id' => 1,
            'trang_thai' => 1,
            'meta_title' => 'ban_go_tram_huong_ninh_thuan',
            'meta_description' => 'ban_go_tram_huong_ninh_thuan...',
            'slug' => 'ban_go_tram_huong_ninh_thuan'
        ]);*/

        SanPham::create([
            'ten_san_pham' => 'Bàn trang điểm gỗ trầm hương',
            'ma_san_pham' => 'ms_011',
            'mo_ta' => 'Bàn trang điểm...',
            'gia_goc' => 420000,
            'so_luong' => 77,
            'gia_ban' => 520000,
            'loai_san_pham_id' => 30,
            'nhom_loai_san_pham_id' => 30,
            'trang_thai' => 1,
            'meta_title' => 'ban_trang_diem_go_tram_huong',
            'meta_description' => 'ban_trang_diem_go_tram_huong...',
            'slug' => 'ban_trang_diem_go_tram_huong'
        ]);
    }
}
