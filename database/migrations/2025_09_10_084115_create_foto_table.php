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
        Schema::create('foto', function (Blueprint $table) {
            $table->id('id_foto');
            $table->unsignedBigInteger('id_tempat');
            $table->string('path_foto');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('foto');
    }
};
