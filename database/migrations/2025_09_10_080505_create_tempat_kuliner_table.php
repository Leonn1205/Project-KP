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
            // Identitas usaha
            $table->string('nama_usaha');
            $table->year('tahun_berdiri')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('status_legalitas')->nullable();
            $table->text('lokasi_lengkap');
            $table->enum('bentuk_kepemilikan', ['Individu', 'Keluarga', 'Komunitas', 'Waralaba'])->nullable();

            // Jenis kuliner
            $table->enum('kategori_utama', ['Tradisional', 'Modern', 'Fusion', 'Street Food'])->nullable();
            $table->string('menu_unggulan')->nullable();
            $table->json('bahan_baku', ['Lokal', 'Import'])->nullable();
            $table->json('jenis_menu')->nullable();

            // Jenis tempat
            $table->enum('bentuk_fisik', ['Warung Kaki Lima', 'Kedai Rumahan', 'Restoran', 'Gerobak Keliling'])->nullable();
            $table->enum('status_bangunan', ['Milik Sendiri', 'Sewa', 'Tempat Publik'])->nullable();
            $table->text('fasilitas')->nullable();

            // Praktik K3
            $table->boolean('apd')->default(false);
            $table->text('prosedur_kebersihan')->nullable();
            $table->text('sumber_bahan_dasar')->nullable();
            $table->json('pengelolaan_limbah', ['Organik', 'Non-Organik'])->nullable();
            $table->text('ventilasi')->nullable();
            $table->text('pelatihan_k3')->nullable();

            // Regulasi
            $table->json('sertifikasi')->nullable();
            $table->text('kepatuhan_zonasi')->nullable();
            $table->text('kepatuhan_operasional')->nullable();
            $table->text('kepatuhan_pajak')->nullable();
            $table->json('program_pemerintah')->nullable();

            // Perkiraan pelanggan
            $table->integer('rata_pelanggan')->nullable();
            $table->json('profil_pelanggan', ['Lokal', 'Wisatawan', 'Pelajar / Mahasiswa', 'Pekerja'])->nullable();
            $table->json('metode_transaksi', ['Tunai', 'Qris', 'Online Delivery'])->nullable();

            // Longlat
            $table->decimal('longitude', 10, 6)->nullable();
            $table->decimal('latitude', 10, 6)->nullable();

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
        Schema::dropIfExists('tempat_kuliner');
    }
};
