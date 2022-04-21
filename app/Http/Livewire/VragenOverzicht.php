<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Topics;
use App\Models\Question;

class VragenOverzicht extends Component
{

    public $topic = 'all';
    public $search;

    public function render()
    {
        $search = '%' . $this->search . '%';

        if ($this->topic == "all") {
            $question = Question::where('title', 'like', $search)->get();
        } else {
            $question = Question::where('title', 'like', $search )
                ->where('topic_id', '=', $this->topic)->get();
        }

        return view('livewire.vragen-overzicht', [
            'topics' => Topics::get(),
            'questions' => $question,
        ]);
    }
}
