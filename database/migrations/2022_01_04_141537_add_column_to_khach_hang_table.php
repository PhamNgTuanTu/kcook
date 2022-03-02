<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKhachHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('khach_hang', function (Blueprint $table) {
            $table->string('ho')->after('id')->nullable();
            $table->string('ten')->after('ho')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('khach_hang', function (Blueprint $table) {
            $table->dropColumn('ho');
            $table->dropColumn('ten');
            
        });
    }
}
