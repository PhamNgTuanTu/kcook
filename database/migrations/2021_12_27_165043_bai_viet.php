<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaiViet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_viet', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de')->nullable();
            $table->string('phu_de')->nullable();
            $table->string('noi_dung')->nullable();
            $table->integer('loai_bai_viet')->nullable();
            $table->string('anh')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('bai_viet');
    }
}
