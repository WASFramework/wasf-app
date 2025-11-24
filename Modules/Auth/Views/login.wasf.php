@extends('layouts/main')

@section('title', 'Login')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        @flash('error')
        @flash('success')
        <div class="card shadow-lg border-0 rounded-4 p-4"
             style="background: rgba(30,30,46,0.75); backdrop-filter: blur(12px);">
            <h3 class="fw-bold text-center mb-4 text-primary">
                <i class="bi bi-shield-lock-fill"></i> Login
            </h3>
            <form method="POST" action="{{ url('login') }}">
                <div class="mb-3">
                    <label>Email / Username</label>
                    <input name="login" type="text" class="form-control" placeholder="Email atau Username">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <button class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-4">
                <span class="text-secondary">Belum punya akun?</span>
                <a href="{{ url('register') }}" class="fw-semibold text-primary">Register</a>
            </div>
        </div>
    </div>
</div>

@endsection
