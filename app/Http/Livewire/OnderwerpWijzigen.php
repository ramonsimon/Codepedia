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

        return redirect('/onderwerpen');
    }

    public function mount($topic)
    {
        $this->topic = $topic;
    }

    public function render()
    {
        return view('livewire.onderwerp-wijzigen');
    }
}
