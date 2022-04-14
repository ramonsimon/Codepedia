<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class ProfielBewerken extends Component
{
    public $user;

    public function render()
    {
        $this->user = Auth::user();;
        return view('livewire.profiel-bewerken');
    }


    public function submit(){
        $this->user->save();
    }
}
