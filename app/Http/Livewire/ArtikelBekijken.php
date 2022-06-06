<?php

namespace App\Http\Livewire;

use App\Models\articles_rating;
use App\Models\SubComments;
use Illuminate\Support\Facades\Auth;
use App\Models\Comments;
use App\Models\Article;
use Livewire\Component;
use App\Models\User;
use App\Models\CommentsRating;
use App\Http\Controllers\VotesController;
use Livewire\WithPagination;

class ArtikelBekijken extends Component
{
    use WithPagination;
    public $info;
    public $body;
    public $rating;
    public $article;
    public $showDiv;
    public $showSub;
    public $user_id;
    public $has_voted;
    public $article_id;
    public $sub_comment;
    public $has_downvoted;
    public $votes_controller;

    protected $rules = [
        'body' => 'required|min:4|string',
        'user_id' => 'required',
        'article_id' => 'required',
        'sub_comment' => '',
    ];

    protected $messages = [
        'body.required' => 'Reactie is verplicht',
    ];

    public function mount(Article $article)
    {
        $votes_controller = new VotesController();
        $this->info = $votes_controller->getColumn('articles_rating');
        $this->article->rating = $votes_controller->getRating('Article', $article->id);
        $this->article = $article;
        $this->has_voted = $votes_controller->isVotedByUser(auth()->user(), true, $article->id, articles_rating::query(), $this->info);
        $this->has_downvoted = $votes_controller->isVotedByUser(auth()->user(), false, $article->id, articles_rating::query(), $this->info);
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
            $this->article->rating = $votes_controller->removeVote(auth()->user(), true, 'articles_rating', $this->article->id, articles_rating::query(), $this->info);
            // Set has_voted to false, this removes the blue text
            $this->has_voted = false;
        // Check if user has already downvoted and if they clicked downvote
        } elseif($this->has_downvoted && !$type) {
            // Remove the users vote
            $this->article->rating = $votes_controller->removeVote(auth()->user(), false, 'articles_rating', $this->article->id, articles_rating::query(), $this->info);
            // Set has_downvoted to false, this removes the red text
            $this->has_downvoted = false;
        // Goes here if the user selected vote while having a downvote currently on the article (or the other way around)
        } else {
            $this->article->rating = $votes_controller->vote(auth()->user(), $this->has_voted, $this->has_downvoted, $type, $this->article->id, articles_rating::query(), $this->info);

            // Sets has_voted/has_downvoted to true according to which button the user clicked
            if ($type) {
                $this->has_voted = true;
            } else {
                $this->has_downvoted = true;
            }
        }

    }

    public function commentVote($type, $id)
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }


        $votes_controller = new VotesController();

        $info = $votes_controller->getColumn('CommentsRating');
        $c_has_voted = $votes_controller->isVotedByUser(auth()->user(), true, $id, CommentsRating::query(), $info);
        $c_has_downvoted = $votes_controller->isVotedByUser(auth()->user(), false, $id, CommentsRating::query(), $info);

        // Check if user has already voted and if they clicked vote
        if ($c_has_voted && $type) {
            // Remove the users vote
            $votes_controller->removeVote(auth()->user(), true, 'comments_rating', $id, CommentsRating::query(), $info);
            // Check if user has already downvoted and if they clicked downvote
        } elseif($c_has_downvoted && !$type) {
            // Remove the users vote
            $votes_controller->removeVote(auth()->user(), false, 'comments_rating', $id, CommentsRating::query(), $info);
            // Goes here if the user selected vote while having a downvote currently on the article (or the other way around)
        } else {
            $votes_controller->vote(auth()->user(), $c_has_voted, $c_has_downvoted, $type, $id, CommentsRating::query(), $info);
        }

    }



    public function addReply($id)
    {
        if (SubComments::where(['comments_id' => $id, 'user_id' =>Auth::id()])->get()->count() < 10) {

            $this->validate([
                'sub_comment' => 'required'
            ]);

            SubComments::create([
                'article_id' => $this->article->id,
                'user_id' => Auth::id(),
                'description' => $this->sub_comment,
                'comments_id' => $id
            ]);

        }

    }

    public function commentRating($id)
    {
        $votes_controller = new VotesController();
        return $votes_controller->getRating('Comments', $id);
    }

    public function submit()
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        $this->body = clean(($this->body));
        $this->validate();
        Comments::create([
            'body' => $this->body,
            'user_id' => auth()->id(),
            'article_id' => $this->article->id
        ]);

        return redirect('/artikel/' . $this->article->slug)->with([
            'title' => 'Gelukt!',
            'message' => 'Uw reactie is geplaatst.',
            'bg' => 'bg-green-200',
            'border' => 'border-green-600'
        ]);
    }

    public function showDiv($showdiv)
    {

        if ($showdiv == $this->showDiv){
            $this->showDiv = null;
        }else{
            $this->showDiv = $showdiv;
        }

    }

    public function showSubComments($showsub)
    {

        if ($showsub == $this->showSub){
            $this->showSub = null;
        }else{
            $this->showSub = $showsub;
        }
    }

    public function render()
    {
        $comments = Comments::where([
            'article_id' => $this->article_id
        ])->simplePaginate(3);

        return view('livewire.artikel-bekijken', [
            'comments' => $comments
        ]);
    }
}
