<?php

namespace App\Http\Livewire;


use App\Models\Question;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class VraagVerwijderModal extends ModalComponent
{
    use LivewireAlert;

    public $question;

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }
    
    public function delete()
    {
        Question::where('id', $this->question['id'])->
        delete();

        $this->emit('refresh');

        $this->forceClose()->closeModal();

        $this->alert('success', 'Vraag verwijderd', [
            'position' => 'bottom-end'
        ]);

    }

    public function mount($question)
    {
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.vraag-verwijder-modal');
    }
}
