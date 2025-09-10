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
        Schema::create('tempat_wisata', function (Blueprint $table) {
            $table->id('id_wisata');
            $table->unsignedBigInteger('id_tempat');

            $table->string('nama_wisata');
            $table->string('kategori_wisata');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('narasi')->nullable(); // bisa dipakai untuk teks / audio
            $table->string('jam_operasional')->nullable();

            $table->timestamps();

            $table->foreign('id_tempat')
                ->references('id_tempat')
                ->on('tempat')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('tempat_wisata');
    }
};
