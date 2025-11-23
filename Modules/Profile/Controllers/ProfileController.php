<?php

namespace Modules\Profile\Controllers;

use Wasf\Filesystem\Storage;
use Wasf\Http\Request;
use Wasf\Http\Response;
use Modules\Auth\Models\User;
use Wasf\View\Blade;

class ProfileController
{
    public function index()
    {
        $user = auth()->user();
        return Blade::render('Profile/index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return Blade::render('Profile/edit', compact('user'));
    }

    public function update(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();
        if (!$user) {
            return redirect('/login');
        }

        // Data profil
        $data = [
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
        ];

        // Jika upload file ada
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {

            // ambil ekstensi
            $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

            // generate nama file custom via username
            $customName = $user->username . '-' . rand(100, 999) . '.' . $ext;

            // Upload pakai putFileAs
            $filename = Storage::disk('public')->putFileAs('profile', $_FILES['photo'], $customName);

            if ($filename) {

                // hapus foto lama
                Storage::disk('public')->safeDelete(
                    str_replace('/uploads/', '', $user->photo)
                );

                // simpan full path untuk DB
                $data['photo'] = '/uploads/profile/' . $filename;
            }
        }

        // Update user
        $user->update($data);

        return redirect('/profile')->with('success', 'Update berhasil!');
    }

}
