<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    public function create()
    {
        return view('users.create');
    }
    public function edit()
    {
        return view('users.edit');
    }
    public function update(Request $request, $id)
    {
        // Logic to update user information
        return redirect()->route('profile.index');
    }
    public function destroy($id)
    {
        // Logic to delete user
        return redirect()->route('home');
    }
}
