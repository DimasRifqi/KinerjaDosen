<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('testing.faq.index_faq', compact('faqs'));
    }

    // Menampilkan form untuk membuat FAQ baru (Create - Form)
    public function create()
    {
        return view('faq.create');
    }

    // Menyimpan FAQ baru (Create - Store)
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string|max:255',
        ]);

        Faq::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->back();
    }

    // Menampilkan form untuk mengedit FAQ (Update - Form)
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('testing.faq.edit_faq', compact('faq'));
    }

    // Memperbarui FAQ yang sudah ada (Update - Update)
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string|max:255',
        ]);

        $faq->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->back()->with('success', 'FAQ berhasil diperbarui');
    }

    // Menghapus FAQ (Delete)
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus');
    }
}
