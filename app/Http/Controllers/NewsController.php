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
        $query = News::with('user', 'tags'); // Zorg ervoor dat je de benodigde relaties meepakt (user, tags)

        // Filter op zoekterm
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;

            $query->where(function($query) use ($search) {
                // Zoek op titel, auteur en tags
                $query->where('title', 'like', "%{$search}%")
                      ->orWhereHas('user', function ($query) use ($search) {
                          $query->where('name', 'like', "%{$search}%");
                      })
                      ->orWhereHas('tags', function ($query) use ($search) {
                          $query->where('name', 'like', "%{$search}%");
                      });
            });
        }

        // Haal de resultaten op met paginering
        $news = $query->orderBy('published_at', 'desc')->paginate(5);

        return view('news.index', compact('news'));
    }


    // Toon een formulier om een nieuwsitem toe te voegen
    public function create()
    {
        $tags = Tag::all();
        return view('admin.news.create', compact('tags'));
    }


    // Sla een nieuw nieuwsitem op
  public function store(Request $request)
  {
      // Validatie voor het nieuwsitem
      $request->validate([
          'title' => 'required|string|max:255',
          'content' => 'required',
          'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
          'published_at' => 'nullable|date',
          'tags' => 'nullable|array',
          'tags.*' => 'exists:tags,id',
      ]);

      // Haal het user_id op
      $userId = auth()->id();


      if (!$userId) {
          return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om nieuws toe te voegen!');
      }

      // Opslaan van het nieuwsitem in de database zonder de afbeelding
      $news = News::create([
          'user_id' => $userId ?? 1, // Voorkom dat deze leeg blijft
          'title' => $request->title,
          'content' => $request->content,
          'published_at' => $request->published_at,
      ]);

      // Sla de afbeelding op (indien aanwezig)
      if ($request->hasFile('image')) {
          $imagePath = $request->file('image')->store('news_images', 'public');
          $news->image = $imagePath;
          $news->save(); // Update het nieuwsitem met de afbeelding
      }

      // Synchroniseer de tags
      $news->tags()->sync($request->tags);

      // Redirect naar de nieuwsindex
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
    public function destroy(News $news)
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
