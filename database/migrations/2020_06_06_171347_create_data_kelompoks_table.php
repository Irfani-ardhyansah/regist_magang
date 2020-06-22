<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKelompoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kelompoks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelompok_id')->unsigned();
            $table->string('nama');
            $table->integer('nim')->unique();
            $table->string('jenis_kelamin');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->string('bidang_minat');
            $table->string('keahlian');
            $table->timestamps();
        });

        Schema::table('data_kelompoks', function (Blueprint $table) {
            $table->foreign('kelompok_id')->references('id')->on('kelompoks')
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
        Schema::dropIfExists('data_kelompoks');
    }
}
