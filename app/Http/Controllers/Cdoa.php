<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Cdoa extends Controller
{
    public function index()
    {
        // $url  = 'https://doa-doa-api-ahmadramadhan.fly.dev/api';
        // $response = Http::get($url);

        $url = 'https://doa-doa-api-ahmadramadhan.fly.dev/api';
        $response = Http::get($url);


        //return response()->json($response->json()); //untuk menampilkan JSON

        if ($response->successful()) {
            $doa = $response->json();
            return view('doa.index', compact('doa'));
        } else {
            return abort(500, 'Gagal mengambil data dari API');
        }
    }
}
