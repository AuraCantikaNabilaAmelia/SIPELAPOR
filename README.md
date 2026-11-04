# SIPELAPOR

Sistem Pelaporan Bulanan Sekolah & Rekap Mekanisme — Korwilcam Bidang Pendidikan Kecamatan Gunungwungkal, Kabupaten Pati.

## Deskripsi

SIPELAPOR membantu Korwilcam dan sekolah-sekolah di wilayah Gunungwungkal mengelola laporan bulanan sekolah (data siswa, pegawai, dan inventaris) secara terpusat, serta menghasilkan rekap laporan Mekanisme kepegawaian yang dikirim ke Dinas Pendidikan dan Kebudayaan Kabupaten Pati.

## Teknologi

- Laravel
- MySQL
- Tailwind CSS (Laravel Breeze)

## Cara Menjalankan

1. Clone repository ini dan masuk ke foldernya.
2. Install dependency:
   ```bash
   composer install
   npm install
   ```
3. Salin `.env.example` menjadi `.env`, lalu sesuaikan konfigurasi database MySQL.
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Jalankan migrasi database:
   ```bash
   php artisan migrate
   ```
6. Build asset frontend:
   ```bash
   npm run build
   ```
7. Jalankan server:
   ```bash
   php artisan serve
   ```
8. Buka `http://127.0.0.1:8000` di browser.
