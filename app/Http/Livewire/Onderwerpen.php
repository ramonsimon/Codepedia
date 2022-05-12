<?php

namespace App\Http\Livewire;
use App\Models\Topics;
use Livewire\Component;

class Onderwerpen extends Component
{
    public $filter;
    public $topics;
    public $message;

    public function render()
    {
        $this->topics = Topics::all();

        switch ($this->filter) {
            case 'ascending':
                $this->topics = $this->topics->sortBy('name', 0);
                break;
            case 'descending':
                $this->topics = $this->topics->sortBy('name', 0, true);
                break;
            case 'newest':
                $this->topics = $this->topics->sortBy('created_at', 0);
                break;
            case 'oldest':
                $this->topics = $this->topics->sortBy('created_at', 0, true);
                break;
        }

        return view('livewire.onderwerpen');
    }

    public function goToArticles($topic)
    {
        return redirect('artikel/overzicht')->with([
            'topic' => $topic
        ]);
    }

}
