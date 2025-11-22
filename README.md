# 🚀 WASF PHP Framework

**Lightweight • Modular • Fast**

WASF adalah framework PHP modern yang mengusung konsep sederhana, modular, dan mudah dikembangkan. Dibangun dengan pendekatan HMVC, Blade templating, dan console command, WASF cocok untuk developer yang ingin membuat aplikasi cepat tanpa kompleksitas berlebihan.

<p align="center">
  <img src="" alt="WASF Logo" width="180px">
</p>

<p align="center">
  <strong>Simpel. Cepat. Produktif.</strong><br>
  Framework minimalis untuk aplikasi modern.
</p>

---

## ✨ Fitur Utama

- ⚡ **Super Lightweight** — Cepat, kecil, dan tidak boros resource
- 🧩 **Modular HMVC Architecture** — Module terisolasi & scalable
- 🧱 **Blade Templating Engine** — View lebih bersih dan powerful
- 🛠 **Powerful Console Commands** — Generator otomatis untuk semua komponen
- 🧬 **Autoloading Full Composer (PSR-4)**
- 🗂 **Routing Modern** — Bersih, simpel, fleksibel
- 🗄 **Database PDO Wrapper** — Mudah dikustomisasi
- 🔐 **Environment (.env) Support**
- 🔑 **Application Key (WASF_KEY)**
- 📦 **Extensible** — Mudah ditambah package lain

---

# 📦 Instalasi

### 1️⃣ Buat project baru

```bash
composer create-project abesarrr/wasf-app myproject
cd myproject
```

### 2️⃣ Setup environment

```bash
cp .env.example .env
```

Isi konfigurasi database:

```env
DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wasfapp
DB_USERNAME=root
DB_PASSWORD=
```

### 3️⃣ Generate Application Key

```bash
php wasf key:generate
```

### 4️⃣ Jalankan Development Server

```bash
php wasf serve
```

Akses:

```
http://localhost:8080
```

---

# 📚 Struktur Direktori

```txt
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
```

---

# 🧱 Routing

```php
$router->get('/', 'HomeController@index');
```

```php
$router->get('/user/{id}', 'UserController@show');
```

```php
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
```

```bash
php wasf make:model User
```

```bash
php wasf make:migration create_users_table
```

```bash
php wasf migrate
```

---

# 🔧 Konfigurasi Tambahan

```bash
php wasf serve --port=9090
```

```bash
php wasf route:list
```

```bash
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
4. Buat pull request ke `main`  

---

# 🛡 Keamanan

Laporkan masalah keamanan ke:

📧 **wasuryanto3@gmail.com**

---

# 🗺️ Roadmap

- [ ] Routing middleware  
- [ ] CSRF Protection  
- [ ] Session Encryption  
- [ ] Built-in Authentication  
- [ ] Database Migration Tracking  
- [ ] Validation System  
- [ ] Websocket Support  
- [ ] CLI Installer  
- [ ] Debug Toolbar  

---

# 📄 Lisensi

MIT License

---

# 🧵 Repositori Resmi

Core: https://github.com/abesarrr/wasf-core  
App Template: https://github.com/abesarrr/wasf-app  
