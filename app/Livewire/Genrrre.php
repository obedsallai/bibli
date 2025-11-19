<?php

namespace App\Livewire;

use App\Models\Genre;
use Livewire\Component;


class Genrrre extends Component
{
    public $name = '';

    public $editingGenreId;
    public $editingGenreName;

    public $genre_nom = '';

    public function saveGenre(){
        Genre::create(['name'=> $this->name]);
        $this->reset('name');
        request()->session()->flash('success', 'Genre added successfully.');
    }

    public function render()

    {
        $genres = Genre::with('books')->get();
        return view('livewire.genrrre', [
            'genres'=> $genres
        ]);
    }

    public function editGenre($genreId){
        $this->editingGenreId = $genreId;
    }

    public function defineNewName(){
        $genre = Genre::findOrFail($this->editingGenreId);
        $genre->name = $this->genre_nom;

        $genre->save();
        $this->reset('name');
        $this->editingGenreId = null;

        request()->session()->flash('success','Genre modifie avec success');
    }

    public function deleteGenre($genreId){
        $genre = Genre::findOrFail($genreId);
        $genre->delete();
        request()->session()->flash('success','Genre supprime avec success');
    }
}
