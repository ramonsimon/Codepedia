<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Topics;

class OnderwerpVerwijderModal extends ModalComponent
{
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

        return redirect('/onderwerpen')->with([
            'title' => 'Gelukt!',
            'message' => 'Het onderwerp is verwijderd.',
            'bg' => 'bg-green-600',
            'border' => 'border-green-800'
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
