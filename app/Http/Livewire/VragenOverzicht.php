<?php

namespace App\Http\Livewire;

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
    public $description;


    protected $rules = [
        'title' => 'required',
        'topic' => 'required',
        'description' => 'required'

    ];


    public function mount(){
        $this->onderwerp = 1;
}

    public function submit(){
        $this->validate();
        Question::create(['title'=> $this->title,'user_id'=> Auth::id(),'topic_id' => $this->onderwerp,'description' => $this->description]);
        $this->reset();
    }

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
