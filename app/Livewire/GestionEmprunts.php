<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use App\Models\Bibliophile;
use App\Models\Borrowing;
use Livewire\WithPagination;



class GestionEmprunts extends Component
{
    use WithPagination;

    public $bibliophile_id = '';
    public $book_id = '';
    public $borrow_date = '';
    public $return_date;
    public $returned = false;

    public function saveEmprunt()
    {
        Borrowing::create([
            'bibliophile_id' => $this->bibliophile_id,
            'book_id' => $this->book_id,
            //'return_date' => $this->return_date,
            'returned'=>false,
        ]);

        $this->reset(['bibliophile_id', 'book_id', 'borrow_date', 'return_date', 'returned']);
        request()->session()->flash('success','Emprunt ajouté avec succès.');
        // Logic to save borrowing record
    }


    public function confirmerRetour($brrowingId){

        $borrowing = Borrowing::findOrFail($brrowingId);
        $borrowing->return_date = today() ;
        $borrowing->returned = true;
        $borrowing->save();

        request()->session()->flash('success','Confirme avec success');


    }

    public function render()
    {
        return view('livewire.gestion-emprunts', [
            'borrowings'=> Borrowing::with('bibliophile','book')->paginate(5),
            'bibliophiles'=> Bibliophile::all(),
            'books'=> Book::all(),
        ]);
    }
}
