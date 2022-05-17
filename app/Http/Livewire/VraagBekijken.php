<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\Question;
use App\Models\question_comments;
use App\Models\SubComments;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VraagBekijken extends Component
{

    public $question;
    public $info;
    public $body;
    public $rating;
    public $article;
    public $showDiv;
    public $user_id;
    public $has_voted;
    public $question_id;
    public $sub_comment;
    public $has_downvoted;
    public $votes_controller;

    public function mount(Question $question){
        $this->question = $question;
        $this->user_id = Auth::id();
        $this->question_id = $question->id;
    }

    protected $rules = [
        'body' => 'required|min:4|string',
        'user_id' => 'required',
        'question_id' => 'required'
    ];


    public function submit()
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        $this->validate();

        question_comments::create([
            'body' => $this->body,
            'user_id' => auth()->id(),
            'question_id' => $this->question->id
        ]);

        return redirect('/vraag/' . $this->question->slug)->with([
            'title' => 'Gelukt!',
            'message' => 'Uw reactie is geplaatst.',
            'bg' => 'bg-green-200',
            'border' => 'border-green-600'
        ]);
    }



    public function render()
    {
        return view('livewire.vraag-bekijken');
    }
}
