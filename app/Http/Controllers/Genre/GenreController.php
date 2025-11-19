<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        return view('genres.index');
    }
    public function create()
    {
        return view('genres.create');
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',   
        ]);

        Genre::create([
                'name' => $data['name'], 
        ]);

        return redirect('/dashboard');

    }
    public function show($id)
    {
        return view('genres.show');
    }
    public function edit($id){
        return view('genres.edit');
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
}
