<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class DocentAanmaken extends Component
{
    public $name;
    public $last_name;
    public $email;
    public $password;
    public $passwordrep;

    protected $rules = [
        'name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string',
        'passwordrep' => 'required|string',

    ];


    public function submit(){

        $this->validate();
        $user = new User();
        $user->password = bcrypt($this->password);
        $user->email = $this->email;
        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->assignRole('admin');
        $user->save();

    }



    public function render()
    {
        return view('livewire.docent-aanmaken');
    }
}
