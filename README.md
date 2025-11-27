<div align="center">
  <img src="https://img.shields.io/badge/Laravel-v12-red?style=flat-square" />
  <img src="https://img.shields.io/badge/TailwindCSS-v3-blue?style=flat-square" />
  <img src="https://img.shields.io/badge/MySQL-8.0-orange?style=flat-square" />
  <img src="https://img.shields.io/badge/PHP-8.3-green?style=flat-square" />
</div>

<br>

<h1 align="center">🚀 StandHub — Stand Management System</h1>
<p align="center">
  Platform modern untuk mengelola stand bazaar, booking, vendor, pembayaran, dan notifikasi — dibangun dengan Laravel + Tailwind.
</p>

<br>

<div align="center">
  <img src="https://avatars.githubusercontent.com/u/143876980?v=4" width="20%" />
</div>

<br>

---

## ✨ Features

- 🔐 **Multi-Role Authentication** (Admin & Vendor)
- 🏬 **Stand Management** (CRUD, availability, filtering)
- 📅 **Fast Booking System** (real-time status update)
- 💳 **Payment Upload & Verification**
- 🔔 **Smart Notification System**
- 📊 **Modern Dashboard** untuk Admin & Vendor
- 📁 **File Uploading (bukti pembayaran, dokumen)**
- 📨 **Email Alerts**
- 🎨 **Clean UI** — fully responsive, Tailwind powered

---

## 🧱 Tech Stack

| Layer | Tech |
|------|------|
| Backend | Laravel 12, PHP 8.3 |
| Frontend | TailwindCSS, Blade Components |
| Database | MySQL 8 / MariaDB |
| Tools | Vite, Composer, npm, Cloudflare Tunnel |
| Deployment | Vercel / Cloudflare / Railway |


---

## ⚡ Installation

### 1️⃣ Clone Repository
```bash
git clone https://github.com/ryandaaa/StandHub.git
cd repo-name
```

2️⃣ Install Dependencies
```bash
composer install
npm install
npm run build # atau npm run dev untuk development
```
3️⃣ Setup Environment

Copy .env:
```bash
cp .env.example .env
```

Generate app key:
```bash
php artisan key:generate
```

4️⃣ Import Database
```bash
php artisan migrate --seed
```

5️⃣ Run Local Server
```bash
php artisan serve
```

🔑 Default Credentials (Dummy)
Role	Email	Password

Admin	admin@standhub.test	password

Vendor	vendor@example.com	password

🧪 API Support
Project ini sudah siap untuk pengembangan API jika ingin dibuat aplikasi mobile.

Struktur endpoint bisa dikembangkan di:
```bash
routes/api.php
```

Pull requests dipersilakan.
Bug, saran fitur, atau diskusi bisa buka Issue.

📜 License
MIT — bebas digunakan untuk apapun.

<div align="center"> Made with ❤️ & ☕ by <strong>Ryanda</strong> </div> ```
