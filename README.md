# Data Siswa

Aplikasi CRUD sederhana untuk mengelola data siswa menggunakan PHP native dan MySQL.

## Fitur

- Menampilkan daftar siswa
- Menambahkan data siswa
- Mengubah data siswa
- Menghapus data siswa dengan konfirmasi

## Persyaratan

- PHP 8.0 atau lebih baru
- MySQL atau MariaDB
- Apache HTTP Server
- Ekstensi PHP `mysqli`

Konfigurasi yang direkomendasikan adalah XAMPP dengan proyek ditempatkan di direktori `htdocs`.

## Instalasi

1. Letakkan direktori proyek di:

   ```text
   C:\xampp\htdocs\data-siswa
   ```

2. Jalankan Apache dan MySQL melalui XAMPP Control Panel.

3. Impor skema database:

   ```powershell
   cmd /c "C:\xampp\mysql\bin\mysql.exe -u root < setup_db.sql"
   ```

4. Pastikan konfigurasi database pada `koneksi.php` sesuai dengan lingkungan lokal:

   ```text
   Host     : localhost
   Username : root
   Password : kosong
   Database : latihan_php
   ```

5. Buka aplikasi melalui:

   ```text
   http://localhost/data-siswa/
   ```

## Struktur Proyek

```text
data-siswa/
├── index.php       Halaman daftar siswa
├── tambah.php      Formulir tambah siswa
├── edit.php        Formulir edit siswa
├── hapus.php       Proses penghapusan siswa
├── koneksi.php     Konfigurasi koneksi database
└── setup_db.sql    Skema database
```

## Database

Aplikasi menggunakan database `latihan_php` dan tabel `siswa` dengan struktur berikut:

| Kolom | Tipe | Ketentuan |
|---|---|---|
| `id_siswa` | `INT` | Primary key, auto increment |
| `nama` | `VARCHAR(100)` | Wajib diisi |
| `nis` | `VARCHAR(20)` | Wajib diisi |
| `tanggal_lahir` | `DATE` | Wajib diisi |
| `email` | `VARCHAR(100)` | Wajib diisi |

## Lisensi

Lisensi belum ditentukan.
