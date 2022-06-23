<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;
use App\Models\Topics;

class OnderwerpVerwijderModal extends ModalComponent
{

    use LivewireAlert;

    public $topic;

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }

    public function delete()
    {
        Topics::where('id', $this->topic['id'])->
            delete();

        $this->forceClose()->closeModal();

        $this->emit('refresh');

        $this->forceClose()->closeModal();

        return $this->alert('success', 'Onderwerp verwijderd', [
            'position' => 'bottom-end'
        ]);

    }

    public function mount($topic)
    {
        $this->topic = $topic;
    }

    public function render()
    {
        return view('livewire.onderwerp-verwijder-modal');
    }
}
