<?php

namespace App\Http\Livewire;


use App\Models\Question;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class VraagVerwijderModal extends ModalComponent
{
    public $question;

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }


    public function delete()
    {
        Question::where('id', $this->question['id'])->
        delete();

        $this->forceClose()->closeModal();

        return redirect('/vraag/beheer')->with([
            'title' => 'Gelukt!',
            'message' => 'Het artikel is verwijderd.',
            'bg' => 'bg-green-600',
            'border' => 'border-green-800'
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
