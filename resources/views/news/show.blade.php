@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container">
    <h1>{{ $news->title }}</h1>

    <!-- Show the publish date -->
    <small>Gepubliceerd op: {{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->format('d-m-Y') : 'Onbekend' }}</small>

    <!-- Show the author -->
    <div class="mt-4">
        <strong>Auteur:</strong>
        @if($news->user)
            {{ $news->user->name }}
            <br>
            <img src="{{ asset('storage/' . ($news->user->profile_picture ?? 'defaultpfp.png')) }}" alt="Profielfoto van {{ $news->user->name }}" style="max-width: 50px; height: auto; border-radius: 50%; margin-top: 5px;">
        @else
            <span>Onbekend</span>
        @endif
    </div>

    <!-- Show the content -->
    <div class="mt-4">
        <p>{{ $news->content }}</p>
    </div>

    <!-- Show the tags -->
    <div class="mt-4">
        <strong>Tags:</strong>
        @foreach($news->tags as $tag)
            <span style="background-color: #f0f0f0; padding: 0.2rem 0.4rem; margin-right: 0.3rem; border-radius: 5px;">
                {{ $tag->name }}
            </span>
        @endforeach
        @if($news->tags->isEmpty())
            <span>Geen tags gekoppeld</span>
        @endif
    </div>

    {{-- Admin options --}}
    @if(auth()->check() && auth()->user()->is_admin)
        <div class="mt-4">
            <button  href="{{ route('admin.news.edit', $news) }}" class="adminBtn">Bewerken</button>
            <form action="{{ route('admin.news.delete', $news) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="adminBtn delete" onclick="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?')">Verwijderen</button>
            </form>
            </form>
        </div>
    @endif
</div>
@endsection
