<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->integer('phuong_thuc_thanh_toan')->after('trang_thai')->default(0);
            $table->integer('tinh_trang_thanh_toan')->after('phuong_thuc_thanh_toan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->dropColumn('phuong_thuc_thanh_toan');
            $table->dropColumn('tinh_trang_thanh_toan');
        });
    }
}
