<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToCauHinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cau_hinh', function (Blueprint $table) {
            $table->string('banner')->after('logo')->nullable();
            
        });
        Schema::table('hinh_anh', function (Blueprint $table) {
            $table->string('san_pham_id')->nullable()->change();
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
            $table->dropColumn('banner');
            
        });
        Schema::table('hinh_anh', function (Blueprint $table) {
            $table->string('san_pham_id')->change();
            
        });
    }
}
