<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMetaToCauHinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cau_hinh', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            
        });
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->dateTime('ngay_giao')->nullable();
            
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
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
            
        });
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->dropColumn('ngay_giao');
            
        });
    }
}
