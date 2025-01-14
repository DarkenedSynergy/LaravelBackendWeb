<div class="news-item" style="border: 1px solid #ddd; padding: 1rem; margin-bottom: 1rem;">
    <h2><a href="{{ route('news.show', $news) }}">{{ $news->title }}</a></h2>
    <small>Gepubliceerd op: {{ $news->published_at ?? 'Onbekend' }}</small>

    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="Afbeelding van {{ $news->title }}" style="max-width: 200px;">
    @endif

    <p>{{ \Illuminate\Support\Str::limit($news->content, 100) }}</p>

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
