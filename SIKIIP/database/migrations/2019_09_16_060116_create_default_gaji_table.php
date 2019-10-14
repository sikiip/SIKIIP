<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_gaji', function (Blueprint $table) {
            $table->bigIncrements('id_default_gaji');
            $table->string('nik');
            $table->string('pengalaman_tanggal');
            $table->integer('pengalaman_bulan');
            $table->integer('gaji_pokok');
            $table->integer('T_jabatan');
            $table->integer('T_kinerja');
            $table->integer('T_khusus');
            $table->integer('T_transport');
            $table->integer('basic_gaji_perhitungan_bpjs_kesehatan');
            $table->integer('basic_gaji_perhitungan_bpjs_ketenagakerjaan');
            $table->integer('insentif');
            $table->integer('bonus');
            $table->integer('masa_kerja');
            $table->string('status');
            $table->integer('potongan');
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
        Schema::dropIfExists('default_gaji');
    }
}
