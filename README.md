<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10-red.svg" alt="Laravel v10">
  <img src="https://img.shields.io/badge/Made%20With-Love-orange.svg" alt="Made with Love">
  <img src="https://img.shields.io/badge/PRs-welcome-brightgreen.svg" alt="PRs Welcome">
  <img src="https://img.shields.io/badge/status-developing-yellow.svg" alt="Project Status">
  <img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="MIT License">
</p>

---

## 📦 SmartStock - B2B Inventory Management System (SaaS Laravel)

**SmartStock** adalah aplikasi manajemen inventaris berbasis Laravel dengan model **SaaS (Software as a Service)**. Dirancang untuk UMKM, supplier, dan bisnis kecil-menengah, aplikasi ini mempermudah pengelolaan stok, transaksi pembelian & penjualan, serta analisis laporan berbasis data real-time.

---

## 🚀 Fitur Unggulan

### 🔐 Otentikasi & Akses

-   Multi-auth user (admin, staf)
-   Hak akses berdasarkan peran
-   Sistem login aman & sederhana (Laravel Breeze)

### 📦 Manajemen Inventaris

-   CRUD produk, kategori, supplier
-   Pemisahan harga beli & harga jual
-   Minimum stock notification

### 📥 Barang Masuk

-   Input barang dari supplier
-   Histori pembelian terstruktur
-   Penghitungan biaya otomatis

### 📤 Barang Keluar

-   Catat transaksi penjualan
-   Pelacakan barang terlaris

### 📊 Laporan Analitik

-   Laporan stok real-time
-   Rekap pembelian & penjualan
-   Analisis margin keuntungan _(Coming soon)_
-   Filter data berdasarkan tanggal/kategori/supplier
-   Ekspor PDF & Excel _(Coming soon)_

---

## 🧱 Teknologi yang Digunakan

-   Laravel 10
-   Laravel Breeze
-   MySQL / MariaDB
-   TailwindCSS / Bootstrap (opsional)
-   Blade Template Engine
-   RESTful Routing
-   Eloquent ORM

---

## 📂 Struktur Database (Singkat)

| Entity       | Keterangan                                |
| ------------ | ----------------------------------------- |
| `products`   | Informasi produk & harga beli/jual        |
| `stock_ins`  | Barang masuk dari supplier                |
| `stock_outs` | Barang keluar untuk penjualan             |
| `suppliers`  | Data pemasok                              |
| `categories` | Kategori produk                           |
| `users`      | Role & otentikasi pengguna                |
| `reports`    | Penyimpanan laporan terstruktur _(opsional)_ |

---

## ⚙️ Instalasi Lokal

```bash
git clone https://github.com/Hbiiiii2/SmartStock-app.git
cd SmartStock-app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
