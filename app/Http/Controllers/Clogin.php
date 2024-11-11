<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Clogin extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => "usernamae waqjib diisi",
                'paswword.required' => "password waqjib diisi",
            ]
        );

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $credentials = $request->only('username', 'password');

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['username' => 'username tidak ditemukan']);
        }

        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')->withErrors(['password' => 'password salah']);
        }


        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('failed', "username atau password salah");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'anda telah logout');
    }

    // bikin registrasi
    public function registrasi()
    {
        return view("auth.registrasi");
    }

    public function registrasi_simpan(Request $request)
    {
        // $request->validate([
        //     "username" => "required|unique"
        // ]);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect()->route("login")->with(
            "status_login",
            [
                "judul" => "success",
                "pesan" => "berhasil disimpan silahkan login",
                "icon" => "success"
            ]
        );
    }
}
