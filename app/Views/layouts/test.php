<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>

/* =======================================================
   GLOBAL LAYOUT (Sticky Footer + Flex Layout + Dark Neon)
======================================================= */
html, body {
    height: 100%;
}
body {
    display: flex;
    flex-direction: column;
    color: #ddd;
}
main {
    flex: 1; /* membuat footer tetap di bawah */
}

/* =======================================================
   HERO NEON (TEAM E)
======================================================= */
.hero-neon {
    padding: 100px 20px;
    text-align: center;
    color: #fff;
    background: radial-gradient(circle at top, #1e1e2e 0%, #111 60%, #000 100%);
    border-radius: 22px;
    position: relative;
    overflow: hidden;
}

/* Neon glow background */
.hero-neon::before,
.hero-neon::after {
    content:"";
    position:absolute;
    width:280px; height:280px;
    border-radius:50%;
    filter: blur(110px);
    opacity:0.55;
}
.hero-neon::before {
    top:-50px; left:-60px;
    background:#0d6efd;
}
.hero-neon::after {
    bottom:-60px; right:-50px;
    background:#d633ff;
}

/* Title Neon */
.neon-title {
    font-size: 3rem;
    font-weight:800;
    letter-spacing:-1px;
    text-shadow:0 0 35px rgba(0, 132, 255, 0.55);
}

/* Subtitle */
.neon-sub {
    font-size:1.3rem;
    opacity:0.9;
    max-width:650px;
    margin:auto;
}

/* Neon buttons */
.neon-btn {
    padding:14px 34px;
    font-size:1.1rem;
    border-radius:12px;
    text-decoration:none;
    transition:0.25s;
    display:inline-block;
}
.neon-btn-primary {
    background:#0d6efd;
    color:#fff;
    box-shadow:0 0 18px rgba(0, 123, 255, .55);
}
.neon-btn-primary:hover {
    transform:translateY(-3px);
    box-shadow:0 0 30px rgba(0, 123, 255, .85);
}
.neon-btn-secondary {
    background:#6f42c1;
    color:#fff;
    box-shadow:0 0 18px rgba(111, 66, 193, .55);
}
.neon-btn-secondary:hover {
    transform:translateY(-3px);
    box-shadow:0 0 30px rgba(155, 66, 233, .85);
}

/* Developer box dark neon */
.dev-box {
    border-radius:16px;
    background:#1e1e2e;
    border:1px solid rgba(255,255,255,.08);
    color:#ddd;
}

/* =======================================================
   NAVBAR GLASS NEON
======================================================= */
.glass-nav {
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    background: rgba(20,20,26,0.55) !important;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
[data-bs-theme="light"] .glass-nav {
    background: rgba(255,255,255,0.65) !important;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

/* =======================================================
   THEME SWITCH (DESKTOP + MOBILE)
======================================================= */
.theme-switch {
    width: 48px;
    height: 26px;
    background: #374151;
    border-radius: 30px;
    position: relative;
    cursor: pointer;
    transition: background .3s;
}
.theme-switch.dark {
    background: #0d6efd;
}

.theme-switch .knob {
    width: 22px;
    height: 22px;
    background: white;
    border-radius: 50%;
    position: absolute;
    top: 2px; left: 2px;
    transition: transform .25s;
    box-shadow:0 3px 8px rgba(0,0,0,.25);
}
.theme-switch.dark .knob {
    transform: translateX(22px);
}

/* icons */
.switch-icon {
    position: absolute;
    top: 50%; transform: translateY(-50%);
    font-size: 13px;
    color: #fff;
    pointer-events: none;
    transition: opacity .3s;
}
.icon-sun { left: 6px; opacity: 1; color: bisque;}
.icon-moon { right: 6px; opacity: 0; }

.theme-switch.dark .icon-sun { opacity: 0; }
.theme-switch.dark .icon-moon { opacity: 1; color: darkgray;}

/* Mobile toggle always visible */
.theme-mobile { display: none; }
@media (max-width: 991px) {
    .theme-mobile { display: block !important; }
}

/* =======================================================
   AVATAR
======================================================= */
.avatar-sm {
    width:40px; height:40px; border-radius:50%; object-fit:cover;
}

/* =======================================================
   FADE ANIMATION
======================================================= */
.fade-up {
    opacity:0;
    transform:translateY(10px);
    animation: fadeUp .5s ease-out forwards;
}
@keyframes fadeUp {
    to { opacity:1; transform:translateY(0); }
}

</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg glass-nav sticky-top shadow-sm">
    <div class="container py-2">

        <a class="navbar-brand fw-bold text-primary" href="/">
            <?= config('app.name') ?>
        </a>

        <!-- MOBILE THEME TOGGLE -->
        <div class="theme-mobile me-3">
            <div id="themeSwitchMobile" class="theme-switch position-relative">
                <div class="knob"></div>
                <i class="bi bi-sun-fill switch-icon icon-sun"></i>
                <i class="bi bi-moon-stars-fill switch-icon icon-moon"></i>
            </div>
        </div>

        <button class="navbar-toggler border-0 text-primary" data-bs-toggle="collapse" data-bs-target="#menu">
            <i class="bi bi-list fs-1"></i>
        </button>

        <div id="menu" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center gap-3">

                <!-- DESKTOP THEME TOGGLE -->
                <li class="d-none d-lg-block">
                    <div id="themeSwitchDesktop" class="theme-switch position-relative">
                        <div class="knob"></div>
                        <i class="bi bi-sun-fill switch-icon icon-sun"></i>
                        <i class="bi bi-moon-stars-fill switch-icon icon-moon"></i>
                    </div>
                </li>

                <!-- AUTH MENU -->
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">

                        @if(auth()->user()->photo)
                            <img src="/uploads/profile/{{ auth()->user()->photo }}" class="avatar-sm shadow-sm">
                        @else
                            <div class="avatar-sm bg-primary text-white d-flex justify-content-center align-items-center"
                                style="border-radius:50%; font-weight:bold;">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif

                        <span class="fw-semibold">{{ auth()->user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="/profile/edit"><i class="bi bi-pencil-square"></i> Edit Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>
                </li>
                @endauth

                @guest
                <li class="nav-item">
                    <a href="/login" class="btn btn-outline-primary px-3">Login</a>
                </li>
                <li class="nav-item">
                    <a href="/register" class="btn btn-primary px-3">Register</a>
                </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>

<!-- CONTENT -->
<main class="container py-5 fade-up">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="text-center py-4 text-secondary small">
    <?= config('app.name') ?> v<?= config('app.version') ?> — © <?= date('Y') ?>
</footer>

<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
/* =======================================================
   THEME ENGINE (Desktop + Mobile Sync)
======================================================= */

const root = document.documentElement;
const swDesktop = document.getElementById("themeSwitchDesktop");
const swMobile  = document.getElementById("themeSwitchMobile");

let mode = localStorage.getItem("bs-theme") || "auto";

function applyMode(m) {
    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
    const final = (m === "auto") ? (prefersDark ? "dark" : "light") : m;

    root.setAttribute("data-bs-theme", final);

    [swDesktop, swMobile].forEach(sw => {
        if (sw) sw.classList.toggle("dark", final === "dark");
    });
}

function toggleTheme(sw) {
    sw.addEventListener("click", () => {
        const now = root.getAttribute("data-bs-theme");
        const next = now === "dark" ? "light" : "dark";
        localStorage.setItem("bs-theme", next);
        applyMode(next);
    });
}

applyMode(mode);

if (swDesktop) toggleTheme(swDesktop);
if (swMobile) toggleTheme(swMobile);

</script>

</body>
</html>