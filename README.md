🚀 WASF PHP Framework

Lightweight • Modular • Fast

WASF adalah framework PHP modern yang mengusung konsep sederhana, modular, dan mudah dikembangkan. Dibangun dengan pendekatan HMVC, Blade templating, dan console command, WASF cocok untuk developer yang ingin membuat aplikasi cepat tanpa kompleksitas berlebihan.

<p align="center"> <img src="" alt="WASF Logo" width="180px"> </p> <p align="center"> <strong>Simpel. Cepat. Produktif.</strong><br> Framework minimalis untuk aplikasi modern. </p>

✨ Fitur Utama

⚡ Super Lightweight — Cepat, kecil, dan tidak boros resource

🧩 Modular HMVC Architecture — Module terisolasi & scalable

🧱 Blade Templating Engine — View lebih bersih dan powerful

🛠 Powerful Console Commands — Generator otomatis untuk semua komponen

🧬 Autoloading Full Composer (PSR-4)

🗂 Routing Modern — Bersih, simpel, fleksibel

🗄 Database PDO Wrapper — Mudah dikustomisasi

🔐 Environment (.env) Support

🔑 Application Key (WASF_KEY)

📦 Extensible — Mudah ditambah package lain

📦 Instalasi
1️⃣ Buat project baru
composer create-project abesarrr/wasf-app myproject
cd myproject

2️⃣ Setup environment
cp .env.example .env


Isi konfigurasi database:

DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wasfapp
DB_USERNAME=root
DB_PASSWORD=

3️⃣ Generate Application Key
php wasf key:generate

4️⃣ Jalankan Development Server
php wasf serve


Akses:

http://localhost:8080

📚 Struktur Direktori
app/
 ├─ Controllers/
 ├─ Models/
 ├─ Views/
 └─ Modules/
      └─ Blog/
bootstrap/
config/
public/
resources/
routes/
 └─ web.php
storage/
vendor/

🧱 Routing

Contoh route sederhana:

$router->get('/', 'HomeController@index');


Route dengan parameter:

$router->get('/user/{id}', 'UserController@show');


Route POST:

$router->post('/login', 'AuthController@login');

🧩 Module HMVC

Buat module baru:

php wasf make:module Blog


Struktur module:

Modules/Blog/
 ├─ Controllers/
 ├─ Models/
 ├─ Views/
 └─ routes.php

🛠 Generator CLI
Controller
php wasf make:controller UserController

Model
php wasf make:model User

Migration
php wasf make:migration create_users_table

Jalankan migration
php wasf migrate

🔧 Konfigurasi Tambahan
📌 Mengubah Port Server
php wasf serve --port=9090

📌 Menampilkan Daftar Route
php wasf route:list

📌 Membersihkan Cache View
php wasf clear:view

🧪 Mode Development

Regenerasi autoload ketika menambah class baru:

composer dump-autoload

🧵 Kontribusi

Kami sangat terbuka untuk kontribusi!
Caranya:

Fork repository

Buat branch feature baru

Commit perubahan

Buat pull request ke main

🛡 Keamanan

Jika menemukan celah keamanan, jangan buat issue publik.
Silakan email langsung:

📧 wasuryanto3@gmail.com

(subjek: "WASF Security Report")

🗺️ Roadmap

 Routing middleware

 CSRF Protection

 Session Encryption

 Built-in Authentication

 Database Migration Tracking

 Validation System

 Websocket Support

 CLI Installer

 Debug Toolbar

📄 Lisensi

WASF Framework dirilis dengan lisensi MIT.

🧵 Repositori Resmi

Core: https://github.com/abesarrr/wasf-core

App Template: https://github.com/abesarrr/wasf-app
