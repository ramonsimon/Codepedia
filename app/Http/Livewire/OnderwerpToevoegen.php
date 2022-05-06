<?php

namespace App\Http\Livewire;

use App\Models\Topics;
use App\Models\User;
use Livewire\Component;

class OnderwerpToevoegen extends Component
{
    public $name;


    protected $rules = [
        'name' => 'required|max:20|string'
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        Topics::create($validatedData);

        return redirect('/onderwerpen');
    }


    public function render()
    {
        return view('livewire.onderwerp-toevoegen');
    }
}
