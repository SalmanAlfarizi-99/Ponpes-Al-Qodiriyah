# Pondok Pesantren Management System

Sistem Manajemen Pondok Pesantren berbasis Laravel 8 dengan tampilan modern menggunakan Tailwind CSS.

## Fitur Utama

- **Autentikasi & Otorisasi** - Login/Register dengan role-based access control
- **Manajemen Santri** - CRUD lengkap data santri dengan foto dan data wali
- **Manajemen Ustadz/Ustadzah** - Data guru dan pengajar
- **Manajemen Kelas** - Pengelolaan kelas/halaqah dengan wali kelas
- **Absensi** - Pencatatan kehadiran harian santri dan guru
- **Keuangan** - Pembayaran SPP, infaq, dan biaya lainnya
- **Dashboard** - Statistik dan ringkasan data

## Teknologi

- **Backend**: Laravel 8.x
- **Frontend**: Tailwind CSS (via CDN) + Alpine.js
- **Database**: MySQL
- **Authentication**: Laravel UI

## Persyaratan Sistem

- PHP 8.0+
- Composer
- MySQL 5.7+
- Node.js (opsional untuk asset building)

## Instalasi

```bash
# 1. Clone/download project
cd ponpes

# 2. Install dependencies
composer install

# 3. Salin file environment
copy .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Konfigurasi database di file .env
# DB_DATABASE=ponpes_db
# DB_USERNAME=root
# DB_PASSWORD=password_anda

# 6. Buat database di MySQL
# CREATE DATABASE ponpes_db;

# 7. Jalankan migrasi dan seeder
php artisan migrate --seed

# 8. Buat symbolic link untuk storage
php artisan storage:link

# 9. Jalankan server development
php artisan serve
```

## Akun Default

Setelah menjalankan seeder, Anda dapat login dengan akun berikut:

| Role | Email | Password |
|------|-------|----------|
| Super Admin | superadmin@ponpes.sch.id | password |
| Admin | admin@ponpes.sch.id | password |
| Operator | operator@ponpes.sch.id | password |
| Ustadz | ustadz@ponpes.sch.id | password |
| Santri | santri@ponpes.sch.id | password |

## Struktur Folder

```
├── app/
│   ├── Http/Controllers/    # Controller CRUD
│   ├── Models/              # Eloquent models
│   └── Http/Middleware/     # Role & permission middleware
├── database/
│   ├── migrations/          # Database schema
│   └── seeders/             # Sample data
├── resources/views/
│   ├── layouts/             # Main layout
│   ├── santri/              # Santri views
│   ├── teachers/            # Teacher views
│   ├── classes/             # Class views
│   ├── payments/            # Payment views
│   └── attendances/         # Attendance views
└── routes/web.php           # Application routes
```

## Roles & Permissions

| Role | Akses |
|------|-------|
| Super Admin | Full access ke semua modul |
| Admin | Manajemen data dan users |
| Operator | Input data operasional |
| Ustadz | Absensi dan nilai |
| Santri | Lihat data sendiri |
| Wali | Monitoring anak |

---

© 2024 Pondok Pesantren Management System
