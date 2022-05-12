<?php

namespace App\Http\Livewire;
use App\Models\Topics;
use Livewire\Component;

class Onderwerpen extends Component
{
    public $topics;
    public $message;

    public function render()
    {
        $this->topics = Topics::all();
        return view('livewire.onderwerpen');
    }

    public function goToArticles($topic)
    {
        return redirect('artikel/overzicht')->with([
            'topic' => $topic
        ]);
    }

}
