@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
<div class="container">
    <h1>Nieuwsitems</h1>

    @foreach($news as $item)
        <x-news-item :news="$item" />
    @endforeach

    {{-- Paginatie --}}
    <div style="margin-top: 2rem;">
        {{ $news->links() }}
    </div>
</div>
@endsection
