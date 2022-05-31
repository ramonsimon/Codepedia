<?php

namespace App\Http\Livewire;

use App\Http\Controllers\VotesController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Topics;
use App\Models\Question;
use Livewire\WithPagination;

class VragenOverzicht extends Component
{
    use WithPagination;

    public $onderwerp;
    public $topic = 'all';
    public $search;
    public $title;
    public $filter;
    public $description;
    public $question = 4;
    public $onderwerp_keuze;
    public $ownQuestions = false;


    protected $rules = [
        'title' => 'required|max:30',
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
        $this->title = '';
        $this->description = '';
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        if ($this->topic == "all") {
            $question = Question::where('title', 'like', $search)
                ->orderBy('title', 'ASC')
                ;
        } else {
            $question = Question::where('title', 'like', $search )
                ->where('topic_id', '=', $this->topic)->orderBy('title', 'ASC');
        }

        if ($this->ownQuestions) {
            $question = $question->where('user_id', auth()->id());
        }

        if ($this->filter) {
            switch ($this->filter) {

                case 'ascending':
                    $question = Question::orderBy('title', 'ASC');
                    break;
                case 'descending':
                    $question = Question::orderBy('title', 'DESC');
                    break;
                case 'newest':
                    $question = Question::orderBy('created_at', 'DESC');
                    break;
                case 'oldest':
                    $question = Question::orderBy('created_at', 'ASC');
                    break;

            }
        }

        $question = $question->simplePaginate(5);


        return view('livewire.vragen-overzicht', [
            'topics' => Topics::get(),
            'questions' => $question,
        ]);
    }

    public function ownQuestions()
    {
        if (!$this->ownQuestions) {
            $this->ownQuestions = true;
        } else {
            $this->ownQuestions = false;
        }
    }

    public function getVotes($id)
    {
        $votes_controller = new VotesController();
        return $votes_controller->getRating('Question', $id);
    }
}
