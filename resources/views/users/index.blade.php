@extends('layouts.app')

@section('title', 'Alle Gebruikers')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Alle Gebruikers</h1>

        @if($users->count() > 0)
            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Naam</th>
                        <th class="py-2 px-4 border-b">E-mail</th>
                        <th class="py-2 px-4 border-b">Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('users.show', $user) }}" class="text-blue-500 hover:underline">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->is_admin ? 'Ja' : 'Nee' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="mt-4">Er zijn momenteel geen gebruikers.</p>
        @endif
    </div>
@endsection

