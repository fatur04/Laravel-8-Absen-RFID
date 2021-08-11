<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("nama");
            $table->string("perusahaan");
            $table->string("ruang");
            $table->string("kegiatan");
            $table->string("tanggung_jawab");
            $table->date("tgl");
            $table->time("jammasuk");
            $table->time("jamkeluar");
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
        Schema::dropIfExists('absen');
    }
}
