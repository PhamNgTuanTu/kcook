<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColDanhGiaTableSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('san_pham', function (Blueprint $table) {
            $table->float('danh_gia')->default(0)->after('nhom_loai_san_pham_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('san_pham', function (Blueprint $table) {
            $table->float('danh_gia')->default(0)->after('nhom_loai_san_pham_id');
        });
    }
}
