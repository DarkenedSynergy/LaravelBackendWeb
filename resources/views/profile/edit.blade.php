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
        @include('profile.partials.update-profile-information-form')
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
