<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayatpendidikan', function (Blueprint $table) {
            $table->bigIncrements('id_riwayat_pendidikan');
            $table->string('nik');
            $table->string('jenjang_pendidikan');
            $table->string('nama_sekolah');
            $table->string('kota_sekolah');
            $table->string('jurusan_pendidikan');
            $table->string('periode_pendidikan');     
            $table->string('foto_ijazah_sertifikat');      
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
        Schema::dropIfExists('riwayatpendidikan');
    }
}
