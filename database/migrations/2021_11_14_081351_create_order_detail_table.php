<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan', 100);
            $table->integer('harga');
            $table->integer('qty');
            $table->unsignedBigInteger('id_order')->nullable();
            $table->foreign('id_order')->references('id')->on('order')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('id_masakan')->nullable();
            $table->foreign('id_masakan')->references('id')->on('masakan')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
