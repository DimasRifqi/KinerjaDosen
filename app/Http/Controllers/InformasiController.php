<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function indexInformasi(){
        $informasi = Informasi::all();
        return view('home.informasi', ['informasi' => $informasi]);
    }

    // public function indexInformasi(){
    //     $informasi = Informasi::all();
    //     return view('testing.informasi.index_informasi', ['informasi' => $informasi]);
    // }

    public function createInformasi(){
        return view('testing.informasi.create_informasi');
    }

    public function storeInformasi(Request $request){
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'image_informasi' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_informasi')) {
            $imagePath = $request->file('image_informasi')->store('informasi_images', 'public');
        } else {
            $imagePath = '';
        }

        Informasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image_informasi' => $imagePath
        ]);

        return redirect()->back()->with('sukses upload informasi');
    }

    public function editInformasi($id){
        $informasi = Informasi::findOrFail($id);
        return view('testing.informasi.edit_informasi', ['informasi' => $informasi]);
    }

    public function updateInformasi(Request $request, $id)
{

    $informasi = Informasi::findOrFail($id);


    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
        'image_informasi' => 'nullable|image|max:2048',
    ]);

    $informasi->deskripsi = $validated['deskripsi'];

        if ($request->hasFile('image_informasi')) {

        $imagePath = $request->file('image_informasi')->store('informasi_images', 'public');

        if ($informasi->image_informasi) {
            Storage::disk('public')->delete($informasi->image_informasi);
        }
        $informasi->image_informasi = $imagePath;
    }

    $informasi->save();
    return redirect()->back()->with('success', 'Informasi berhasil diupdate');
}

    public function deleteInformasi($id){
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();
        return redirect()->route('admin.informasi.index')->with('Sukses hapus');
    }

}