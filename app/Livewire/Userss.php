<?php

namespace App\Livewire;

use App\Models\Bibliophile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;



class Userss extends Component
{

    public $name = "";
    public $email = "";
    public $phone_number = '';  

    public function saveBibliophile()
    {
        // $this->validate();
    
        $bibliophile = Bibliophile::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number'=> $this->phone_number,
        ]);

        $this->reset('name');
        $this->reset('email');
        $this->reset('phone_number');



        request()->session()->flash('success', 'Bibliophile enregistre avec success');

    }

    public function moveToEditPage($bibliophileId){
        $bibliophile = Bibliophile::find($bibliophileId);
        return $this->redirectRoute('edit-users', ['bibliophile'=> $bibliophile], navigate:true);
    }

    public function deleteUser($bibliophileId){
        $bibliophile = Bibliophile::findOrFail($bibliophileId);
        $bibliophile->delete();
        request()->session()->flash('success','Bibliophile supprime avec success');
    }
    public function render()
    {
        return view('livewire.userss', [
            'bibliophiles' => Bibliophile::orderBy('created_at','desc')->paginate(5),   
        ]);
    }
}
