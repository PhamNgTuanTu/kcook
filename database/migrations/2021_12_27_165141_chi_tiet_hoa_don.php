<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietHoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->integer('san_pham_id')->nullable();
            $table->integer('khach_hang_id')->nullable();
            $table->integer('so_luong')->nullable();
            $table->float('tong_tien')->nullable();
            $table->integer('trang_thai')->nullable();
            $table->integer('hoa_don_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_don');
        
    }
}
