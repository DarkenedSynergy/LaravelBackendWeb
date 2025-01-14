<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // Toon een lijst van nieuwsitems
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->orderBy('published_at', 'desc')->paginate(5);
        return view('news.index', compact('news'));
    }

    // Toon een formulier om een nieuwsitem toe te voegen
    public function create()
    {
        return view('news.create');
    }

    // Sla een nieuw nieuwsitem op
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('news.index')->with('success', 'Nieuwsitem toegevoegd!');
    }

    // Toon een specifiek nieuwsitem
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // Toon een formulier om een nieuwsitem te bewerken
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    // Werk een bestaand nieuwsitem bij
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = $news->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('news.index')->with('success', 'Nieuwsitem bijgewerkt!');
    }

    // Verwijder een nieuwsitem
    public function delete(News $news)
    {
        // Verwijder de afbeelding uit de opslag (indien aanwezig)
        if ($news->image) {
            $filePath = public_path('storage/' . $news->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Verwijder het nieuwsitem
        $news->delete();

        // Redirect met succesmelding
        return redirect()->route('news.index')->with('success', 'Nieuwsitem verwijderd!');
    }

}

