<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Topics;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class VraagBeheer extends Component
{

    public $search;
    public $topic = 'all';

    protected $listeners = ['refresh' => 'render'];

    public function open($id)
    {
        Question::where(['id' => $id])
            ->update(['is_closed' => 0]);
        $this->render();
    }

    public function close($id)
    {
        Question::where(['id' => $id])
            ->update(['is_closed' => 1]);
        $this->render();
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        if (Session::has('topic')) {
            $this->topic = Session::get('topic');
        }

        if ($this->topic == "all") {
            $questions = Question::where('title', 'like', $search)->simplePaginate(8, ['*'], 'questionPage');
        } else {
            $questions = Question::where('title', 'like', $search )
                ->where('topic_id', '=', $this->topic)->simplePaginate(8, ['*'], 'questionPage');
        }

        return view('livewire.vraag-beheer', [
            'topics' => Topics::get(),
            'questions' => $questions,
        ]);
    }
}
