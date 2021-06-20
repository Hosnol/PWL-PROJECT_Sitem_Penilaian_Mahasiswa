<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiJadwalMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->bigInteger('matakuliah_id')->nullable()->unsigned();
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah'); //menambah foreign key kolom matakuliah_id
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
            $table->dropForeign(['matakuliah_id']);
        });
    }
}
