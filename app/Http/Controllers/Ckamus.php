<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Ckamus extends Controller
{
    public function index(Request $request)
    {
        $word = $request->input('word');
        $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$word}");
        $data = $response->json();

        if (empty($word)) {
            return redirect()->route('kamus.api')->with('error', 'Please enter a word to search.');
        }
        return view('api_.kamus', compact('data', 'word'));
    }
}
