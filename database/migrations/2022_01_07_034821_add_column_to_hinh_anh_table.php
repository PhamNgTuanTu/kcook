<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToHinhAnhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hinh_anh', function (Blueprint $table) {
            $table->integer('cau_hinh_id')->after('san_pham_id')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hinh_anh', function (Blueprint $table) {
            $table->dropColumn('cau_hinh_id');
            
        });
    }
}
