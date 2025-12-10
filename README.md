# ✨ Sigma Studio — Barbershop Booking & Management System

Sigma Studio adalah sistem manajemen barbershop modern berbasis web yang dibangun menggunakan **Laravel + Livewire + TailwindCSS**.  
Aplikasi ini mendukung 3 role utama:

- **Admin** — mengelola layanan, staff, laporan, dan seluruh aktivitas reservasi.
- **Staff** — melihat jadwal harian, memproses booking, dan menerima review pelanggan.
- **Customer** — melakukan pemesanan layanan, melihat riwayat, mengunduh invoice, dan memberikan rating.

Project ini dirancang untuk memberikan pengalaman premium dengan UI modern (dark-gold theme), proses booking bertahap (4-step wizard), invoice PDF gold-black, QR code booking, dan sistem review lengkap.

---

## 🚀 **Fitur Utama**

### ⭐ Customer  
- Registrasi & login  
- Melihat katalog layanan  
- Booking layanan dengan flow **4 langkah**:  
  1. Pilih layanan  
  2. Pilih staff  
  3. Pilih jadwal  
  4. Konfirmasi booking  
- Melihat riwayat booking  
- Mendapatkan QR code booking  
- Download invoice PDF premium  
- Memberikan rating & review setelah layanan selesai  

### ⭐ Staff  
- Dashboard staff  
- Booking hari ini  
- Melihat detail booking + mulai/selesaikan proses pelayanan  
- Melihat review yang masuk untuk dirinya  
- Melihat jadwal mingguan

### ⭐ Admin  
- Dashboard lengkap dengan grafik booking 7 hari  
- Mengelola layanan (CRUD)  
- Mengelola seluruh booking  
- Melihat review pelanggan (drawer UI)  
- Laporan sederhana (booking, pendapatan, layanan terlaris)

---

## 🛠 **Teknologi yang Digunakan**

| Teknologi | Fungsi |
|----------|--------|
| **Laravel 11** | Backend utama |
| **Livewire 3** | Frontend reactive tanpa JavaScript rumit |
| **TailwindCSS 4** | Styling cepat & modern |
| **FluxUI / Blade UI** | Komponen UI premium |
| **MySQL** | Database utama |
| **Chart.js** | Grafik statistik admin |
| **DOMPDF / Laravel Snappy** | Generate invoice PDF |
| **QRServer API** | Generate QR booking |
| **Alpine.js** | Interaksi UI ringan |

---

## 📁 **Struktur Proyek Ringkas**



sigma-studio/
├── app/
│ ├── Models/
│ ├── Livewire/
│ ├── Http/Controllers/
│ └── ...
├── resources/views/
│ ├── livewire/
│ ├── components/layouts/
│ └── ...
├── database/migrations/
├── routes/web.php
├── public/
├── composer.json
├── package.json
└── README.md



---

# 🔧 **Cara Instalasi & Menjalankan Project**

> Pastikan komputer sudah terinstall:
> - PHP 8.2+
> - Composer
> - Node.js & NPM
> - MySQL
> - Git

---

## 1️⃣ **Clone Repository**

```bash
git clone https://github.com/USERNAME/sigma-studio.git
cd sigma-studio


2️⃣ Install Dependencies Backend (Laravel)
composer install


3️⃣ Install Dependencies Frontend
npm install

4️⃣ Copy .env & Generate Key
cp .env.example .env
php artisan key:generate

5️⃣ Konfigurasi Database

Edit file .env:

DB_DATABASE=sigma_studio
DB_USERNAME=root
DB_PASSWORD=


Lalu buat database:

CREATE DATABASE sigma_studio;

6️⃣ Jalankan Migrasi & Seeder (opsional)
php artisan migrate


Jika ingin data contoh:

php artisan db:seed

7️⃣ Jalankan Server Laravel
php artisan serve


Aplikasi akan berjalan di:

http://127.0.0.1:8000

8️⃣ Jalankan Vite (Frontend)
npm run dev

🔐 Akun Default 
Role	Email	Password
Admin	admin@sigma.com
	password
Staff	staff@sigma.com
	password
Customer	customer@sigma.com
	password
