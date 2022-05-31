<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Question;
use App\Models\Topics;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class QuestionWijzigen extends ModalComponent
{
    public $question;
    public $description;
    public $pnderwerpen;
    public $body;

    protected $rules = [

    ];

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }





    public function submit()
    {
        ;
        $this->description = clean(($this->description));

        $this->validate();

        Question::where('id', $this->question->id)->
        update(['title' => $this->title,'description' => $this->description,'topic_id' => $this->topic_id]);

        return redirect('/artikel/beheer')->with([
            'title' => 'Gelukt!',
            'message' => 'Het artikel '  . ' is veranderd naar ' . $this->title,
            'bg' => 'bg-green-200',
            'border' => 'border-green-600'
        ]);

    }

    public function mount(
    )
    {

    $this->onderwerpen = Topics::all();
    }

    public function render()
    {
        return view('livewire.question-wijzigen');
    }
}
