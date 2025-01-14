@extends('layouts.app')

@section('title', 'Profiel beheren')

@section('content')
<div class="container">
    <h1>Profiel beheren</h1>

    {{-- Menu met opties --}}
    <div>
        <ul>
            <li><a href="#" onclick="showSection('update-profile')">Profielinformatie bijwerken</a></li>
            <li><a href="#" onclick="showSection('update-password')">Wachtwoord wijzigen</a></li>
            <li><a href="#" onclick="showSection('delete-account')">Account verwijderen</a></li>
        </ul>
    </div>

    {{-- Secties voor formulieren --}}
    <div id="update-profile" class="profile-section" style="display: block;"> <!-- Profielinformatie standaard zichtbaar -->
        <h2>Profielinformatie bijwerken</h2>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div>
                <x-input-label for="bio" :value="__('Bio')" />
                <textarea id="bio" name="bio" class="mt-1 block w-full" rows="4">{{ old('bio', $user->bio) }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('bio')" />
            </div>

            <div>
                <x-input-label for="birthday" :value="__('Birthday (optional)')" />
                <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
            </div>

            <div>
                <x-input-label for="profile_picture" :value="__('Profile Picture (optional)')" />
                <input type="file" id="profile_picture" name="profile_picture" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
                @if ($user->profile_picture)
                    <div class="mt-2">
                        <p>Huidige profielfoto:</p>
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" style="max-width: 100px;">
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>

    <div id="update-password" class="profile-section" style="display: none;">
        <h2>Wachtwoord wijzigen</h2>
        @include('profile.partials.update-password-form')
    </div>

    <div id="delete-account" class="profile-section" style="display: none;">
        <h2>Account verwijderen</h2>
        @include('profile.partials.delete-user-form')
    </div>
</div>

{{-- JavaScript om secties te beheren --}}
<script>
    function showSection(sectionId) {
        // Alle secties verbergen
        document.querySelectorAll('.profile-section').forEach(section => {
            section.style.display = 'none';
        });

        // Geselecteerde sectie weergeven
        document.getElementById(sectionId).style.display = 'block';
    }

    // Optioneel: Zorg ervoor dat profielinformatie standaard zichtbaar is
    document.addEventListener('DOMContentLoaded', () => {
        showSection('update-profile'); // Profielinformatie standaard openen
    });
</script>
@endsection
