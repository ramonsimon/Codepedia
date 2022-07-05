<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class ProfielBewerken extends Component
{
    use LivewireAlert;

    public $user;
    public $name;
    public $email;
    public $lastname;
    public $password;

    protected $rules = [

        'name' => 'required|string',
        'lastname' => 'required|string',
        'password' => 'nullable|min:8|max:255|string'

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
        $this->user->last_name = $this->lastname;

        if (!strlen($this->password) < 1) {
            $this->user->password = bcrypt($this->password);
        }

        $this->user->save();

        $this->alert('success', 'Gegevens bijgewerkt', [
            'position' => 'bottom-end'
        ]);
    }
}
