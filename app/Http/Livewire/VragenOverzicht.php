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
    public $order;
    public $ordertype;

    protected $listeners = ['refresh' => 'render'];

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

            switch ($this->filter) {
                case 'descending':
                    $this->order = 'DESC';
                    $this->ordertype = 'title';
                    break;
                case 'newest':
                    $this->order = 'DESC';
                    $this->ordertype = 'created_at';
                    break;
                case 'oldest':
                    $this->order = 'ASC';
                    $this->ordertype = 'created_at';
                    break;
                default:
                    $this->order = 'ASC';
                    $this->ordertype = 'title';
                    break;
            }

        if ($this->topic == "all") {
            $question = Question::where('title', 'like', $search)
                ->orderBy($this->ordertype, $this->order)
                ;
        } else {
            $question = Question::where('title', 'like', $search )
                ->where('topic_id', '=', $this->topic)->orderBy($this->ordertype, $this->order);
        }

        if ($this->ownQuestions) {
            $question = $question->where('user_id', auth()->id());
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
