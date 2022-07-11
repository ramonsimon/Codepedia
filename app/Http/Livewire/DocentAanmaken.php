<?php

namespace App\Http\Livewire;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class DocentAanmaken extends Component
{
    use LivewireAlert;

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
        'passwordrep' => 'required|string|same:password',

    ];
     protected $messages = [
         'name.required' => 'Voornaam is verplicht',
         'last_name.required' => 'Achternaam is verplicht',
         'email.required' => 'Email is verplicht',
         'password.required' => 'Wachtwoord is verplicht',
         'passwordrep.same' => 'Wachtwoorden komen niet overeen',
         'passwordrep.required' => 'Wachtwoord is verplicht',
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

        $this->alert('success', 'Docent ' . $user->name . ' ' . $user->last_name . ' aangemaakt', [
            'position' => 'bottom-end'
        ]);

        $this->name = null;
        $this->last_name = null;
        $this->email = null;
        $this->password = null;
        $this->passwordrep = null;

    }

    public function render()
    {
        return view('livewire.docent-aanmaken');
    }
}
