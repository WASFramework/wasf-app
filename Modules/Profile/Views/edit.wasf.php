@extends('layouts.main')
@section('title', 'Edit Profile')
@section('content')

    @flash('success')
    @flash('error')

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h3 class="mb-4 text-center">Edit Profile</h3>

                        <form action="/profile/edit" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Photo</label>
                                <input type="file" name="photo" class="form-control">

                                @if($user->photo)
                                    <div class="mt-2">
                                        <img src="/uploads/profile/{{ $user->photo }}" 
                                             class="img-thumbnail" width="120">
                                    </div>
                                @endif
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
