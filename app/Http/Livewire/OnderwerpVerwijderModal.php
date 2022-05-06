<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Topics;
use function PHPUnit\Framework\directoryExists;

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

        return redirect('/onderwerpen');

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
