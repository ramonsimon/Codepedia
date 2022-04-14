<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class ProfielBewerken extends Component
{
    public $profile;

    public function render()
    {
        $this->profile = User::all();
        return view('livewire.profiel-bewerken');
    }
}
