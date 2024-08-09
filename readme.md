# energeek

Folder `energeek` berisi beberapa proyek dan data terkait. Berikut adalah penjelasan tentang isi dari folder ini:

## 1. Folder Projek Laravel (API TODO)

Folder ini berisi proyek Laravel yang digunakan untuk API TODO. Proyek ini mencakup semua file dan konfigurasi yang diperlukan untuk API yang mengelola daftar tugas (to-do list).

- **Struktur Folder**:
  - `app/`: Berisi kode aplikasi Laravel, termasuk model, kontroler, dan layanan.
  - `database/`: Berisi migrasi, seeder, dan model basis data.
  - `routes/`: Berisi file rute API.
  - `config/`: Berisi file konfigurasi.
  - `public/`: Berisi aset publik yang dapat diakses oleh pengguna.

- **Dokumentasi**: Pastikan untuk memeriksa dokumentasi API yang terdapat di [Postman](#) untuk detail lebih lanjut tentang endpoint dan cara penggunaannya.

## 2. Folder Projek VUE3 (FrontEnd)

Folder ini berisi proyek Vue.js versi 3 yang digunakan untuk frontend aplikasi TODO. Proyek ini mencakup semua file terkait tampilan pengguna (UI) dan interaksi frontend.

- **Struktur Folder**:
  - `src/`: Berisi komponen Vue, rute, dan file utama aplikasi.
  - `public/`: Berisi aset publik seperti favicon dan file HTML.
  - `components/`: Berisi komponen-komponen Vue yang digunakan dalam aplikasi.
  - `views/`: Berisi tampilan utama yang dirender oleh Vue Router.

- **Dokumentasi**: Panduan penggunaan dan setup proyek Vue.js dapat ditemukan dalam file `README.md` yang ada di folder ini.

## 3. Folder Backup Database

Folder ini berisi file backup database PostgreSQL yang digunakan untuk proyek. File backup ini dapat digunakan untuk memulihkan data yang telah disimpan dalam database.

- **Format File**: Biasanya berupa file dengan ekstensi `.backup` atau `.sql`.
- **Cara Restore**: Untuk merestore database dari backup ini, Anda dapat menggunakan perintah PostgreSQL seperti `pg_restore` atau `psql`.

## Cara Menggunakan Proyek

- **Setup Laravel API**:
  1. Install dependensi dengan `composer install`.
  2. Atur file `.env` dengan konfigurasi database dan pengaturan lainnya.
  3. Jalankan migrasi dengan `php artisan migrate`.
  4. Mulai server Laravel dengan `php artisan serve`.

- **Setup Vue.js Frontend**:
  1. Install dependensi dengan `npm install` atau `yarn install`.
  2. Jalankan proyek dengan `npm run serve` atau `yarn serve`.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request atau buka issue untuk diskusi lebih lanjut.
