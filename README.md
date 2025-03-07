# Sistem Manajemen Laundry

## 📌 Deskripsi 
Sistem Manajemen Laundry ini dirancang untuk membantu operasional laundry dengan fitur manajemen cabang, layanan, pengguna, transaksi, dan laporan.

## 🏠 Menu Admin
### **Dashboard**
```yaml
- Menu utama bagi admin untuk memantau operasional.
```

## **Master Data**
```yaml
- Kelola Cabang: Mengelola data cabang laundry.
- Kelola Layanan: Mengelola jenis layanan yang tersedia.
- Kelola User: Mengelola akun pengguna dalam sistem.
```

## **Laporan**
```yaml
- Akses ke halaman laporan transaksi dan operasional.
```

## 👥 Menu Karyawan
### **Dashboard**
```yaml
- Menu utama bagi karyawan untuk memantau operasional.
```

### **Transaksi (Dropdown)**
```yaml
- Buat Transaksi: Membuat transaksi baru.
- Riwayat Transaksi: Melihat daftar transaksi yang telah dibuat.
```

## 🚀 Teknologi yang Digunakan
```yaml
- Laravel 11 (Backend)
- Blade Template (Frontend)
- MySQL (Database)
```

## 🔧 Instalasi
```sh
# Clone repositori
git clone https://github.com/paundrayudhad/laundry-tugas-ukk

# Masuk ke direktori proyek
cd laundry-tugas-ukk

# Install dependensi
composer install
npm install

# Konfigurasi file .env
cp .env.example .env
php artisan key:generate

# Jalankan migrasi database
php artisan migrate --seed

# Jalankan server lokal
php artisan serve
```

## 📌 Lisensi
Proyek ini dilisensikan di bawah lisensi MIT.

