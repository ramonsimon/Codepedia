<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class VraagBeheer extends Component
{
    public $questions;

    public function mount(){
        $this->questions = Question::all();

    }


    public function render()
    {
        return view('livewire.vraag-beheer');
    }
}
