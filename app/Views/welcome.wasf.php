@extends('layouts.main')

@section('title', 'Welcome')

@section('content')

<?php
$version   = config('app.version');
$appName   = config('app.name');
$isProd    = config('app.env');

$viewPath  = "app/Views/welcome.wasf.php";
$absPath   = base_path($viewPath);
$vscodeUrl = "vscode://file/" . str_replace("\\", "/", $absPath);
?>

<div class="hero-neon">

    <h1 class="neon-title fade-up">
        Welcome to <br>
        <?= $appName ?>
    </h1>

    <p class="neon-sub mt-2 fade-up">
        A modular, high-performance PHP framework with clean structure,  
        designed for developers who love speed and modern architecture.
    </p>

    <div class="mt-5 fade-up d-flex gap-3 justify-content-center flex-wrap">
        <a href="/docs" class="neon-btn neon-btn-primary" target="blank">
            Documentation
        </a>

        <a href="https://github.com/WASFramework" class="neon-btn neon-btn-secondary" target="blank">
            GitHub
        </a>
    </div>


    <div class="dev-box p-4 mt-5 shadow-sm fade-up mx-auto" style="max-width:650px;">
        <strong class="text-info">Developer Notice</strong>  
        <p class="small mt-2 mb-2">This page is located at:</p>
        <pre class="small text-primary mb-3"><?= $viewPath ?></pre>

        <a href="<?= $vscodeUrl ?>" class="btn btn-outline-info btn-sm">
            Open in VSCode
        </a>
    </div>

</div>

@endsection
