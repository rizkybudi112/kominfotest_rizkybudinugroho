ini adalah jawaban untuk SOAL TEST REKRUTMEN PROGRAMMER
DINAS KOMUNIKASI DAN INFORMATIKA
KABUPATEN BANTUL
DAERAH ISTIMEWA YOGYAKARTA
2026

untuk menjalankan Aplikasi
- koneksi database di .env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=kominfo_test
  DB_USERNAME=root
  DB_PASSWORD=mysql

- jalankan "php artisan generate:key"
- jalankan "composer install"
- jalankan "php artisan migrate" -> kebutuhan tabel sudah ada disini semua
- jalankan "php artisan storage:link"
- PENTING : jalankan dahulu Url ini "localhost/pokemon/sync" , untuk fetch data Pokemon
- tampilan Index pada Url "localhost/pokemon/index"

