<?php

namespace Modules\Profile\Controllers;

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
            'email' => $request->input('email')
        ];

        // Jika upload file ada
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {

            $uploadFolder = base_path('public/uploads/profile');

            // Upload file
            $newFile = upload_file($_FILES['photo'], $uploadFolder);

            if ($newFile) {

                // Hapus file lama
                if ($user->photo) {
                    $oldFile = $uploadFolder . '/' . $user->photo;
                    if (file_exists($oldFile)) unlink($oldFile);
                }

                // Set foto baru
                $data['photo'] = $newFile;
            }
        }

        // Update
        $user->update($data);

        return redirect('/profile')->with('success', 'Update berhasil!');
    }

}
