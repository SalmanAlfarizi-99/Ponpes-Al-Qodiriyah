# Pondok Pesantren Al-Qodiriyah

Sistem Manajemen Pondok Pesantren Modern berbasis Laravel 8.

## 🎯 Fitur Utama

- **Manajemen Santri** - CRUD data santri lengkap
- **Manajemen Guru** - Pengelolaan data ustadz/ustadzah
- **Manajemen Kelas** - Pembagian kelas dan jadwal
- **Pembayaran SPP** - Tracking pembayaran santri
- **Absensi** - Pencatatan kehadiran
- **Pengumuman** - Broadcast informasi
- **Landing Pages** - 8 halaman lembaga (MI, MA, TPQ, dll)
- **Role-based Access** - Super Admin, Admin, Guru, Santri

## 🛠️ Teknologi

- **Backend**: Laravel 8.x
- **Frontend**: Blade + Tailwind CSS
- **Database**: MySQL
- **Auth**: Laravel UI dengan role-based access

---

## 📦 Instalasi Lokal

### Prasyarat
- PHP 8.0+
- Composer
- MySQL 5.7+
- Node.js (opsional)

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/SalmanAlfarizi-99/Ponpes-Al-Qodiriyah.git
cd Ponpes-Al-Qodiriyah

# 2. Install dependencies
composer install

# 3. Copy environment file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Configure database in .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=ponpes_db
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Create storage symlink
php artisan storage:link

# 8. Start development server
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

### Default Login
- **Super Admin**: superadmin@ponpes.id / password
- **Admin**: admin@ponpes.id / password

---

## 🚀 Deploy ke Railway.app

### Langkah 1: Buat Akun Railway
1. Kunjungi https://railway.app
2. Sign up dengan GitHub

### Langkah 2: Buat Project Baru
1. Klik **"New Project"**
2. Pilih **"Deploy from GitHub repo"**
3. Pilih repository: `Ponpes-Al-Qodiriyah`

### Langkah 3: Tambah MySQL Database
1. Di project dashboard, klik **"+ New"**
2. Pilih **"Database"** → **"Add MySQL"**
3. Railway akan membuat database otomatis

### Langkah 4: Konfigurasi Environment Variables
Klik service Laravel → **Variables** → tambahkan:

| Variable | Value |
|----------|-------|
| `APP_KEY` | `base64:xxxxx` (generate: `php artisan key:generate --show`) |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | `https://your-app.up.railway.app` |
| `LOG_CHANNEL` | `stderr` |
| `SESSION_DRIVER` | `file` |
| `CACHE_DRIVER` | `file` |

### Langkah 5: Hubungkan ke MySQL
Klik MySQL service → **Connect** → Copy variables:

| Variable | Source |
|----------|--------|
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | `${{MySQL.MYSQLHOST}}` |
| `DB_PORT` | `${{MySQL.MYSQLPORT}}` |
| `DB_DATABASE` | `${{MySQL.MYSQLDATABASE}}` |
| `DB_USERNAME` | `${{MySQL.MYSQLUSER}}` |
| `DB_PASSWORD` | `${{MySQL.MYSQLPASSWORD}}` |

Atau gunakan:
| Variable | Value |
|----------|-------|
| `DATABASE_URL` | `${{MySQL.DATABASE_URL}}` |

### Langkah 6: Deploy
Railway akan otomatis build dan deploy!

### Langkah 7: Import Database (Opsional)
Jika perlu import data:
1. Buka MySQL service → **Data** tab
2. Atau gunakan Railway CLI:
```bash
railway connect mysql
mysql < database/schema.sql
```

---

## 🐳 Docker Deployment (Alternatif)

```bash
# Build image
docker build -t ponpes-app .

# Run container
docker run -p 8000:80 \
  -e APP_KEY=base64:YOUR_KEY \
  -e DB_HOST=host.docker.internal \
  ponpes-app
```

---

## 📁 Struktur Proyek

```
├── app/
│   ├── Http/Controllers/    # Controllers
│   ├── Models/              # Eloquent Models
│   └── Middleware/          # Custom Middleware
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/             # Database seeders
│   └── schema.sql           # Database export
├── resources/views/         # Blade templates
├── routes/web.php           # Web routes
├── public/                  # Document root
├── Dockerfile               # Docker config
├── nixpacks.toml            # Railway config
└── railway.json             # Railway start command
```

---

## ⚠️ Railway Free Tier

- $5 credit gratis per bulan
- Sleep setelah tidak aktif
- Shared CPU & RAM
- Cukup untuk development/demo

---

## 🔒 Security

- Jangan commit file `.env`
- Gunakan environment variables
- `APP_DEBUG=false` di production

---

## 📄 License

MIT License

---

**Dibuat dengan ❤️ untuk Pendidikan Islam**
