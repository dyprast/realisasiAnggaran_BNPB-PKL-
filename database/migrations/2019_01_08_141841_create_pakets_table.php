<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_subKegiatan')->unsigned();
            $table->string('paket');
            $table->string('keterangan_paket');
            $table->string('nilai');
            $table->bigInteger('realisasi_nilai')->nullable()->unsigned();
            $table->foreign('id_subKegiatan')->references('id')->on('sub_kegiatans')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pakets');
    }
}
