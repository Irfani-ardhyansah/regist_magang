<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompoks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('universitas');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('alamat_univ');
            $table->string('kelompok');
            $table->integer('jumlah_anggota');
            $table->date('periode_mulai');
            $table->date('periode_akhir');
            $table->string('nama_ketua');
            $table->timestamps();
        });

        Schema::table('kelompoks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelompoks');
    }
}
