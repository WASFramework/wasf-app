<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name')) - {{ config('app.name') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===========================
        SEO META
    ============================ -->
    <meta name="description" content="A modern lightweight PHP framework designed for developers. Fast, modular, and easy to customize.">
    <meta name="keywords" content="php framework, hmvc, web developer, routing engine, mvc, lightweight framework">
    <meta name="author" content="WasFramework Team">

    <!-- Canonical -->
    <link rel="canonical" href="<?= url()->current() ?>">

    <!-- OpenGraph -->
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="A modern lightweight PHP framework designed for developers. Fast, modular, and customizable.">
    <meta property="og:url" content="<?= url()->current() ?>">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/assets/img/opengraph.png">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="A modern lightweight PHP framework designed for developers.">
    <meta name="twitter:image" content="/assets/img/opengraph.png">

    <!-- Theme Color -->
    <meta name="theme-color" content="#0d6efd">

    <!-- ===========================
        ICONS
    ============================ -->
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16.png">
    <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
    <link rel="manifest" href="/manifest.json">

    <!-- Bootstrap -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>

/* =======================================================
   GLOBAL LAYOUT (Sticky Footer + Flex Layout + Dark Neon)
======================================================= */
html, body { height: 100%; }
body {
    display: flex;
    flex-direction: column;
    color: #ddd;
}
main { flex: 1; }

/* =======================================================
   HERO NEON
======================================================= */
.hero-neon {
    padding: 100px 20px;
    text-align: center;
    color: #fff;
    background: radial-gradient(circle at top,#1e1e2e 0%,#111 60%,#000 100%);
    border-radius:22px; position:relative; overflow:hidden;
}
.hero-neon::before,
.hero-neon::after {
    content:""; position:absolute; width:280px; height:280px;
    border-radius:50%; filter:blur(110px); opacity:.55;
}
.hero-neon::before { top:-50px; left:-60px; background:#0d6efd; }
.hero-neon::after { bottom:-60px; right:-50px; background:#d633ff; }

.neon-title { font-size:3rem; font-weight:800; text-shadow:0 0 35px rgba(0,132,255,.55); }
.neon-sub { font-size:1.3rem; opacity:.9; max-width:650px; margin:auto; }

/* Buttons */
.neon-btn {
    padding:14px 34px; font-size:1.1rem; border-radius:12px;
    text-decoration:none; transition:.25s; display:inline-block;
}
.neon-btn-primary {
    background:#0d6efd; color:#fff;
    box-shadow:0 0 18px rgba(0,123,255,.55);
}
.neon-btn-primary:hover {
    transform:translateY(-3px);
    box-shadow:0 0 30px rgba(0,123,255,.85);
}

/* =======================================================
   DEV BOX
======================================================= */
.dev-box {
    border-radius:16px;
    background:#1e1e2e;
    border:1px solid rgba(255,255,255,.08);
    color:#ddd;
}

/* =======================================================
   THEME SWITCH (Original)
======================================================= */
.theme-switch {
    width:48px; height:26px; background:#374151;
    border-radius:30px; position:relative; cursor:pointer;
}
.theme-switch.dark { background:#0d6efd; }
.theme-switch .knob {
    width:22px;height:22px; background:#fff; border-radius:50%;
    position:absolute; top:2px; left:2px; transition:.25s;
}
.theme-switch.dark .knob { transform:translateX(22px); }

.switch-icon {
    position:absolute; top:50%; transform:translateY(-50%);
    font-size:13px; pointer-events:none;
}
.icon-sun { left:6px; color:bisque; }
.icon-moon { right:6px; opacity:0; }
.theme-switch.dark .icon-sun { opacity:0; }
.theme-switch.dark .icon-moon { opacity:1; color:darkgray; }

/* =======================================================
   AVATAR
======================================================= */
.avatar-sm {
    width:38px; height:38px; border-radius:50%; object-fit:cover;
    cursor:pointer;
}

/* =======================================================
   ANIMATION
======================================================= */
.fade-up { opacity:0; transform:translateY(10px); animation:fadeUp .5s forwards ease-out; }
@keyframes fadeUp { to { opacity:1; transform:translateY(0);} }

/* =======================================================
   VUEXY NAVBAR – SUPER CLEAN VERSION
======================================================= */
.layout-navbar {
    background:rgba(20,20,26,.55);
    backdrop-filter:blur(14px);
    height:70px;
    display:flex;
    align-items:center;
    border-bottom:1px solid rgba(255,255,255,.08);
}

[data-bs-theme="light"] .layout-navbar {
    background:rgba(255,255,255,.85);
    border-bottom:1px solid rgba(0,0,0,.08);
}

.navbar-brand {
    display:flex;
    align-items:center;
    gap:.5rem;
}

.landing-nav-menu .nav-link {
    padding:8px 12px !important;
    font-weight:500;
    border-radius:6px;
    font-size:0.95rem;
    cursor:pointer;
}
.landing-nav-menu .nav-link:hover {
    background:rgba(0,123,255,0.12);
    color:var(--bs-primary) !important;
}

/* Dropdown */
.navbar .dropdown-toggle { cursor:pointer; }
.dropdown-menu {
    padding:10px 0 !important;
    border-radius:12px;
    margin-top:14px !important;
    animation:fadeIn .18s ease-out;
}
.dropdown-item {
    padding:10px 16px;
    font-size:.9rem;
    border-radius:8px;
    cursor:pointer;
}
.dropdown-item:hover {
    background:rgba(0,123,255,0.12);
}

/* MOBILE NAV */
.landing-menu-overlay { display:none; }

@media (max-width:991px)
{
    .landing-nav-menu {
        background:var(--bs-body-bg);
        position:fixed;
        top:0; right:0;
        width:270px;
        height:100vh;
        padding:80px 20px 20px;
        overflow-y:auto;
        transform:translateX(100%);
        transition:transform .3s ease;
        z-index:2000;
        border-left:1px solid rgba(255,255,255,.1);
    }
    .navbar-collapse.show {
        transform:translateX(0) !important;
    }

    .navbar-collapse.show + .landing-menu-overlay {
        display:block !important;
        position:fixed;
        inset:0;
        background:rgba(0,0,0,.45);
        z-index:1500;
    }

    .landing-nav-menu .navbar-toggler {
        position:absolute;
        top:15px;
        right:10px;
        z-index:2200;
        cursor:pointer;
    }

    .landing-nav-menu .nav-link {
        padding:12px 0 !important;
        font-size:1.05rem;
        border-radius:0;
    }

    .dropdown-menu {
        position:absolute !important;
        top:55px !important;
        border-radius:10px;
        border:1px solid rgba(255,255,255,0.08);
        background:var(--bs-body-bg);
    }

    .dropdown-item {
        padding:12px 18px !important;
    }
}

/* RIGHT TOOLBAR */
.navbar-nav.ms-auto {
    gap:12px !important;
    align-items:center;
}

.theme-icon-active { cursor:pointer; }

@keyframes fadeIn {
    from { opacity:0; transform:scale(.94); }
    to   { opacity:1; transform:scale(1); }
}

/* Spacing fix */
.mt-nav { margin-top:90px; }

</style>
</head>
<body>

<!-- =======================================================
     NAVBAR
======================================================= -->
<nav class="layout-navbar shadow-none sticky-top">
  <div class="container">
    <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">

      <div class="navbar-brand app-brand d-flex align-items-center py-0 me-4">
        <a href="/" class="app-brand-link d-flex align-items-center text-decoration-none">
          <span class="fw-bold fs-4">{{ config('app.name') }}</span>
        </a>
      </div>

      <!-- RIGHT TOOLBAR -->
      <ul class="navbar-nav ms-auto flex-row gap-3 align-items-center">

        <!-- THEME DROPDOWN -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i id="themeIcon" class="bi bi-brightness-high fs-4 theme-icon-active"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li><button class="dropdown-item d-flex gap-2" onclick="setTheme('light')"><i class="bi bi-sun"></i>Light</button></li>
            <li><button class="dropdown-item d-flex gap-2" onclick="setTheme('dark')"><i class="bi bi-moon-stars"></i>Dark</button></li>
            <li><button class="dropdown-item d-flex gap-2" onclick="setTheme('auto')"><i class="bi bi-laptop"></i>System</button></li>
          </ul>
        </li>

        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle p-0" data-bs-toggle="dropdown">
            <img src="{{ auth()->user()->photo ? '/uploads/profile/' . auth()->user()->photo : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                 class="avatar-sm shadow-sm">
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li class="dropdown-item">{{ auth()->user()->name }}</li>
            <li><a href="/profile" class="dropdown-item"><i class="bi bi-person me-2"></i>Profile</a></li>
            <li><a href="/profile/edit" class="dropdown-item"><i class="bi bi-gear me-2"></i>Settings</a></li>
            <li><hr></li>
            <li><a href="/logout" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
          </ul>
        </li>
        @endauth

        @guest
        <li><a href="/login" class="btn btn-primary px-3">Login/Register</a></li>
        @endguest

      </ul>

    </div>
  </div>
</nav>


<!-- CONTENT -->
<main class="container py-5 fade-up mt-nav">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="text-center py-4 text-secondary small">
    {{ config('app.name') }} v{{ config('app.version') }} — © {{ date('Y') }}
</footer>

<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
/* Theme Controller + Icon Auto Update */
function updateThemeIcon() {
    const mode = localStorage.getItem("bs-theme") || "auto";
    const icon = document.getElementById("themeIcon");

    if (mode === "light") {
        icon.className = "bi bi-brightness-high fs-4 theme-icon-active"; 
        return;
    }
    if (mode === "dark") {
        icon.className = "bi bi-moon-stars fs-4 theme-icon-active"; 
        return;
    }
    icon.className = "bi bi-laptop fs-4 theme-icon-active"; 
}

function setTheme(mode){
    localStorage.setItem("bs-theme",mode);
    const root=document.documentElement;

    if(mode==="auto"){
        const prefers=window.matchMedia("(prefers-color-scheme: dark)").matches;
        root.setAttribute("data-bs-theme",prefers?"dark":"light");
    } else {
        root.setAttribute("data-bs-theme",mode);
    }

    updateThemeIcon();
}

(function(){
    setTheme(localStorage.getItem("bs-theme") || "auto");
})();
</script>

</body>
</html>
