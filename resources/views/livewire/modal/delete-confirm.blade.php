@if($show)
<div class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8">
        <h3 class="text-2xl font-bold text-red-600 mb-4">{{ $title }}</h3>
        <p class="text-gray-700 mb-8">{{ $message }}</p>

        <div class="flex justify-end gap-4">
            <button wire:click="$set('show', false)"
                    class="px-6 py-3 border border-gray-300 rounded-xl hover:bg-gray-50">
                Annuler
            </button>
            <button wire:click="confirm"
                    class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-xl">
                Supprimer
            </button>
        </div>
    </div>
</div>
@endif