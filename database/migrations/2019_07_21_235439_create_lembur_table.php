<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLemburTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_karyawan')->unsigned();
            $table->string('project');
            $table->string('modul');
            $table->date('tgl_lembur');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_karyawan')
                  ->references('id')
                  ->on('karyawan')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lembur');
    }
}
