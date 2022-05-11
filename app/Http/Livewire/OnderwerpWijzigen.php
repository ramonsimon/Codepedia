<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Topics;

class OnderwerpWijzigen extends ModalComponent
{
    public $topic;
    public $name;
    public $topicId;

    protected $rules = [
        'name' => 'required',
    ];

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }

    public function submit()
    {
        $this->topicId = $this->topic['id'];
        $this->validate();

        Topics::where('id', $this->topicId)->
        update(['name' => $this->name]);
        $this->forceClose()->closeModal();

        return redirect('/onderwerpen')->with([
            'title' => 'Gelukt!',
            'message' => 'Het onderwerp ' . $this->topic['name'] . ' is veranderd naar ' . $this->name,
            'bg' => 'bg-green-200',
            'border' => 'border-green-600'
        ]);
    }

    public function mount($topic)
    {
        $this->topic = $topic;
        $this->name = $this->topic['name'];
    }

    public function render()
    {
        return view('livewire.onderwerp-wijzigen');
    }
}
