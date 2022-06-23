<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;
use App\Models\Topics;

class OnderwerpWijzigen extends ModalComponent
{
    use LivewireAlert;

    public $topic;
    public $name;
    public $topicId;

    protected $rules = [
        'name' => 'required|max:20|string'
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

        $this->emit('refresh');

        $this->forceClose()->closeModal();

        return $this->alert('success', 'Onderwerp gewijzigd naar ' . $this->name, [
            'position' => 'bottom-end'
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
