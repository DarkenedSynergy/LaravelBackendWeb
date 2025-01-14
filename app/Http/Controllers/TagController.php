<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    // Toon een lijst van tags
    public function index()
    {
        $tags = Tag::orderBy('name')->paginate(10);
        return view('tags.tags-list', compact('tags'));
    }

    // Toon een formulier om een tag aan te maken
    public function create()
    {
        return view('tags.tags-create');
    }

    // Sla een nieuwe tag op
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags',
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag toegevoegd!');
    }

    // Toon een formulier om een tag te bewerken
    public function edit(Tag $tag)
    {
        return view('tags.tags-edit', compact('tag'));
    }

    // Werk een bestaande tag bij
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag bijgewerkt!');
    }

    // Verwijder een tag
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag verwijderd!');
    }
}
