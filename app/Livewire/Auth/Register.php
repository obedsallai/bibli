<?php
namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use LivewireUI\Modal\Modal;
use Livewire\Component;
use Livewire\Attributes\Validate;


class Register extends Component
{
    #[Rule("required|string")]
     public $name = "";
     #[Rule("required|email|unique:users,email")]
     public $email = "";
     #[Rule("required")]
     public $phone_number = '';
     #[Rule("required|min:8")]
     public $password ="";
     public $role ="";

    public function register()
    {
        // $this->validate();
    
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number'=> $this->phone_number,
            'role'=> $this->role,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        request()->session()->flash('success','Bienvenue.');

        return redirect('/dashboard');
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
