<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
            $table->string('khach_hang_id')->nullable();
            $table->float('thanh_tien')->nullable();
            $table->float('khuyen_mai')->nullable();
            $table->float('tong_tien')->nullable();
            $table->integer('trang_thai')->nullable();
            $table->dateTime('ngay_thanh_toan')->nullable();
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
        Schema::dropIfExists('hoa_don');
        
    }
}
