@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="text-2xl mb-6">Connexion</h2>

        <div class="mb-4">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="border p-3 w-full" required>
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <input type="password" name="password" placeholder="Mot de passe" class="border p-3 w-full" required>
        </div>

        <div class="mb-4">
            <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-3">Se connecter</button>
    </form>
</div>
@endsection