<?php

namespace App\Http\Livewire;


use App\Models\Question;
use Livewire\Component;

class VraagBekijken extends Component
{
    public $question;

    public function mount(Question $question)
    {
        $this->question = $question;

    }

    public function render()
    {
        return view('livewire.vraag-bekijken');
    }
}
