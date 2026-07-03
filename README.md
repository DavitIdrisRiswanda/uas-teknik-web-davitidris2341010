# Cash Or Duel

Cash Or Duel merupakan aplikasi marketplace berbasis web yang dikembangkan menggunakan Laravel 12 sebagai proyek Ujian Akhir Semester (UAS) mata kuliah Pengembangan Layanan Teknologi Web. Aplikasi ini menyediakan fitur transaksi jual beli secara online dengan tiga jenis pengguna yaitu Admin, Seller, dan Buyer.

akun admin
admin@gmail.com
password : 12345678

akun buyer
davit@gmail.com
password : 12345678

akun seller
andre@gmail.com
password : 12345678

dara@gmail.com
password : 12345678

## Identitas

- Nama : Davit Idris Riswanda
- NIM : 2341010
- Mata Kuliah : Teknologi Web
- Framework : Laravel 12
- Database : MySQL
- Bahasa Pemrograman : PHP, HTML, CSS, JavaScript
- CSS Framework : Bootstrap 5

---

## Fitur

### Admin
- Login Admin
- Dashboard Admin
- Manajemen Kategori
- Manajemen Transaksi
- Monitoring Marketplace

### Seller
- Dashboard Seller
- CRUD Produk
- Upload Gambar Produk
- Manajemen Pesanan
- Update Status Pesanan
- Profil Seller
- Statistik Penjualan
- Produk Terlaris

### Buyer
- Registrasi & Login
- Marketplace Produk
- Detail Produk
- Keranjang Belanja
- Checkout
- Alamat Pengiriman
- Metode Pembayaran
- Riwayat Pesanan
- Profil Buyer

---

## Teknologi

- Laravel 12
- Bootstrap 5
- MySQL
- Chart.js
- Bootstrap Icons

---

## Cara Menjalankan Project

Clone repository

```bash
git clone https://github.com/DavitIdrisRiswanda/uas-teknik-web-davitidris2341010.git
```

Masuk ke folder project

```bash
cd uas-teknik-web-davitidris2341010
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Konfigurasi database pada file `.env`

Jalankan migration

```bash
php artisan migrate
```

Install Node Module

```bash
npm install
```

Compile asset

```bash
npm run dev
```

Jalankan aplikasi

```bash
php artisan serve
```

Akses melalui browser

```
http://127.0.0.1:8000
```

---

## Struktur Pengguna

- Admin
- Seller
- Buyer

---

## Repository

https://github.com/DavitIdrisRiswanda/uas-teknik-web-davitidris2341010

---

## Lisensi

Project ini dibuat sebagai tugas Ujian Akhir Semester (UAS).
