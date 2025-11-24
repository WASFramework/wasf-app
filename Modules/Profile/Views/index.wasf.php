@extends('layouts.main')
@section('title', 'My Profile')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        @flash('error')
        @flash('success')

        <div class="card shadow-lg border-0 rounded-4 p-4"
             style="background: rgba(30,30,46,0.75); backdrop-filter: blur(12px);">

            <div class="text-center mb-4">
                @if($user->photo)
                    <img src="{{ $user->photo }}"
                         class="rounded-circle shadow-sm"
                         width="130" height="130"
                         style="object-fit: cover;">
                @else
                    <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center shadow-sm"
                         style="width:130px; height:130px; font-size:48px;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <h3 class="fw-bold text-center mb-1 text-primary">{{ $user->name }}</h3>
            <p class="text-center text-secondary mb-4">{{ $user->email }}</p>

            <div class="d-grid gap-2">
                <a href="/profile/edit" class="btn btn-primary w-100">
                    <i class="bi bi-pencil-square"></i> Edit Profile
                </a>
                <a href="/logout" class="btn btn-outline-danger w-100">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
