<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Logout extends Component
{


    public function logout(){
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->intended('/login');
    }

    // public function logout()
    // {
    //     Auth::logout();
    //     session()->invalidate();
    //     session()->regenerateToken();

    //     return redirect('/login');
    // }

            public function render()
    {
        return view('livewire.auth.logout');
    }
}
