<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Cuser extends Controller
{
    public function tampil()
    {
        $users = User::get();
        $judul = "Dashboard User";
        return view("user.index", compact('users', 'judul'));
    }

    public function tambah()
    {
        $judul = "tambah data user";
        return view('user.tambah', compact('judul'));
    }

    public function simpan(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        return redirect()->route("user.tampil")->with("susccess", "data berhasil ditambahkan");
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    // public function simpan_edit(Request $request, string $id)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'name' => 'string|max:255',
    //         'username' => '|string|max:255|unique:users,username,' . $id,
    //         'email' => '|email|max:255|unique:users,email,' . $id,
    //         'password' => 'nullable|string|min:8|confirmed', // Menggunakan 'confirmed' untuk verifikasi password
    //         'level' => '|in:admin,user', // Contoh validasi level, sesuaikan dengan level yang ada
    //     ]);

    //     // Temukan pengguna
    //     $user = User::findOrFail($id);

    //     // Update data pengguna
    //     $user->name = $request->name;
    //     $user->username = $request->username;
    //     $user->email = $request->email;

    //     // Hanya update password jika ada input password
    //     if ($request->filled('password')) {
    //         $user->password = Hash::make($request->password);
    //     }

    //     $user->level = $request->level;
    //     $user->save(); // Simpan perubahan

    //     return redirect()->route("users.tampil")->with("success", "Data berhasil diperbarui.");

    //     // // Menangani kesalahan dan mengarahkan kembali dengan pesan error
    //     // return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
    // }

    public function simpan_edit(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|confirmed', // Konfirmasi jika diisi
        ]);

        try {
            // Temukan pengguna
            $user = User::findOrFail($id);

            // Persiapkan data untuk update
            $dataToUpdate = $request->only(['name', 'username', 'email', 'level']);

            // Enkripsi password jika diisi
            if ($request->filled('password')) {
                $dataToUpdate['password'] = Hash::make($request->password);
            }

            // Update data
            $user->update($dataToUpdate);

            return redirect()->route("user.tampil")->with("success", "Data berhasil diperbarui.");
        } catch (\Exception $e) {
            // Tangani kesalahan
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }




    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("user.tampil")->with("success", "data berhasil dihapus");
    }

    public function cetak()
    {
        $users = User::get();
        return view("user.cetak", compact('users'));
    }

    public function cetak_user($id)
    {
        $user = User::findOrFail($id);
        return view("user.user_cetak", compact("user"));
    }
}
