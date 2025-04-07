<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 📦 B2B Inventory Management System (SaaS Laravel)

**B2B Inventory Management System** adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel, dirancang khusus untuk membantu UMKM, supplier, dan perusahaan skala kecil hingga menengah dalam mengelola stok barang, pembelian, penjualan, serta pelaporan keuangan secara real-time.

Aplikasi ini mengusung model **SaaS (Software as a Service)**, memungkinkan multi-perusahaan menggunakan sistem yang sama secara terpisah dan aman.

---

## 🚀 Fitur Unggulan

### 🔐 Otentikasi & Akses
- Multi-auth user (admin, staf)
- Hak akses berdasarkan role
- Sistem login aman

### 📦 Manajemen Inventaris
- CRUD produk, kategori, dan supplier
- Harga beli & harga jual terpisah
- Minimum stock alert

### 📥 Barang Masuk
- Pencatatan penerimaan barang dari supplier
- Riwayat pembelian dan biaya akumulatif

### 📤 Barang Keluar
- Distribusi dan penjualan barang ke pelanggan
- Tracking barang yang paling banyak keluar

### 📊 Laporan Analitik
- Laporan stok barang (real-time)
- Laporan pembelian & penjualan
- Laporan keuntungan (profit margin) *Coming soon*
- Filter laporan per tanggal/kategori/supplier
- Ekspor ke PDF & Excel *Coming soon*

---

## 🧱 Teknologi yang Digunakan

- Laravel 10
- MySQL 
- Bootstrap / TailwindCSS (opsional)
- Laravel Blade Templates
- RESTful Controller & Routing
- Eloquent ORM

---

## 📂 Struktur Database (Singkat)

| Entity         | Keterangan                                  |
|----------------|----------------------------------------------|
| `products`     | Informasi produk termasuk harga beli/jual   |
| `stock_ins`    | Catatan barang masuk                        |
| `stock_outs`   | Catatan barang keluar                       |
| `suppliers`    | Data pemasok barang                         |
| `categories`   | Pengelompokan produk                        |
| `users`        | Data pengguna & peran (role)                |
| `reports`      | Data laporan dinamis (opsional)             |

---

## ⚙️ Instalasi

```bash
git clone https://github.com/username/b2b-inventory-laravel.git
cd b2b-inventory-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
