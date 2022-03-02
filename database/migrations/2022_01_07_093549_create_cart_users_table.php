<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->integer('san_pham_id')->nullable();
            $table->integer('khach_hang_id')->nullable();
            $table->integer('so_luong')->nullable();
            $table->bigInteger('tong_tien')->nullable();
            $table->bigInteger('khuyen_mai')->nullable();
            $table->bigInteger('thanh_tien')->nullable();
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
        Schema::dropIfExists('cart');
    }
}
