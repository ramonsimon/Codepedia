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
        'password' => 'required|min:8'

    ];

    public function mount(){
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->user = Auth::user();
    }

    public function render()
    {


        return view('livewire.profiel-bewerken');
    }


    public function submit(){

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->password = bcrypt($this->password);

        $this->user->save();
    }
}
