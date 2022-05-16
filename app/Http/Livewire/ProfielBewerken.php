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
    public $lastname;
    public $password;

    protected $rules = [

        'name' => 'required',
        'password' => 'required|min:8'

    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->lastname = $this->user->last_name;
    }

    public function render()
    {
        return view('livewire.profiel-bewerken');
    }


    public function submit()
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->lastname = $this->lastname;
        $this->user->password = bcrypt($this->password);

        $this->user->save();
    }
}
