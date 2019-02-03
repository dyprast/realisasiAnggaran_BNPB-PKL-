<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_subKegiatan')->unsigned();
            $table->integer('id_paket')->unsigned()->nullable();
            $table->string('kode', 10);
            $table->string('mak');
            $table->bigInteger('nilai');
            $table->bigInteger('realisasi_nilai')->nullable()->unsigned();
            $table->foreign('id_subKegiatan')->references('id')->on('sub_kegiatans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_paket')->references('id')->on('pakets')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('maks');
    }
}
