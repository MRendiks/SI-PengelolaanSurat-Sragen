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
        Schema::create('surat', function (Blueprint $table) {
            $table->increments('id_surat');
            $table->bigInteger('userId')->unsigned();
            $table->enum('jenis_surat', ['Surat Keterangan', 'Surat Rekomendasi'])->nullable();
            $table->text('keperluan')->nullable();
            $table->date('waktu')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('jumlah_peserta')->nullable();
            $table->text('permohonan')->nullable();
            $table->char('progres')->nullable();
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat');
    }
};
