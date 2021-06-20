<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiDosenJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->bigInteger('dosen_id')->nullable()->unsigned();
            $table->foreign('dosen_id')->references('id')->on('dosen'); //menambah foreign key kolom dosen_id
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
            $table->dropForeign(['dosen_id']);
        });
    }
}
