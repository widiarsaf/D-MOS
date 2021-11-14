<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_masakan', 100);
            $table->integer('harga');
            $table->string('status', 50)->default('tersedia');
            $table->string('gambar', 255)->default('images/masakanDefault.jpg');
            $table->unsignedBigInteger('id_jenis')->nullable();
            $table->foreign('id_jenis')->references('id')->on('jenis_masakan')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masakan');
    }
}
