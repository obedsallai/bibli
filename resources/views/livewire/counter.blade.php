<div style="padding: 50px; text-align: center; font-family: Arial;">
    <h1>Compteur Livewire 🎉</h1>
    
    <p>Le compteur est à : <strong>{{ $count }}</strong></p>

    <button wire:click="increment" style="padding: 10px 20px; font-size: 20px; margin: 5px;">
        +1
    </button>

    <button wire:click="decrement" style="padding: 10px 20px; font-size: 20px; margin: 5px;">
        -1
    </button>
</div>