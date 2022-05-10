<?php

namespace App\Http\Livewire;

use App\Models\Topics;
use LivewireUI\Modal\ModalComponent;

class OnderwerpToevoegen extends ModalComponent
{
    public $name;

    protected $rules = [
        'name' => 'required|max:20|string'
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        if (!Topics::where('name', '=', $this->name)->exists()) {
            Topics::create($validatedData);

            return redirect('/onderwerpen')->with([
                'title' => 'Gelukt!',
                'message' => 'Het onderwerp is toegevoegd.',
                'bg' => 'bg-green-200',
                'border' => 'border-green-600'
            ]);
        }

        return redirect('/onderwerpen')->with([
            'title' => 'Oeps er ging iets mis!',
            'message' => 'Het onderwerp bestaat al.',
            'bg' => 'bg-red-200',
            'border' => 'border-red-600'
        ]);
    }

    public function render()
    {
        return view('livewire.onderwerp-toevoegen');
    }
}
