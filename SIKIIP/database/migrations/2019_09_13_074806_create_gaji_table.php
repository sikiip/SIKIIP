<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->bigIncrements('id_gaji');
            $table->string('periode_gaji');
            $table->string('nik');
            $table->string('pengalaman_tanggal');
            $table->string('pengalaman_bulan');
            $table->string('gaji_pokok');
            $table->string('T_jabatan');
            $table->string('T_kinerja');
            $table->string('T_khusus');
            $table->string('T_transport');
            $table->string('jumlah_absen');
            $table->string('hari_transportasi');
            $table->string('jumlah_keterlambatan');
            $table->string('basic_gaji_perhitungan_bpjs_kesehatan');
            $table->string('basic_gaji_perhitungan_bpjs_ketenagakerjaan');
            $table->string('insentif');
            $table->string('bonus');
            $table->string('masa_kerja');
            $table->string('status');
            $table->string('npwp');
            $table->string('potongan');
            $table->string('no_rek');
            $table->string('nama_bank');
            $table->string('keterangan_potongan');
            $table->string('keterangan_tunjangan_transport');
            $table->string('keterangan_disinsentif_insentif');
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
        Schema::dropIfExists('gaji');
    }
}
