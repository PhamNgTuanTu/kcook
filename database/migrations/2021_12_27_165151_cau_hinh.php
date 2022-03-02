<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CauHinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cau_hinh', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('tru_so_chinh')->nullable();
            $table->string('chi_nhanh')->nullable();
            $table->integer('so_dien_thoai')->nullable();
            $table->string('email')->nullable();
            $table->string('hotline')->nullable();
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
        Schema::dropIfExists('cau_hinh');
        
    }
}
