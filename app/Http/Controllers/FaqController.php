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

    // Admin FAQ overzicht
    public function adminIndex()
    {
        $faqs = Faq::with('category')->get();
        return view('admin.faq.index', compact('faqs'));
    }


    // Toon formulier om een FAQ toe te voegen (Admin)
    public function create()
    {
        // Haal alle categorieën op voor de dropdown
        $categories = Category::all();
        return view('admin.faq.create', compact('categories')); // Admin FAQ creation view
    }

    // Opslaan van een nieuwe FAQ (Admin)
    public function store(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        // Maak de FAQ aan
        Faq::create($request->all());

        // Redirect naar de FAQ index pagina met een succesbericht
        return redirect()->route('admin.faq.index')->with('success', 'FAQ toegevoegd!');
    }

    // Bewerk een FAQ (Admin)
    public function edit(Faq $faq)
    {
        // Haal alle categorieën op voor de dropdown
        $categories = Category::all();
        return view('admin.faq.edit', compact('faq', 'categories')); // Admin FAQ edit view
    }

    // Update een FAQ (Admin)
    public function update(Request $request, Faq $faq)
    {
        // Valideer de invoer
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        // Werk de FAQ bij
        $faq->update($request->all());

        // Redirect naar de FAQ index pagina met een succesbericht
        return redirect()->route('admin.faq.index')->with('success', 'FAQ bijgewerkt!');
    }

    // Verwijder een FAQ (Admin)
    public function destroy(Faq $faq)
    {
        // Verwijder de FAQ
        $faq->delete();
        // Redirect naar de FAQ index pagina met een succesbericht
        return redirect()->route('admin.faq.index')->with('success', 'FAQ verwijderd!');
    }
}
