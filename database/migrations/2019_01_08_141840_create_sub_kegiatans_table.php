<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kegiatan')->unsigned();
            $table->string('kode', 10);
            $table->string('sub_kegiatan');
            $table->bigInteger('nilai');
            $table->bigInteger('realisasi_nilai')->nullable()->unsigned();
            $table->foreign('id_kegiatan')->references('id')->on('kegiatans')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('sub_kegiatans');
    }
}
