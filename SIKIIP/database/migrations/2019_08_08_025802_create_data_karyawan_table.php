<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakaryawan', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nik');
            $table->string('id_sidik_jari');
            $table->string('rfid_uid');
            $table->string("nama_karyawan");
            $table->string("email")->unique();
            $table->string("divisi");
            $table->date("masa_kerja");
            $table->string("alamat_ktp")->nullable();
            $table->string("alamat_tinggal")->nullable();
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("no_telp")->nullable();
            $table->string("no_ktp")->nullable();
            $table->string("no_bpjs")->nullable();
            $table->string("foto_kk")->nullable();
            $table->string("foto_ktp")->nullable();
            $table->string("no_bpjs")->nullable();
            $table->string("foto_bpjs")->nullable();
            $table->string("no_npwp")->nullable();
            $table->string("foto_npwp")->nullable();
            $table->string("no_telp_darurat")->nullable();
            $table->string("hub_no_telp_darurat")->nullable();
            $table->string("status_hubungan")->nullable();
            $table->string("status_kerja")->nullable();
            $table->text('alasan_resign')->nullable();
            $table->date("tanggal_resign")->nullable();
            $table->string("foto_karyawan")->nullable();
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
        Schema::dropIfExists('datakaryawan');
    }
}
