<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class DocentAanmaken extends Component
{
    public $name;
    public $email;
    public $password;
    public $passwordrep;

    protected $rules = [
        'name' => 'required|',
        'email' => 'required|email',
        'password' => 'required',
        'passwordrep' => 'required',

    ];


    public function submit(){

        $this->validate();
        $user = new User();
        $user->password = bcrypt($this->password);
        $user->email = $this->email;
        $user->name = $this->name;
        $user->assignRole('admin');
        $user->save();

    }

    public function render()
    {
        return view('livewire.docent-aanmaken');
    }
}
