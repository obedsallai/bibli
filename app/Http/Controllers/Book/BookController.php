<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return view('livres.index');
    }

    public function create()
    {
        return view('livres.create');
    }
    public  function store(Request $request)
    {
        // Logique pour stocker un nouveau livre
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'copies' => 'required|integer',

        ]);

        Book::create([
            'titre' => $data['titre'],
            'auteur' => $data['auteur'],
            'genre' => $data['genre'],
            'copies' => $data['copies'],
        ]);
        
 

        return redirect('/dashboard');
    }
}
