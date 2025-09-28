📘 Kotabaru Tourism Data Center

Kotabaru Tourism Data Center adalah sebuah sistem informasi berbasis web yang dirancang untuk mendata, mengelola, dan menampilkan informasi mengenai tempat wisata dan kuliner yang ada di wilayah Kotabaru. Sistem ini dibangun menggunakan framework Laravel dengan fokus pada:
1. Pendataan tempat wisata & kuliner lokal secara terstruktur
2. Pemetaan lokasi berbasis koordinat (longlat)
3. Integrasi fitur QR Code, jam operasional, dan narasi sejarah
4. Sistem rekomendasi lokasi terdekat (untuk pengembangan lanjutan)
5. Pengelompokan UMKM, fitur ekspor data, dan pengelolaan akun admin

🚀 Fitur Utama
✅ Input data tempat wisata dan kuliner lengkap
✅ Dukungan jam operasional harian & status libur
✅ Upload foto multipel
✅ Kategori tempat, jenis kuliner, dan praktik K3
✅ Form interaktif dengan checkbox + input tambahan (Dll / DII)
✅ Penyimpanan data JSON (untuk field dinamis)
✅ Sistem manajemen user (superadmin, admin, user biasa)
📍 Integrasi peta interaktif (Leaflet)
🎙️ Dukungan narasi wisata (TTS opsional)
🧠 Rencana pengembangan: rekomendasi wisata terdekat & ekspor PDF/Excel

📦 Teknologi yang Digunakan
Laravel 9+
PHP 8.2+
Bootstrap 5
MySQL
Leaflet.js (untuk peta)
JavaScript (untuk validasi dinamis, jam operasional, checkbox)

🛠️ Instalasi Proyek
git clone https://github.com/Leonn1205/Project-KP.git
cd Project-KP
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

🤝 Kontribusi

Ini adalah bagian dari Proyek Kerja Praktik & Skripsi — jika kamu tertarik mengembangkan sistem ini lebih lanjut, kontribusi dalam bentuk feedback, fitur tambahan, atau debugging sangat disambut.
