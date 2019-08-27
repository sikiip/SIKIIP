<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->bigIncrements('id_presensi');
            $table->string('id_sidik_jari');
            $table->date('tanggal_presensi');
            $table->time('jam_clock_in');
            $table->time('jam_clock_out');
            $table->int('late_presensi');
            $table->int('early_presensi');
            $table->int('transport_presensi');
            $table->int('tambahan_presensi');
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
        Schema::dropIfExists('presensi');
    }
}
