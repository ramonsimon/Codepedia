<?php

namespace App\Http\Livewire;


use App\Models\Question;
use App\Models\Topics;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class VraagWijzigen extends ModalComponent
{
    use LivewireAlert;
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
        if(!$this->question->is_closed) {
            $this->description = clean(($this->description));

            $this->validate();

            Question::where('id', $this->question->id)->
            update(['title' => $this->title, 'description' => $this->description, 'topic_id' => $this->topic_id]);

            $this->alert('success', 'Vraag aangepast', [
                'position' => 'bottom-end'
            ]);
        }else {
            $this->alert('warning', 'Deze vraag is gesloten', [
                'position' => 'bottom-end'
            ]);
        }

        $this->emit('refresh');
        $this->closeModal();

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
