<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayatpekerjaan', function (Blueprint $table) {
            $table->bigIncrements('id_riwayat_pekerjaan');
            $table->string('nik');
            $table->string('nama_perusahaan');
            $table->string('jenis_industri');
            $table->string('jabatan_akhir');
            $table->string('periode_berakhir_kerja');
            $table->string('gaji_akhir');
            $table->text('alasan_berhenti');
            $table->string('foto_verklarin');
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
        Schema::dropIfExists('riwayatpekerjaan');
    }
}
