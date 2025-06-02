<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqAdminController extends Controller
{
    public function index() {
        $faqs = Faq::all();
        return view('admin.tanya', compact('faqs'));
    }

    public function create() {
        return view('admin.tambah_tanya');
    }

    public function store(Request $request) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        Faq::create($request->only('question', 'answer'));
        return redirect()->route('admin.faq.index')->with('success', 'FAQ ditambahkan!');
    }

    public function edit(Faq $faq) {
        return view('admin.edit_tanya', compact('faq'));
    }

    public function update(Request $request, Faq $faq) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq->update($request->only('question', 'answer'));
        return redirect()->route('admin.faq.index')->with('success', 'FAQ diupdate!');
    }

    public function destroy(Faq $faq) {
        $faq->delete();
        return back()->with('success', 'FAQ dihapus!');
    }
}
