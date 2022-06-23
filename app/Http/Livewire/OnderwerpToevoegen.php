<?php

namespace App\Http\Livewire;

use App\Models\Topics;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class OnderwerpToevoegen extends ModalComponent
{
    use LivewireAlert;

    public $name;

    protected $rules = [
        'name' => 'required|max:20|string'
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        if (!Topics::where('name', '=', $this->name)->exists()) {
            Topics::create($validatedData);

            $this->emit('refresh');

            $this->forceClose()->closeModal();

            return $this->alert('success', 'Onderwerp toegevoegd', [
                'position' => 'bottom-end'
            ]);
        }

        $this->emit('refresh');

        $this->forceClose()->closeModal();

        return $this->alert('warning', 'Het onderwerp bestaat al', [
            'position' => 'bottom-end'
        ]);
    }

    public function render()
    {
        return view('livewire.onderwerp-toevoegen');
    }
}
