<div class="news-item" style="border: 1px solid #ddd; padding: 1rem; margin-bottom: 1rem;">
    <h2><a href="{{ route('news.show', $news) }}">{{ $news->title }}</a></h2>
    <small>Gepubliceerd op: {{ $news->published_at ?? 'Onbekend' }}</small>

    {{-- Toon de auteur --}}
    <div style="margin-top: 10px;">
        <strong>Auteur:</strong>
        @if ($news->user)
            <strong>Auteur:</strong> {{ $news->user->name ?? 'Onbekend' }} <br>
            @if ($news->user->profile_picture)
                <img src="{{ asset('storage/' . $news->user->profile_picture) }}" alt="Profielfoto van {{ $news->user->name }}" style="max-width: 50px; height: auto; border-radius: 50%; margin-top: 5px;">
            @else
                <img src="{{ asset('storage/default-profile.png') }}" alt="Profielfoto" style="max-width: 50px; height: auto; border-radius: 50%; margin-top: 5px;">
            @endif
        @else
            <span>Onbekend</span>
        @endif

    </div>

    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="Afbeelding van {{ $news->title }}" style="max-width: 200px;">
    @endif

    <p>{{ \Illuminate\Support\Str::limit($news->content, 100) }}</p>

    {{-- Tags weergeven --}}
    <div style="margin-top: 0.5rem;">
        <small><strong>Tags:</strong>
            @forelse($news->tags as $tag)
                <span style="background-color: #f0f0f0; padding: 0.2rem 0.4rem; margin-right: 0.3rem; border-radius: 5px;">
                    {{ $tag->name }}
                </span>
            @empty
                Geen tags gekoppeld
            @endforelse
        </small>
    </div>

    {{-- Admin-opties --}}
    @if(auth()->check() && auth()->user()->is_admin)
        <div style="margin-top: 1rem;">
            <a href="{{ route('news.edit', $news) }}" class="btn btn-primary">Bewerken</a>
            <form action="{{ route('news.delete', $news) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?')">Verwijderen</button>
            </form>
        </div>
    @endif
</div>
