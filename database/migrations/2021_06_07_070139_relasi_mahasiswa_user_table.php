<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiMahasiswaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function(Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); //menambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users'); //menambah foreign key di kolom user_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
