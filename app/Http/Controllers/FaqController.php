<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('home.profil.pagination_faq', compact('faqs'))->render(),
                'pagination' => $faqs->links()->render(),
            ]);
        }

        return view('home.lainnya.faq', compact('faqs'));
    }


    // public function index()
    // {
    //     $faqs = Faq::all();
    //     return view('testing.faq.index_faq', compact('faqs'));
    // }

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

         // Flash SweetAlert success notification
        // alert()->success('FAQ Berhasil Ditambahkan', 'Data FAQ berhasil disimpan.');

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

        if ($request->ajax()) {
            return response()->json(['success' => 'FAQ berhasil diperbarui']);
        }

        // Jika bukan request AJAX, redirect dengan pesan sukses
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