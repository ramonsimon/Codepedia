<?php

namespace App\Http\Livewire;
use App\Models\Topics;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Onderwerpen extends Component
{
    use LivewireAlert;

    public $filter;
    public $topics;
    public $message;

    protected $listeners = ['refresh' => 'render'];

    public function render()
    {
        $this->topics = Topics::all();

        if ($this->filter) {
            $this->topics = match ($this->filter) {
                'ascending' => $this->topics->sortBy('name', 0),
                'descending' => $this->topics->sortBy('name', 0, true),
                'newest' => $this->topics->sortBy('created_at', 0, true),
                'oldest' => $this->topics->sortBy('created_at', 0),
            };
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
