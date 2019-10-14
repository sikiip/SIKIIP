<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultPresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_presensi', function (Blueprint $table) {
            $table->bigIncrements('id_default_presensi');
            $table->string('nik');
            $table->string('ijin');
            $table->string('alfa');
            $table->string('cuti_diluar_tanggungan');
            $table->string('cuti_penting');
            $table->string('dispensasi');
            $table->string('sdsd');
            $table->string('stsd');
            $table->string('cuti_tahunan');
            $table->string('sisa_cuti_tahunan');
            $table->string('keterangan');
            $table->string('keterangan_cuti');
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
        Schema::dropIfExists('default_presensi');
    }
}
