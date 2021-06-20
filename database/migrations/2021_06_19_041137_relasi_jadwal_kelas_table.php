<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiJadwalKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->bigInteger('kelas_id')->nullable()->unsigned();
            $table->foreign('kelas_id')->references('id')->on('kelas'); //menambah foreign key kolom mahasiswa_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal', function(Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
        });
    }
}
