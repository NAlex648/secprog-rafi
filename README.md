# 🔐 URL Shortener Web App – Secure Programming

**Nama:** Mohammad Rafi Imansyah  
**NIM:** 2502006953  
**Mata Kuliah:** Secure Programming (SP)  
**Deskripsi Proyek:** Tugas individu membuat aplikasi PHP sederhana yang mengimplementasikan konsep keamanan dasar.

## 📋 Deskripsi Aplikasi

Aplikasi ini adalah **URL Shortener** berbasis PHP yang memungkinkan pengguna untuk mendaftarkan akun, masuk (login), dan memperpendek tautan (URL) menjadi **slug** kustom. Setiap pengguna hanya dapat melihat dan mengelola tautan miliknya sendiri.

## ⚙️ Fitur Utama

- 🔐 User Registration & Login
- ✂️ URL Shortening dengan custom slug
- 📈 Tracking jumlah kunjungan (visit count)
- 📄 Dashboard pribadi pengguna
- 🚪 Logout

## 🛠️ Cara Menjalankan

1. Pastikan Anda memiliki **XAMPP** dan telah mengaktifkan Apache + MySQL.
2. Clone atau copy folder ini ke dalam `htdocs`, misalnya:
   ```
   C:\XAMPP\htdocs\secprog-rafi
   ```
3. Import database:
   - Buka **phpMyAdmin**.
   - Buat database bernama `secprog`.
   - Import file SQL yang disediakan (atau jalankan manual perintah SQL untuk membuat tabel `users` dan `urls`).
4. Akses aplikasi melalui browser:
   ```
   http://localhost/secprog-rafi/public/
   ```

## 🧱 Struktur Folder

```
secprog-rafi/
│
├── inc/                 # Berisi file koneksi DB dan auth
│   ├── db.php
│   └── auth.php
│
├── public/              # Halaman publik dan dashboard
│   ├── index.php        # Login page
│   ├── register.php     # Register page
│   ├── do_register.php
│   ├── login.php
│   ├── logout.php
│   ├── dashboard.php
│   ├── shorten.php
│   └── [slug handler]
│
└── README.md
```

## 📌 Catatan/Disclaimer
- Untuk keperluan efisiensi waktu tugas ini, password **tidak di-hash**.
- Pastikan untuk tidak menggunakan password asli saat testing.
- Aplikasi ini **belum** menerapkan semua prinsip secure coding secara lengkap (misal: CSRF protection, XSS sanitization, dll).
