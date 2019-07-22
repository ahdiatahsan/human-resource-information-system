<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nip', 25)->unique();
            $table->text('alamat');
            $table->integer('golongan_id')->unsigned()->nullable();;
            $table->integer('divisi_id')->unsigned()->nullable();;
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('golongan_id')
                  ->references('id')
                  ->on('golongan')
                  ->onDelete('set null');

            $table->foreign('divisi_id')
                  ->references('id')
                  ->on('divisi')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
