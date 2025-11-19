<?php

namespace App\Http\Controllers\Emprunts;   // ← Ligne à avoir obligatoirement

use Illuminate\Http\Request;

class EmpruntController extends Controller
{

    public function index()
    {
        return view('emprunts.index');
    }
    public function create()
    {
        return view('emprunts.create');
    }
    public function store(Request $request)
    {}
    public function show($id)
    {
        return view('emprunts.show');
    }
    public function edit($id){
        return view('emprunts.edit');
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
}
