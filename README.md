# ESPP - Sistem Pembayaran SPP

**ESPP (E-Sistem Pembayaran SPP)** adalah aplikasi web untuk manajemen administrasi pembayaran SPP di **SMK Taruna Persada Dumai**. Aplikasi ini dibangun menggunakan framework Laravel dan menyediakan fitur pengelolaan data pembayaran, manajemen user multi-role, serta pengelolaan data akademik.

---

## Tech Stack

| Teknologi           | Versi | Keterangan                         |
| ------------------- | ----- | ---------------------------------- |
| **PHP**             | ^8.1  | Bahasa pemrograman utama           |
| **Laravel**         | 10.x  | Framework backend                  |
| **MySQL**           | -     | Database relasional                |
| **Laravel Sanctum** | ^3.3  | API authentication                 |
| **Livewire**        | ^3.4  | Komponen interaktif                |
| **Blade**           | -     | Template engine Laravel            |
| **Bootstrap**       | -     | CSS framework (via Atlantis theme) |
| **jQuery**          | -     | JavaScript library                 |
| **DataTables**      | -     | Tabel interaktif                   |
| **Vite**            | ^5.0  | Frontend build tool                |
| **Toastr**          | ^2.3  | Notifikasi toast                   |

---

## Fitur Utama

- **Autentikasi** — Login & logout untuk semua role
- **Dashboard** — Halaman utama setelah login
- **Pembayaran** — Halaman manajemen pembayaran SPP
- **Data Pembayaran** — Melihat dan mengelola data pembayaran murid
- **Manajemen User** — CRUD user dengan upload foto profil dan pengaturan password
- **Manajemen Data**
    - Tahun Akademik — Kelola data tahun ajaran
    - Kelas — Kelola data kelas per tahun akademik
    - Pembayaran Per Bulan — Kelola nominal pembayaran per bulan

---

## Role Pengguna

| Role            | Keterangan                   |
| --------------- | ---------------------------- |
| `administrator` | Admin dengan akses penuh     |
| `petugas`       | Petugas administrasi sekolah |
| `walikelas`     | Wali kelas                   |
| `walimurid`     | Wali murid / orang tua       |
| `murid`         | Siswa                        |

---

## Struktur Database

| Tabel                  | Keterangan                                             |
| ---------------------- | ------------------------------------------------------ |
| `users`                | Data pengguna (username, fullname, email, photo, role) |
| `tahun_akademiks`      | Data tahun akademik (kode tahun ajaran)                |
| `kelas`                | Data kelas, terhubung ke tahun akademik                |
| `pembayaran_perbulans` | Nominal pembayaran per bulan dan tahun                 |
| `students`             | Data siswa (NISN, nama, tanggal lahir)                 |

---

## Prasyarat

Pastikan sistem kamu sudah memiliki:

- **PHP** >= 8.1
- **Composer** >= 2.x
- **Node.js** >= 18.x & **npm**
- **MySQL** >= 5.7 atau **MariaDB** >= 10.3
- **Git**

---

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/ESPP-V2.git
cd ESPP-V2
```

### 2. Install Dependensi

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=espp_v2
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Setup Database

```bash
php artisan migrate
php artisan db:seed
```

### 5. Storage Link

```bash
php artisan storage:link
```

### 6. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`.

---

## Akun Default (Seeder)

| Role          | Email            | Password     |
| ------------- | ---------------- | ------------ |
| Murid         | Denny@gmail.com  | denny12345   |
| Wali Murid    | Said@gmail.com   | Said12345    |
| Administrator | admin@gmail.com  | admin12345   |
| Wali Kelas    | juned@gmail.com  | juned12345   |
| Petugas       | rahman@gmail.com | petugas12345 |

> **Catatan:** Akun-akun ini hanya tersedia setelah menjalankan `php artisan db:seed`.

---

## Struktur Direktori

```
ESPP-V2/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ManajemenData/       # Controller manajemen data
│   │   │   ├── AuthController.php
│   │   │   ├── MainController.php
│   │   │   ├── PembayaranController.php
│   │   │   ├── DataPembayaranController.php
│   │   │   └── UsersController.php
│   │   └── Middleware/
│   └── Models/                      # Eloquent models
├── database/
│   ├── migrations/                  # Skema database
│   └── seeders/                     # Data awal
├── public/
│   └── assets/                      # Atlantis theme (CSS, JS, img)
├── resources/
│   └── views/
│       ├── layouts/                 # Layout master (simple & auth)
│       ├── components/              # Komponen Blade reusable
│       └── ...                      # Halaman per modul
├── routes/
│   ├── web.php                      # Route utama
│   └── api.php                      # Route API (Sanctum)
├── .env.example
├── composer.json
├── package.json
└── vite.config.js
```

---

## Perintah Berguna

```bash
# Menjalankan development server
php artisan serve

# Menjalankan Vite dev server (untuk asset bundling)
npm run dev

# Build asset untuk production
npm run build

# Menjalankan migration
php artisan migrate

# Menjalankan migration + seeder (reset)
php artisan migrate:fresh --seed

# Membersihkan cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
