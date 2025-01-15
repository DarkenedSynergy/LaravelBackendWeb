<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Toon de FAQ-pagina voor bezoekers
    public function index()
    {
        $categories = Category::with('faqs')->get();
        return view('faq.index', compact('categories'));
    }

    // Toon formulier om een FAQ toe te voegen
    public function create()
    {
        $categories = Category::all();
        return view('admin.faq.create', compact('categories'));
    }

    // Opslaan van een nieuwe FAQ
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ toegevoegd!');
    }

    // Bewerk een FAQ
    public function edit(Faq $faq)
    {
        $categories = Category::all();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    // Update een FAQ
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ bijgewerkt!');
    }

    // Verwijder een FAQ
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ verwijderd!');
    }
}
