<?php

namespace App\Http\Livewire;

use App\Http\Controllers\VotesController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Topics;
use App\Models\Question;

class VragenOverzicht extends Component
{
    public $onderwerp;
    public $topic = 'all';
    public $search;
    public $title;
    public $filter;
    public $description;
    public $question = 4;
    public $onderwerp_keuze;


    protected $rules = [
        'title' => 'required',
        'onderwerp_keuze' => 'required|exists:topics,id',
        'description' => 'required'
    ];

    public function mount()
    {
        $this->onderwerp_keuze = 1;
    }

    public function submit(){
        $this->validate();
        Question::create(['title'=> $this->title,'user_id'=> Auth::id(),'topic_id' => $this->onderwerp_keuze,'description' => $this->description]);
        $this->reset();
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        if ($this->topic == "all") {
            $question = Question::where('title', 'like', $search)
                ->orderBy('title', 'ASC')
                ->get();
        } else {
            $question = Question::where('title', 'like', $search )
                ->where('topic_id', '=', $this->topic)->orderBy('title', 'ASC')->get();
        }

        if ($this->filter) {
            switch ($this->filter) {

                case 'ascending':
                    $question = $question->sortBy('title');
                    break;
                case 'descending':
                    $question = $question->sortByDesc('title');
                    break;
                case 'newest':
                    $question = $question->sortByDesc('created_at');
                    break;
                case 'oldest':
                    $question = $question->sortBy('created_at');
                    break;

            }
        }

        return view('livewire.vragen-overzicht', [
            'topics' => Topics::get(),
            'questions' => $question,
        ]);
    }

    public function getVotes($id)
    {
        $votes_controller = new VotesController();
        return $votes_controller->getRating('Question', $id);
    }
}
