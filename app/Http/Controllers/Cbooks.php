<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cbooks extends Controller
{
    public function index()
    {
        $url = 'https://softwium.com/api/books';
        $response = Http::get($url);


        //return response()->json($response->json()); //untuk menampilkan JSON

        if ($response->successful()) {
            $books = $response->json();
            return view('api_.books', compact('books'));
        } else {
            return abort(500, 'Gagal mengambil data dari API');
        }
    }
}
