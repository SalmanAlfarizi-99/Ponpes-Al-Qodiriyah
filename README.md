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
- **Database**: MySQL / PostgreSQL
- **Auth**: Laravel UI dengan role-based access

---

## 📦 Instalasi Lokal

### Prasyarat
- PHP 8.0+
- Composer
- MySQL 5.7+ atau PostgreSQL
- Node.js (opsional, untuk assets)

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
# Edit .env file:
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

## 🐳 Docker Deployment

### Build & Run Locally

```bash
# Build image
docker build -t ponpes-app .

# Run container
docker run -p 8000:80 \
  -e APP_KEY=base64:YOUR_KEY_HERE \
  -e DB_CONNECTION=mysql \
  -e DB_HOST=host.docker.internal \
  -e DB_DATABASE=ponpes_db \
  -e DB_USERNAME=root \
  -e DB_PASSWORD= \
  ponpes-app
```

---

## 🚀 Deploy ke Render (Free Tier)

### Langkah 1: Persiapan
Pastikan repository sudah memiliki:
- `Dockerfile` ✅
- `render.yaml` ✅

### Langkah 2: Buat Akun Render
1. Kunjungi https://render.com
2. Sign up dengan GitHub

### Langkah 3: Deploy Web Service
1. Klik **"New +"** → **"Web Service"**
2. Connect repository: `Ponpes-Al-Qodiriyah`
3. Konfigurasi:
   - **Name**: `ponpes-al-qodiriyah`
   - **Region**: Singapore
   - **Runtime**: Docker
   - **Plan**: Free

### Langkah 4: Environment Variables
Tambahkan di Render Dashboard:

| Variable | Value |
|----------|-------|
| `APP_KEY` | `base64:xxxxx` (generate dengan `php artisan key:generate --show`) |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | `https://your-app.onrender.com` |
| `DB_CONNECTION` | `mysql` atau `pgsql` |
| `DB_HOST` | Database host |
| `DB_PORT` | `3306` atau `5432` |
| `DB_DATABASE` | Database name |
| `DB_USERNAME` | Database user |
| `DB_PASSWORD` | Database password |
| `LOG_CHANNEL` | `stderr` |
| `SESSION_DRIVER` | `file` |
| `CACHE_DRIVER` | `file` |

### Langkah 5: Database (Opsional)
Untuk PostgreSQL gratis di Render:
1. **"New +"** → **"PostgreSQL"**
2. Copy connection string ke env vars

### Langkah 6: Deploy
Klik **"Create Web Service"** - deployment otomatis dimulai!

---

## ⚠️ Free Tier Limitations

- Service sleep setelah 15 menit tidak aktif
- Cold start ~30 detik
- RAM limit 512 MB
- PostgreSQL free tier expire 90 hari

---

## 📁 Struktur Proyek

```
├── app/
│   ├── Http/Controllers/    # Controllers
│   ├── Models/              # Eloquent Models
│   └── Middleware/          # Custom Middleware
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Database seeders
├── resources/
│   └── views/               # Blade templates
├── routes/
│   └── web.php              # Web routes
├── public/                  # Web root (document root)
├── Dockerfile               # Docker configuration
├── render.yaml              # Render deployment config
└── .env.example             # Environment template
```

---

## 🔒 Security

- Jangan pernah commit file `.env`
- Gunakan environment variables untuk secrets
- APP_DEBUG harus `false` di production

---

## 📄 License

MIT License - Bebas digunakan untuk keperluan pendidikan.

---

**Dibuat dengan ❤️ untuk Pendidikan Islam**
