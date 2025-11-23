@extends('layouts.main')
@section('title', 'My Profile')
@section('content')
    @flash('success')
    @flash('error')   
    <div class="container py-5 d-flex justify-content-center">
        <div class="card shadow-sm" style="max-width: 420px; width: 100%;"> 
        <div class="card-body text-center">
                <div class="mb-3">
                    @if($user->photo)
                        <img src="{{ $user->photo }}" 
                             class="rounded-circle shadow-sm"
                             width="120" height="120"
                             style="object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                             style="width:120px; height:120px; font-size:40px;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <h3 class="mb-0">{{ $user->name }}</h3>
                <p class="text-muted mb-3">{{ $user->email }}</p>

                <div class="d-grid gap-2">
                    <a href="/profile/edit" class="btn btn-primary">
                        Edit Profile
                    </a>

                    <a href="/logout" class="btn btn-outline-danger">
                        Logout
                    </a>
                </div>

            </div>
        </div>

    </div>

@endsection
