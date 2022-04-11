<?php

namespace App\Http\Livewire;

use App\Models\Topics;
use App\Models\User;
use Livewire\Component;

class OnderwerpToevoegen extends Component
{
    public string $name;


    protected $rules = [
        'name' => 'required',

    ];

    public function submit()
    {
        $validatedData = $this->validate();

        Topics::create($validatedData);

    }


    public function render()
    {

        return view('livewire.onderwerp-toevoegen');
    }
}
