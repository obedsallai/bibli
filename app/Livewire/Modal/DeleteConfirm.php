<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class DeleteConfirm extends Component
{
    public $show = false;
    public $model;
    public $title = "Confirmer la suppression";
    public $message = "Cette action est irréversible.";

    protected $listeners = ['openDeleteModal' => 'open'];

    public function open($model)
    {
        $this->model = $model;
        $this->show = true;
    }

    public function confirm()
    {
        $this->dispatch('confirmedDelete', $this->model);
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.modal.delete-confirm');
    }
}