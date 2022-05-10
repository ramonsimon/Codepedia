<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\User;
use Livewire\Component;
use App\Models\Article;

class ArtikelBekijken extends Component
{

    public $article;
    public $comment;
    public $hasVoted;
    public $votesCount;


    public function mount(Article $article)
    {
        $this->article = $article;
        $this->hasVoted = $article->isVotedByUser(auth()->user());

    }

    public function vote()
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        if ($this->hasVoted) {
            $this->article->removeVote(auth()->user());
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            $this->article->vote(auth()->user());
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }


    public function render()
    {

        return view('livewire.artikel-bekijken');
    }
}
