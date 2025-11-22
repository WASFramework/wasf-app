# 🚀 WASF PHP Framework

---

# ✨ Fitur Utama

* ⚡ **Super Lightweight** — cepat, kecil, dan hemat resource
* 🧩 **Arsitektur HMVC Modular**
* 🧱 **Blade Templating Engine**
* 🛠 **Powerful Console Commands**
* 🧬 **Autoloading PSR-4 Composer**
* 🔐 **Dukungan .env**
* 🔑 **WASF_KEY Generator**
* 🗄 **PDO Database Wrapper**
* 📦 **Extensible — mudah dikembangkan**

---

# ⚡ Instalasi

## Opsi 1 — WASF Installer (Rekomendasi)

Install installer:

```bash
composer global require wasframework/wasf-installer
```

Buat project baru:

```bash
wasf new myproject
cd myproject
```

## Opsi 2 — Composer

```bash
composer create-project wasframework/wasf-app myproject
cd myproject
```

## Setup Environment

```bash
cp .env.example .env
```

Atur database:

```env
DB_HOST=localhost
DB_PORT=3306
DB_NAME=wasf_database
DB_USER=root
DB_PASS=
DB_CHARSET=utf8mb4
DB_CONNECTION=mysql
```

## Generate Key

```bash
php wasf key:generate
```

## Jalankan Server

```bash
php wasf serve
```

Akses:

```
http://localhost:8000
```

---

# 📚 Struktur Direktori

```txt
app/
 ├─ Controllers/
 ├─ Models/
 └─ Views/
bootstrap/
config/
public/
resources/
Modules/
 └─ Blog/
     ├─ Controllers/
     ├─ Models/
     ├─ Views/
     └─ routes.php
routes/
 └─ web.php
storage/
vendor/
```

---

# 🧱 Routing

```php
$router->get('/', 'HomeController@index');
$router->get('/user/{id}', 'UserController@show');
$router->post('/login', 'AuthController@login');
```

---

# 🧩 Module HMVC

```bash
php wasf make:module Blog
```

```txt
Modules/Blog/
 ├─ Controllers/
 ├─ Models/
 ├─ Views/
 └─ routes.php
```

---

# 🛠 Generator CLI

```bash
php wasf make:controller UserController
php wasf make:model User
php wasf make:migration create_users_table
php wasf migrate
```

---

# 🔧 Utilitas Tambahan

```bash
php wasf route:list
php wasf clear:view
```

---

# 🧪 Mode Development

```bash
composer dump-autoload
```

---

# 🧵 Kontribusi

1. Fork repository
2. Buat branch feature baru
3. Commit perubahan
4. Pull request ke `main`

---

# 🛡 Keamanan

Laporkan masalah keamanan ke:
📧 **[wasuryanto3@gmail.com](mailto:wasuryanto3@gmail.com)**

---

# 🗺️ Roadmap

* Routing middleware 
* CSRF Protection
* Session Encryption
* Built-in Authentication
* Database Migration Tracking
* Validation System
* ebsocket Support
* CLI Installer
* Debug Toolbar

---

# 📄 Lisensi

MIT License

---

# 🧵 Repositori

* **Core:** [https://github.com/WASFramework/wasf-core](https://github.com/WASFramework/wasf-core)
* **App Template:** [https://github.com/WASFramework/wasf-app](https://github.com/WASFramework/wasf-app)
