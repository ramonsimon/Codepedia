<?php

namespace App\Http\Livewire;
use App\Models\Topics;
use Livewire\Component;

class Onderwerpen extends Component
{
    public $topics;
    public function render()
    {
        $this->topics = Topics::all();
        return view('livewire.onderwerpen');
    }
}
