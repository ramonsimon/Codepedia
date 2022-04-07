<?php

namespace App\Http\Livewire;

use App\Models\Articles;
use App\Models\User;
use Livewire\Component;

class ArtikelToevoegen extends Component
{
public $title;
public $onderwerp;
public $description;
public $sub_description = 'fuck you Stefan';


    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'sub_description' =>'required',

    ];

    public function submit()
    {
        $validatedData = $this->validate();

        Articles::create($validatedData);

    }


    public function render()
    {

        return view('livewire.artikel-toevoegen');
    }
}
