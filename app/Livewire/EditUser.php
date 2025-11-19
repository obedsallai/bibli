<?php

namespace App\Livewire;

use App\Models\Bibliophile;
use App\Models\User;
use Livewire\Component;


class EditUser extends Component
{
    
    public Bibliophile $bibliophile;

    public $name = '';
    public $email = '';
    public $phone_number = '';

    public function mount(Bibliophile $bibliophile){
        $this->bibliophile = $bibliophile;

        $this->name = $bibliophile->name;
        $this->email = $bibliophile->email; 
        $this->phone_number = $bibliophile->phone_number;

    }

    public function updateBibliophile(){
        $this->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'phone_number'=>'required|string|max:255'
        ]);
        $this->bibliophile->update([
            'name'=> $this->name,
            'email'=> $this->email,
            'phone_number'=> $this->phone_number

        ]);
        request()->session()->flash('success','Bibliophile mis a jour avec success');
        return $this->redirectRoute('dashboard');
    }
    public function render()
    {
        return view('livewire.edit-user');
    }
}
