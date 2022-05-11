<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\User;
use Livewire\Component;
use App\Models\Article;

class ArtikelBekijken extends Component
{

    public $body;
    public $article;
    public $comment;
    public $has_voted;
    public $has_downvoted;
    public $user_id = 3;
    public $article_id = 8;

    protected $rules = [
        'body' => 'required|min:4|string',
    ];

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->has_voted = $article->isVotedByUser(auth()->user(), true);
        $this->has_downvoted = $article->isVotedByUser(auth()->user(), false);
    }

    public function vote()
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        // Check if user has already voted
        if ($this->has_voted) {
            $this->article->removeVote(auth()->user(), true);
            $this->has_voted = false;
        } else {
            $this->article->vote(auth()->user());
            $this->has_voted = true;
        }
    }

    public function downvote()
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        // Check if user has already voted
        if ($this->has_voted) {
            $this->article->removeVote(auth()->user(), false);
            $this->has_downvoted = false;
        } else {
            $this->article->downvote(auth()->user());
            $this->has_downvoted = true;
        }
    }

    public function submit()
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        $validatedData = $this->validate();

        Comments::create($validatedData);

    }

    public function render()
    {
        return view('livewire.artikel-bekijken');
    }
}
