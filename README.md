# BantuAja

BantuAja adalah platform donasi digital berbasis Laravel yang menghubungkan kebaikan hati Anda dengan mereka yang membutuhkan, menciptakan dampak nyata untuk Indonesia yang lebih baik.

## Fitur Utama

-   Donasi online dengan berbagai metode pembayaran (Midtrans)
-   Manajemen kampanye donasi
-   Riwayat donasi dan statistik kontribusi
-   Dashboard user dengan statistik dan aktivitas
-   Sistem autentikasi dan otorisasi (Spatie, Breeze)
-   Komponen UI modern dengan Tailwind CSS
-   Breadcrumbs dan layout dinamis
-   Halaman About, Contact, dan Error yang informatif

## Teknologi

-   **Laravel 12**
-   **Spatie Permission** (role & permission management)
-   **Laravel Breeze** (auth scaffolding)
-   **Midtrans** (payment gateway)
-   **Tailwind CSS**
-   **Pest** (testing)

## Instalasi

1. **Clone repository**
    ```bash
    git clone https://github.com/username/bantuaja.git
    cd bantuaja
    ```
2. **Install dependencies**
    ```bash
    composer install
    npm install
    npm run build
    ```
3. **Copy file environment**
    ```bash
    cp .env.example .env
    ```
4. **Generate key & migrate database**
    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```
5. **Konfigurasi Midtrans**

    - Isi `config/midtrans.php` dengan server key dan client key dari dashboard Midtrans
    - Pastikan mode environment sesuai (sandbox/production)

6. **Jalankan server**
    ```bash
    php artisan serve
    ```

## Struktur Folder

-   `app/Http/Controllers` — Controller utama
-   `app/Models` — Model Eloquent
-   `resources/views` — Blade views & components
-   `routes/web.php` — Routing aplikasi
-   `config/` — Konfigurasi aplikasi
-   `database/migrations` — Struktur database

## Fitur Donasi

-   Pilih kampanye, masukkan nominal, lakukan pembayaran
-   Status donasi otomatis update setelah pembayaran sukses
-   Riwayat donasi dan detail pembayaran tersedia di dashboard

## Fitur Admin

-   Manajemen kampanye, donasi, user
-   Role & permission dengan Spatie

## Testing

-   Jalankan test dengan Pest:
    ```bash
    ./vendor/bin/pest
    ```

## Kontribusi

Pull request dan issue sangat diterima! Silakan fork dan submit PR untuk fitur baru atau perbaikan bug.

## Lisensi

MIT

---

**BantuAja** — Bersama kita bantu Indonesia lebih baik.
