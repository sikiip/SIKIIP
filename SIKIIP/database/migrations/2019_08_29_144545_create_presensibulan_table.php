<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresensibulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensibulan', function (Blueprint $table) {
            $table->bigIncrements('id_presensi');
            $table->string('id_sidik_jari');
            $table->string('periode_periode');
            $table->string('jumlah_absen');
            $table->string('total_late_presensi');
            $table->string('total_early_presensi');
            $table->string('jumlah_keterlambatan');
            $table->integer('transport_presensi');
            $table->integer('tambahan_presensi');
            $table->text('keterangan');
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
        Schema::dropIfExists('presensibulan');
    }
}
