<div class=" max-w-7xl mx-auto px-4sm:px-6 lg:px-8">


<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-4xl font-bold text-gray-900">Mot de passe oublié ?</h2>
            <p class="mt-3 text-gray-600">
                Pas de souci ! Entrez votre e-mail, nous vous enverrons un lien de réinitialisation.
            </p>
        </div>

        @if($status)
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg">
                {{ $status }}
            </div>
        @endif

        @if($error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg">
                {{ $error }}
            </div>
        @endif

        <form wire:submit="sendResetLink" class="mt-8 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input type="email" wire:model="email" required
                       class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="votre@email.com">
                @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-lg transition transform hover:scale-105 shadow-lg">
                <span wire:loading.remove wire:target="sendResetLink">Envoyer le lien</span>
                <span wire:loading wire:target="sendResetLink">Envoi en cours...</span>
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">
                ← Retour à la connexion
            </a>
        </div>
    </div>
</div>

</div>