<?php

namespace App\Http\Livewire;

use App\Models\articles_rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Comments;
use App\Models\Article;
use Livewire\Component;
use App\Models\User;
use App\Http\Controllers\VotesController;

class ArtikelBekijken extends Component
{

    public $body;
    public $article;
    public $comment;
    public $rating;
    public $has_voted;
    public $has_downvoted;
    public $user_id;
    public $article_id;
    public $votes_controller;

    protected $rules = [
        'body' => 'required|min:4|string',
        'user_id' => 'required',
        'article_id' => 'required'
    ];

    public function mount(Article $article)
    {
        $votes_controller = new VotesController();
        $this->article->rating = $votes_controller->getRating('Article', $article->id);
        $this->article = $article;
        $this->has_voted = $votes_controller->isVotedByUser(auth()->user(), true, 'articles_rating', $article->id, articles_rating::query());
        $this->has_downvoted = $votes_controller->isVotedByUser(auth()->user(), false, 'articles_rating', $article->id, articles_rating::query());
        $this->user_id = Auth::id();
        $this->article_id = $article->id;
    }

    public function vote($type)
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        $votes_controller = new VotesController();

        // Check if user has already voted and if they clicked vote
        if ($this->has_voted && $type) {
            // Remove the users vote
            $this->article->rating = $votes_controller->removeVote(auth()->user(), true, 'articles_rating', $this->article->id, articles_rating::query());
            // Set has_voted to false, this removes the blue text
            $this->has_voted = false;
        // Check if user has already downvoted and if they clicked downvote
        } elseif($this->has_downvoted && !$type) {
            // Remove the users vote
            $this->article->rating = $votes_controller->removeVote(auth()->user(), false, 'articles_rating', $this->article->id, articles_rating::query());
            // Set has_downvoted to false, this removes the red text
            $this->has_downvoted = false;
        // Goes here if the user selected vote while having a downvote currently on the article (or the other way around)
        } else {
            $this->article->rating = $votes_controller->vote(auth()->user(), $this->has_voted, $this->has_downvoted, $type, 'articles_rating', $this->article->id, articles_rating::query());

            // Sets has_voted/has_downvoted to true according to which button the user clicked
            if ($type) {
                $this->has_voted = true;
            } else {
                $this->has_downvoted = true;
            }
        }

    }

    public function downvote()
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        // Check if user has already voted
        if ($this->has_downvoted) {
            $this->article->rating = $this->article->removeVote(auth()->user(), false)->rating;
            $this->has_downvoted = false;
        } else {
            $this->article->rating = $this->article->downvote(auth()->user())->rating;
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
