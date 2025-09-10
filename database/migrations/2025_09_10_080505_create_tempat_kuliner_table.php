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
        Schema::create('tempat_kuliner', function (Blueprint $table) {
            $table->id('id_kuliner');
            $table->unsignedBigInteger('id_tempat');

            // Identitas usaha
            $table->string('nama_usaha');
            $table->year('tahun_berdiri')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('status_legalitas')->nullable(); // izin, NIB, halal
            $table->text('lokasi_lengkap');
            $table->string('bentuk_kepemilikan')->nullable();

            // Jenis kuliner
            $table->string('kategori_utama'); // tradisional, modern, dll
            $table->string('menu_unggulan')->nullable();
            $table->string('bahan_baku')->nullable();
            $table->boolean('musiman')->default(false);

            // Jenis tempat
            $table->string('bentuk_fisik')->nullable();
            $table->string('status_bangunan')->nullable();
            $table->text('fasilitas')->nullable();

            // Praktik K3
            $table->boolean('apd')->default(false);
            $table->text('prosedur_kebersihan')->nullable();
            $table->text('pengelolaan_limbah')->nullable();
            $table->text('ventilasi')->nullable();
            $table->text('pelatihan_k3')->nullable();

            // Regulasi
            $table->string('sertifikasi')->nullable();
            $table->boolean('kepatuhan_zonasi')->default(false);
            $table->boolean('kepatuhan_operasional')->default(false);
            $table->boolean('kepatuhan_pajak')->default(false);
            $table->string('program_pemerintah')->nullable();

            // Perkiraan pelanggan
            $table->integer('rata_pelanggan')->nullable();
            $table->string('profil_pelanggan')->nullable();
            $table->string('jam_sibuk')->nullable();
            $table->string('metode_transaksi')->nullable();

            // Longlat
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

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
        Schema::dropIfExists('tempat_kuliner');
    }
};
