<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTtttToCauHinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cau_hinh', function (Blueprint $table) {
            $table->longText('iframe')->nullable();
            $table->longText('source')->nullable();
            $table->longText('ten_ngan_hang')->nullable();
            $table->string('so_tai_khoan')->nullable();
            $table->string('ten_chu_the')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cau_hinh', function (Blueprint $table) {
            $table->dropColumn('iframe');
            $table->dropColumn('source');
            $table->dropColumn('ten_ngan_hang');
            $table->dropColumn('so_tai_khoan');
            $table->dropColumn('ten_chu_the');
        });
    }
}
