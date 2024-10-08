<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user(); // Mendapatkan data user yang sedang login
        return view('testing.users.edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'no_rek' => 'nullable|string|max:255',
            'npwp' => 'nullable|string|max:255',
            'nidn' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'status' => 'nullable|in:aktif,non-aktif,pensiun,belajar',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi image
            'file_serdos' => 'nullable|mimes:pdf|max:2048', // Validasi file serdos (PDF)
        ]);

        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Update data user
        $user->name = $request->name;
        $user->no_rek = $request->no_rek;
        $user->npwp = $request->npwp;
        $user->nidn = $request->nidn;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->status = $request->status;

        // Proses upload image
        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($user->image) {
                $oldImagePath = public_path('storage/img/foto_users/' . $user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan file baru
            $fileName = 'image-' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/img/foto_users'), $fileName);
            $user->image = $fileName;
        }

        // Proses upload file serdos
        if ($request->hasFile('file_serdos')) {
            // Hapus file lama jika ada
            if ($user->file_serdos) {
                $oldSerdosPath = public_path('storage/file/file_serdos/' . $user->file_serdos);
                if (file_exists($oldSerdosPath)) {
                    unlink($oldSerdosPath);
                }
            }

            // Simpan file baru
            $serdosFileName = 'serdos-' . uniqid() . '.' . $request->file_serdos->extension();
            $request->file_serdos->move(public_path('storage/file/file_serdos'), $serdosFileName);
            $user->file_serdos = $serdosFileName;
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}