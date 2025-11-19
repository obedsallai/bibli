<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Borrowing;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'livres'=>Book::all(),
            'emprunts'=> Borrowing::all(),
        ]);
    }
}
