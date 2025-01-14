<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Tag;

class NewsController extends Controller
{
    // Toon een lijst van nieuwsitems met bijbehorende gebruiker
    public function index(Request $request)
    {
        $query = News::with('user');

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->orderBy('published_at', 'desc')->paginate(5);

        return view('news.index', compact('news'));
    }

    // Toon een formulier om een nieuwsitem toe te voegen
    public function create()
    {
        $tags = Tag::all();
        return view('news.create', compact('tags'));
    }

    // Sla een nieuw nieuwsitem op
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'published_at' => $request->published_at,
            'user_id' => auth()->id(),
        ]);

        $news->tags()->sync($request->tags);

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
        $tags = Tag::all();
        return view('news.edit', compact('news', 'tags'));
    }

    // Werk een bestaand nieuwsitem bij
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
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

        $news->tags()->sync($request->tags); // Werk de gekoppelde tags bij

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
