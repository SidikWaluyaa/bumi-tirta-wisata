<div align="center">

<img src="public/assets/img/bumi-tirta-logo.jpg" alt="Bumi Tirta Wisata Logo" width="200">

# SYSTEM INFORMASI OUTBOUND - BUMI TIRTA WISATA

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)](https://www.php.net)

System Informasi Manajemen Pemesanan Outbound di Bumi Tirta Wisata.

</div>

## 📋 Tentang Project

Bumi Tirta Wisata adalah aplikasi web komprehensif untuk mengelola layanan wisata outbound. Aplikasi ini memudahkan pengelolaan paket wisata, reservasi pelanggan, galeri, berita, dan manajemen tim.

## 🚀 Fitur Utama

- **Manajemen Paket Outbound**: Kelola berbagai paket wisata dan harga.
- **Sistem Reservasi**: Pemesanan online yang mudah bagi pelanggan.
- **CMS Berita & Galeri**: Update informasi terbaru dan dokumentasi kegiatan.
- **Manajemen Tim**: Profil instruktur dan staff.
- **Dashboard Admin**: Statistik dan kontrol penuh atas data sistem.
- **Responsive Design**: Tampilan yang optimal di desktop dan mobile.

## 🛠 Teknologi

- **Framework**: Laravel 12
- **Language**: PHP 8.2
- **Database**: MySQL
- **Frontend**: Blade Templates, Vanilla CSS, Tailwind CSS (Optional)
- **Tools**: Composer, NPM

## ⚙️ Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project di komputer lokal Anda:

1. **Clone Repository**

    ```bash
    git clone https://github.com/SidikWaluyaa/bumi-tirta-wisata.git
    cd bumi-tirta-wisata
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Migration & Seeder**
    Jalankan migrasi untuk membuat tabel database dan seed data awal.

    ```bash
    php artisan migrate --seed
    ```

5. **Jalankan Aplikasi**

    ```bash
    npm run dev
    # Buka terminal baru
    php artisan serve
    ```

    Akses aplikasi di `http://localhost:8000`.

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan fork repository ini dan buat pull request untuk perubahan yang Anda usulkan.

---

<div align="center">
    &copy; 2024 Bumi Tirta Wisata. All rights reserved.
</div>
