<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyerapanKeuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyerapan_keuangans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mak')->unsigned();
            $table->string('realisasi_kegiatan');
            $table->bigInteger('realisasi_nilai');
            $table->foreign('id_mak')->references('id')->on('maks')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('penyerapan_keuangans');
    }
}
