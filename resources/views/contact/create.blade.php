@extends('layouts.app')

@section('title', 'Contact Formulier')

@section('content')
    <h1>Contact Formulier</h1>

   @if (session('success'))
       <div style="color: green; margin-bottom: 20px;">
           {{ session('success') }}
       </div>
   @endif


    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="email">E-mailadres:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="subject">Uw Bericht:</label>
            <textarea name="subject" id="subject" rows="5" required>{{ old('subject') }}</textarea>
        </div>
        <button type="submit">Verzenden</button>
    </form>
@endsection
