<?php

namespace App\Livewire;

use App\Enums\BookStatus;
use App\Models\Book;
use App\Models\Genre;
use Livewire\Component;



class Livrre extends Component
{
    public $title = '';
    public $author = '';
    public $genre_id = '';
    public $available_copies = 0;
    public $publication_date = '';
    public $status = '';

    public $editeBookId;

    public function addGenre(){
        return redirect()->route('genres');
    }

    public function saveBook()
{
    $this->validate([
        'title'            => 'required|string|max:255',
        'author'           => 'required|string|max:255',
        'genre_id'         => 'required|exists:genres,id',
        'available_copies' => 'required|integer|min:0',
        'publication_date' => 'nullable|date',
    ]);

    Book::create([
        'title'            => $this->title,
        'author'           => $this->author,
        'genre_id'         => $this->genre_id,
        'available_copies' => $this->available_copies,
        'publication_date' => $this->publication_date,
        'status'           => $this->status?? "disponible",
    ]);

    $this->reset();
    request()->session()->flash('success', 'Livre ajouté !');
}

    public function editBook( $bookId){
        $this->editeBookId = $bookId;
    }

    public function moveToEditPage($bookId)
    {
        // Très important : on passe le MODÈLE, pas l'ID
        $livre = Book::findOrFail($bookId);

        return $this->redirectRoute('edit-livre', ['livre' => $livre], navigate: true);
    }

     public function deleteBook($bookId){
        $book = Book::findOrFail($bookId);
        $book->delete();
        request()->session()->flash('success','Livre supprimé avec succès');
    }

    public function render()
    {
        return view('livewire.livrre', [
            'genres' => Genre::all(),
            'livres'=> Book::with("genre")->paginate(5),
        ]);
    }
}
