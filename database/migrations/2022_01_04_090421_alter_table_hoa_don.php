<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableHoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->string('ten')->after('khach_hang_id');
            $table->string('email')->after('ten');
            $table->string('sdt')->after('email');
            $table->string('dia_chi')->after('sdt');
            $table->string('ghi_chu')->after('dia_chi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoa_don', function (Blueprint $table) {
            $table->dropColumn('ten');
            $table->dropColumn('email');
            $table->dropColumn('sdt');
            $table->dropColumn('dia_chi');
            $table->dropColumn('ghi_chu');
        });
    }
}
