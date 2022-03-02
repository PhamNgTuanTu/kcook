<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('san_pham', function (Blueprint $table) {
           DB::statement('ALTER TABLE san_pham ADD FULLTEXT `ten_san_pham` (`ten_san_pham`)'); //đánh index cho cột name
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('san_pham', function (Blueprint $table) {
           DB::statement('ALTER TABLE san_pham ADD FULLTEXT `ten_san_pham` (`ten_san_pham`)'); //đánh index cho cột name
       });
    }
}
