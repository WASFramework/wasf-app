@extends('layouts.main')
@section('title', 'Edit Profile')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        @flash('success')
        @flash('error')

        <div class="card shadow-lg border-0 rounded-4 p-4"
             style="background: rgba(30,30,46,0.75); backdrop-filter: blur(12px);">

            <h3 class="fw-bold text-center mb-4 text-primary">
                <i class="bi bi-person-lines-fill"></i> Edit Profile
            </h3>

            <form action="/profile/edit" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Photo</label>
                    <input type="file" name="photo" class="form-control">

                    @if($user->photo)
                        <div class="mt-3 text-center">
                            <img src="{{ $user->photo }}"
                                 class="rounded-3 shadow-sm"
                                 width="130" height="130"
                                 style="object-fit: cover;">
                        </div>
                    @endif
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle-fill"></i> Save Changes
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>

@endsection
