<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaturanPresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan_presensi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_hrd');
            $table->string('clock_in_normal');
            $table->string('clock_out_normal');
            $table->string('transport_normal');
            $table->string('clock_in_ramadhan');
            $table->string('clock_out_ramadhan');
            $table->string('transport_ramadhan');
            $table->string('lupa_clock_in_out');
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
        Schema::dropIfExists('pengaturan_presensi');
    }
}
