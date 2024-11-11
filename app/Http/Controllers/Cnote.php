<?php

namespace App\Http\Controllers;

use App\Models\Mnote;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Laravel\Prompts\Note;
use PhpParser\Node\Expr\Cast\String_;

class Cnote extends Controller
{
    public function  index()
    {
        $notes = Mnote::get();
        return view('notes.index', compact('notes'));
    }

    public function tambah()
    {
        return view("notes.tambah");
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $Note = new MNote;
        $Note->judul = $request->judul;
        $Note->deskripsi = $request->deskripsi;
        $Note->status = $request->status;
        $Note->save();

        return redirect()->route('note.index')
            ->with('success', 'Note has been created successfully.');
    }


    public function edit(String $id)
    {
        $note = Mnote::findOrFail($id); // Fetch the note or fail if it doesn't exist
        return view('notes.edit', compact('note')); // Pass the note to the view
    }


    public function simpan_edit(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $note = Mnote::findOrFail($id);
        $note->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('note.index')
            ->with('success', 'Note has been updated successfully');
    }

    public function hapus(String $id)
    {
        $data = Mnote::where("id", $id)->first();
        $data->delete();

        return  redirect()->route('note.index');
    }
}
