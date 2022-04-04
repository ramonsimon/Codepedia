<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ArtikelToevoegen extends Component
{
    public $user = 'tyfus';

    public function render()
    {
        $this->user = User::all();
        return view('livewire.artikel-toevoegen');
    }
}
