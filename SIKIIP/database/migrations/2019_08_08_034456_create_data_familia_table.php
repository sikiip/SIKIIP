<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataFamiliaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datafamilia', function (Blueprint $table) {
            $table->bigIncrements('id_familia');
            $table->string("nik");
            $table->string("jenis_hubungan");
            $table->string("nama_familia");
            $table->string("tempat_lahir_familia");
            $table->date("tanggal_lahir_familia");
            $table->string("jenis_kelamin_familia");
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
        Schema::dropIfExists('datafamilia');
    }
}
