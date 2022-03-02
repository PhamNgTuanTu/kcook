<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMoTaToSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('san_pham', function (Blueprint $table) {
            $table->longText('mo_ta')->nullable()->change();
            $table->integer('gia_goc')->nullable()->change();
            $table->integer('gia_ban')->nullable()->change();
        });
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->integer('thanh_tien')->nullable()->change();
            $table->integer('khuyen_mai')->nullable()->change();
            $table->integer('tong_tien')->nullable()->change();
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
            $table->string('mo_ta')->nullable()->change();
            $table->float('gia_goc')->nullable()->change();
            $table->float('gia_ban')->nullable()->change();
        });
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->float('thanh_tien')->nullable()->change();
            $table->float('khuyen_mai')->nullable()->change();
            $table->float('tong_tien')->nullable()->change();
        });
    }
}
