<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-4xl font-bold text-gray-900">Nouveau mot de passe</h2>
            <p class="mt-3 text-gray-600">Choisissez un mot de passe sécurisé.</p>
        </div>

        @if($success)
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg text-center">
                Mot de passe réinitialisé avec succès !
                <a href="{{ route('login') }}" class="block mt-4 text-blue-600 font-bold underline">
                    → Se connecter maintenant
                </a>
            </div>
        @else
            <form wire:submit="resetPassword" class="space-y-6">
                <input type="hidden" wire:model="token">

                <div>
                    <label class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" wire:model="email" required
                           class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                    <input type="password" wire:model="password" required
                           class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Confirmer</label>
                    <input type="password" wire:model="password_confirmation" required
                           class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg">
                    @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-lg transition">
                    Réinitialiser le mot de passe
                </button>
            </form>
        @endif
    </div>
</div>