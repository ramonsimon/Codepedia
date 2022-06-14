<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Question;
use App\Models\Topics;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class VraagWijzigen extends ModalComponent
{
    public $question;
    public $description;
    public $pnderwerpen;
    public $body;
    public $title;
    public $topic_id;

    protected $rules = [

        'description' => 'required',
        'title' => 'required',
        'topic_id' => 'required'
    ];

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }

    public function submit()
    {
        if(!$this->question->is_closed ) {
            $this->description = clean(($this->description));

            $this->validate();

            Question::where('id', $this->question->id)->
            update(['title' => $this->title, 'description' => $this->description, 'topic_id' => $this->topic_id]);

            return redirect('/vragen/overzicht')->with([
                'title' => 'Gelukt!',
                'message' => 'De vraag is gewijzigd',
                'bg' => 'bg-green-200',
                'border' => 'border-green-600'
            ]);
        }

        return redirect('/vragen/overzicht')->with([
            'title' => 'Oeps!',
            'message' => 'Deze vraag is gesloten',
            'bg' => 'bg-green-200',
            'border' => 'border-green-600'
        ]);

    }

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->onderwerpen = Topics::all();
        $this->title = $this->question->title;
        $this->description = $this->question->description;
        $this->topic_id = $this->question->topic_id;
    }

    public function render()
    {
        return view('livewire.question-wijzigen');
    }
}
