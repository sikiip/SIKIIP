<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaturanPenggajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan_penggajian', function (Blueprint $table) {
            $table->bigIncrements('id_pengaturan_penggajian');
            $table->integer('biaya_tunjangan_transport');
            $table->float('bpjs_kesehatan_perusahaan');
            $table->float('bpjs_kesehatan_karyawan');
            $table->float('bpjs_ketenaga_kerjaan_jkk');
            $table->float('bpjs_ketenaga_kerjaan_jkm');
            $table->float('bpjs_ketenaga_kerjaan_jht');
            $table->float('default_iuran');
            $table->float('default_biaya_jabatan1');
            $table->integer('default_biaya_jabatan2');
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
        Schema::dropIfExists('pengaturan_penggajian');
    }
}
