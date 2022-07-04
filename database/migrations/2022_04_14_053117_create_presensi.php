<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->string("kode_absen")->primary();
            $table->string("NIS")->index();
            $table->foreign("NIS")->references("NIS")->on("siswa")->onDelete("cascade");
            $table->string("kode_mapel")->index();
            $table->foreign("kode_mapel")->references("kode")->on("mapel")->onDelete("cascade");
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
