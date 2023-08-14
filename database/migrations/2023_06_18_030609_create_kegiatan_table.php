<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->increments('id_kegiatan');
            $table->string('nama_kegiatan');
            $table->date('tgl');
            $table->string('tempat');
            $table->string('deskripsi');
            $table->enum('status', ['Terlaksana', 'Tidak Terlaksana', 'Segera']);
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
        Schema::dropIfExists('kegiatans');
    }
};
