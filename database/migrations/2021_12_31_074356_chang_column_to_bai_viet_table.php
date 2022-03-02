<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangColumnToBaiVietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bai_viet', function (Blueprint $table) {
            $table->longText('tieu_de')->nullable()->change();
            $table->longText('phu_de')->nullable()->change();
            $table->longText('noi_dung')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bai_viet', function (Blueprint $table) {
            //
        });
    }
}
