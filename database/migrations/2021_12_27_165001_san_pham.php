<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('ma_san_pham');
            $table->string('mo_ta');
            $table->float('gia_goc');
            $table->float('so_luong');
            $table->float('gia_ban');
            $table->integer('loai_san_pham_id');
            $table->integer('nhom_loai_san_pham_id')->nullable();
            $table->integer('trang_thai')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('san_pham');
    }
}
