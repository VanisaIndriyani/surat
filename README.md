# Sistem Arsip Surat

Sistem manajemen arsip surat digital berbasis web menggunakan Laravel 11 dengan Tailwind CSS.

## 📋 Deskripsi

Aplikasi ini dirancang untuk mengelola arsip surat masuk secara digital, menggantikan sistem manual yang rentan hilang dan sulit dicari. Sistem ini memungkinkan administrator untuk:

- Mengelola surat masuk
- Upload dan download file surat
- Pencarian dan filter surat
- Manajemen profil administrator
- Dashboard dengan statistik

## 🚀 Fitur Utama

### 1. **Dashboard**
- Ringkasan statistik surat
- Navigasi cepat ke fitur utama
- Tampilan yang user-friendly

### 2. **Manajemen Surat**
- **Surat Masuk**: Melihat daftar semua surat masuk
- **Tambah Surat**: Input surat baru dengan upload file
- **Detail Surat**: Informasi lengkap setiap surat
- **Edit/Hapus**: Modifikasi data surat
- **Download**: Unduh file surat

### 3. **Profil Administrator**
- Edit informasi personal
- Ganti password
- Manajemen akun

### 4. **Keamanan**
- Sistem login/logout
- Autentikasi pengguna
- Proteksi halaman admin

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: SQLite (default)
- **Icons**: Font Awesome
- **Server**: PHP Built-in Server

## 📦 Instalasi

### Prasyarat

Pastikan sistem Anda memiliki:
- PHP >= 8.2
- Composer
- Node.js & NPM (opsional, untuk build assets)

### Langkah Instalasi

1. **Extract file ZIP**
   ```bash
   # Extract file arsip-surat.zip ke folder yang diinginkan
   ```

2. **Masuk ke direktori project**
   ```bash
   cd arsip-surat
   ```

3. **Install dependencies PHP**
   ```bash
   composer install
   ```

4. **Setup environment**
   ```bash
   # Copy file environment
   copy .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

5. **Setup database**
   ```bash
   # Jalankan migrasi database
   php artisan migrate
   
   # (Opsional) Jalankan seeder untuk data dummy
   php artisan db:seed
   ```

6. **Build assets (opsional)**
   ```bash
   # Install NPM dependencies
   npm install
   
   # Build untuk production
   npm run build
   ```

7. **Jalankan aplikasi**
   ```bash
   php artisan serve
   ```

8. **Akses aplikasi**
   - Buka browser dan kunjungi: `http://127.0.0.1:8000`
   - Login dengan kredensial default (jika ada seeder)

## 🔧 Konfigurasi

### Database

Secara default menggunakan SQLite. Untuk menggunakan database lain, edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arsip_surat
DB_USERNAME=root
DB_PASSWORD=
```

### File Upload

Pastikan folder `storage` memiliki permission yang tepat:

```bash
# Windows
php artisan storage:link

# Linux/Mac
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

## 👤 Akun Default

Jika menjalankan seeder, akun default:
- **Email**: admin@arsip.com
- **Password**: password

## 📁 Struktur Project

```
arsip-surat/
├── app/
│   ├── Http/Controllers/     # Controllers
│   └── Models/              # Models
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── public/
│   └── storage/            # File uploads
├── resources/
│   └── views/              # Blade templates
├── routes/
│   └── web.php             # Web routes
└── storage/
    └── app/public/         # File storage
```

## 🚨 Troubleshooting

### Error "Route not found"
```bash
php artisan route:clear
php artisan config:clear
php artisan view:clear
```

### Error permission
```bash
# Windows (run as administrator)
php artisan storage:link

# Linux/Mac
sudo chmod -R 775 storage bootstrap/cache
```

### Error database
```bash
# Reset database
php artisan migrate:fresh --seed
```

## 📝 Penggunaan

1. **Login** ke sistem dengan akun administrator
2. **Dashboard** - Lihat ringkasan sistem
3. **Surat Masuk** - Kelola daftar surat
4. **Tambah Surat** - Input surat baru
5. **Profile** - Kelola akun (via icon user di navbar)
6. **Logout** - Keluar dari sistem

## 🔒 Keamanan

- Selalu ganti password default
- Pastikan file `.env` tidak dapat diakses publik
- Backup database secara berkala
- Update dependencies secara rutin

## 📞 Support

Jika mengalami masalah:
1. Periksa log error di `storage/logs/laravel.log`
2. Pastikan semua dependencies terinstall
3. Cek konfigurasi `.env`
4. Jalankan command troubleshooting di atas

## 📄 Lisensi

Project ini menggunakan lisensi MIT.

---

**Dibuat dengan ❤️ menggunakan Laravel & Tailwind CSS**
