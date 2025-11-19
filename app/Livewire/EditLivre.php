<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Genre;
use Livewire\Component;

class EditLivre extends Component
{
    public Book $livre; // ← attention : même nom que dans la route {livre}

    // Propriétés pour le formulaire (doivent être déclarées AVANT mount)
    public $title = '';
    public $author = '';
    public $genre_id = '';
    public $available_copies = 0;
    public $publication_date = '';
    public $status = '';

    public function mount(Book $livre) // ← Laravel injecte automatiquement le livre
    {
        $this->livre = $livre;

        // On remplit les champs avec les vraies valeurs
        $this->title = $livre->title;
        $this->author = $livre->author;
        $this->genre_id = $livre->genre_id;
        $this->available_copies = $livre->available_copies;
        $this->publication_date = $livre->publication_date?->format('Y-m-d');
        $this->status = $livre->status;
    }

    public function updateBook()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'available_copies' => 'required|integer|min:0',
            'publication_date' => 'nullable|date',
        ]);

        $this->livre->update([
            'title' => $this->title,
            'author' => $this->author,
            'genre_id' => $this->genre_id,
            'available_copies' => $this->available_copies,
            'publication_date' => $this->publication_date,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Livre mis à jour avec succès !');
        return $this->redirectRoute('livres', navigate: true); // ou ta route liste
    }

    public function render()
    {
        return view('livewire.edit-livre', [
            'genres' => Genre::all()
        ]);
    }
}