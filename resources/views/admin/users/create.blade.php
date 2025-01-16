@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
    <div class="container">
        <h1>Create a New User</h1>

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="is_admin">Is Admin</label><br>

                <!-- Radio Button voor Geen Admin -->
                <input type="radio" id="is_admin_false" name="is_admin" value="false" {{ $user->is_admin ? '' : 'checked' }}>
                <label for="is_admin_false">Nee</label>

                <!-- Radio Button voor Admin -->
                <input type="radio" id="is_admin_true" name="is_admin" value="true" {{ $user->is_admin ? 'checked' : '' }}>
                <label for="is_admin_true">Ja</label>
            </div>




            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
