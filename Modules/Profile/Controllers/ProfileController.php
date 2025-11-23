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

        $data = [
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
        ];

        // Hanya jika user upload foto baru
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {

            $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

            // Nama file baru berdasarkan username
            $customName = $user->username . '-' . rand(100, 999) . '.' . $ext;

            // Simpan file
            $filename = Storage::disk('public')->putFileAs(
                'profile',
                $_FILES['photo'],
                $customName
            );

            if ($filename) {

                // Hapus foto lama HANYA jika ada & bukan default
                if (!empty($user->photo) && $user->photo !== '/uploads/profile/default.png') {
                    Storage::disk('public')->safeDelete(
                        str_replace('/uploads/', '', $user->photo)
                    );
                }

                // Set foto baru
                $data['photo'] = '/uploads/profile/' . $filename;
            }
        }

        // Kalau tidak upload → $data['photo'] TIDAK diubah

        $user->update($data);

        return redirect('/profile')->with('success', 'Update berhasil!');
    }

}
