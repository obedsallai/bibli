<?php

namespace App\Livewire\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;



class Login extends Component
{

    // #[Rule("required|email")]
    public $email = '';
    // #[Rule("required|min:6")]
    public $password ="";
    public $remember = false;

    

    // Traiter le login
    public function login(Request $request)
    {
        // $this->validate();

        if (Auth::attempt(['email'=>$this->email,'password'=>$this->password], $this->remember)) {
            session()->regenerate();
            $this->dispatch('success', "Connexion reussie");

            // $this->reset(['email','password']);
            
            // return redirect()->intended('/dashboard')
            //          ->with('login_success', true);
                     // Cette ligne fait TOUTE la différence
                     request()->session()->flash("success","Vous etes de retour");
            return redirect()->intended('/dashboard')->with('just_logged_in', true);
        }

        throw ValidationException::withMessages([
            'email'=>'Identifiants incrorrects',
        ]);

    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function submit()
    {
        // Logique de connexion ici
    }
}
