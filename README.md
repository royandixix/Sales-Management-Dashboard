# Sales Management Dashboard

Sales Management Dashboard adalah aplikasi **admin dashboard** berbasis **Laravel & Filament**
yang digunakan untuk mengelola data penjualan, barang, customer, dan faktur.
Aplikasi ini **hanya dapat diakses oleh admin** (tidak ada user publik).

---

## 📌 Fitur

- 🔐 Login Admin
- 📦 Manajemen Data Barang
- 👥 Manajemen Data Customer
- 🧾 Manajemen Faktur
- 📑 Detail Transaksi Penjualan
- 💰 Perhitungan Total & Diskon
- 🗑️ Soft Delete Faktur
- 📊 Dashboard Admin (Filament)

---

## 🛠️ Teknologi

- Laravel
- Filament Admin Panel
- MySQL
- PHP 8+
- Tailwind CSS

---

## 📂 Struktur Database

Tabel utama:
- `users` (Admin)
- `barangs`
- `customer`
- `faktur`
- `detail`
- `penjualan`

---

## 🚀 Instalasi

```bash
git clone https://github.com/royandixix/Sales-Management-Dashboard.git
cd Sales-Management-Dashboard
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

🔐 Akun Admin

Aplikasi ini tidak menyediakan registrasi.
Admin dibuat manual:
php artisan tinker
User::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('password'),
]);
/admin
