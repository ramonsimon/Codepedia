<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class ProfielBewerken extends Component
{
    public $user;
    public $name;
    public $email;
    public $password;

    protected $rules = [

        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required'

    ];

    public function render()
    {
        $this->user = Auth::user();

        return view('livewire.profiel-bewerken');
    }


    public function submit(){

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->password = bcrypt(request('password'));

        $this->user->save();
    }
}
