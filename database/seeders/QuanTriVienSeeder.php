<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quan_tri_vien')->insert([
            'ten_dang_nhap' => 'admin',
            'mat_khau' => Hash::make('123456'),
        ]);
    }
}
