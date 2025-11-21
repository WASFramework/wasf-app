@extends('layouts/main')

@section('title', 'Register')

@section('content')

@flash('success')
@flash('error')

@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow-lg border-0 rounded-4 p-4"
             style="background: rgba(30,30,46,0.75); backdrop-filter: blur(12px);">

            <h3 class="fw-bold text-center mb-4 text-primary">
                <i class="bi bi-person-plus-fill"></i> Register
            </h3>

            <form method="POST" action="/register" class="mt-3">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control form-control-lg rounded-3"
                           placeholder="Masukkan nama anda" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg rounded-3"
                           placeholder="Masukkan email" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg rounded-3"
                           placeholder="Buat password" required>
                </div>

                <button class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">
                    <i class="bi bi-person-check-fill"></i> Register
                </button>

            </form>

            <div class="text-center mt-4">
                <span class="text-secondary">Sudah punya akun?</span>
                <a href="/login" class="fw-semibold text-primary">Login</a>
            </div>

        </div>

    </div>
</div>

@endsection
