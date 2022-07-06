<?php

namespace App\Http\Livewire;

use App\Http\Controllers\VotesController;
use App\Models\articles_rating;
use App\Models\Comments;
use App\Models\Question;
use App\Models\question_comments;
use App\Models\QuestionComments;
use App\Models\QuestionCommentsRating;
use App\Models\QuestionsRating;
use App\Models\QuestionSubComments;
use App\Models\SubComments;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class VraagBekijken extends Component
{
    protected $listeners = ['refresh' => 'render'];

    use WithPagination;
    use LivewireAlert;
    public $question;
    public $info;
    public $body;
    public $rating;
    public $article;
    public $showDiv;
    public $showSub;
    public $user_id;
    public $has_voted;
    public $question_id;
    public $sub_comment;
    public $has_downvoted;
    public $votes_controller;

    public function mount(Question $question){
        $votes_controller = new VotesController();
        $this->info = $votes_controller->getColumn('QuestionsRating');
        $this->question->rating = $votes_controller->getRating('Question', $question->id);
        $this->question = $question;
        $this->has_voted = $votes_controller->isVotedByUser(auth()->user(), true, $question->id, QuestionsRating::query(), $this->info);
        $this->has_downvoted = $votes_controller->isVotedByUser(auth()->user(), false, $question->id, QuestionsRating::query(), $this->info);
        $this->user_id = Auth::id();
        $this->question_id = $question->id;
    }

    protected $rules = [
        'body' => 'required|min:4|string',
        'user_id' => 'required',
        'question_id' => 'required'
    ];


    protected $messages = [
        'body.required' => 'Reactie is verplicht',
    ];

    public function vote($type)
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }

        if (!$this->question->is_closed) {

            $votes_controller = new VotesController();

            // Check if user has already voted and if they clicked vote
            if ($this->has_voted && $type) {
                // Remove the users vote
                $this->question->rating = $votes_controller->removeVote(auth()->user(), true, 'QuestionsRating', $this->question_id, QuestionsRating::query(), $this->info);
                // Set has_voted to false, this removes the blue text
                $this->has_voted = false;
                // Check if user has already downvoted and if they clicked downvote
            } elseif ($this->has_downvoted && !$type) {
                // Remove the users vote
                $this->question->rating = $votes_controller->removeVote(auth()->user(), false, 'QuestionsRating', $this->question_id, QuestionsRating::query(), $this->info);
                // Set has_downvoted to false, this removes the red text
                $this->has_downvoted = false;
                // Goes here if the user selected vote while having a downvote currently on the article (or the other way around)
            } else {
                $this->question->rating = $votes_controller->vote(auth()->user(), $this->has_voted, $this->has_downvoted, $type, $this->question_id, QuestionsRating::query(), $this->info);
                // Sets has_voted/has_downvoted to true according to which button the user clicked
                if ($type) {
                    $this->has_voted = true;
                } else {
                    $this->has_downvoted = true;
                }
            }
        }

    }


    public function commentRating($id)
    {
        $votes_controller = new VotesController();
        return $votes_controller->getRating('QuestionCommentsRating', $id);
    }

    public function submit()
    {

        if (!$this->question->is_closed) {

            if (!auth()->check()) {
                return redirect(route('login'));
            }

            $this->validate();

            question_comments::create([
                'body' => $this->body,
                'user_id' => auth()->id(),
                'question_id' => $this->question->id
            ]);

            $this->alert('success', 'Reactie geplaatst', [
                'position' => 'bottom-end'
            ]);

            $this->body = '';
        }
    }




    public function commentVote($type, $id)
    {
        if (! auth()->check()) {
            return redirect(route('login'));
        }


        $votes_controller = new VotesController();

        $info = $votes_controller->getColumn('QuestionCommentsRating');
        $c_has_voted = $votes_controller->isVotedByUser(auth()->user(), true, $id, QuestionCommentsRating::query(), $info);
        $c_has_downvoted = $votes_controller->isVotedByUser(auth()->user(), false, $id, QuestionCommentsRating::query(), $info);

        // Check if user has already voted and if they clicked vote
        if ($c_has_voted && $type) {
            // Remove the users vote
            $votes_controller->removeVote(auth()->user(), true, 'question_comments_rating', $id, QuestionCommentsRating::query(), $info);
            // Check if user has already downvoted and if they clicked downvote
        } elseif($c_has_downvoted && !$type) {
            // Remove the users vote
            $votes_controller->removeVote(auth()->user(), false, 'question_comments_rating', $id, QuestionCommentsRating::query(), $info);
            // Goes here if the user selected vote while having a downvote currently on the article (or the other way around)
        } else {
            $votes_controller->vote(auth()->user(), $c_has_voted, $c_has_downvoted, $type, $id, QuestionCommentsRating::query(), $info);
        }

    }
    public function addReply($id)
    {
        if (QuestionSubComments::where(['question_comments_id' => $id, 'user_id' =>Auth::id()])->get()->count() < 10) {

            $this->validate([
                'sub_comment' => 'required'
            ]);

             QuestionSubComments::create([
                'question_id' => $this->question->id,
                'user_id' => Auth::id(),
                'description' => $this->sub_comment,
                'question_comments_id' => $id
            ]);
            $this->emit('refresh');
            $this->sub_comment = '';

        }

    }



    public function showDiv($showdiv)
    {
        if ($showdiv == $this->showDiv){
            $this->showDiv = null;
        }else{
            $this->showDiv = $showdiv;
        }
        $this->showSubComments($showdiv);
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

        // sort comments by date with pagination
        $comments = question_comments::where('question_id', $this->question->id)->orderBy('created_at', 'desc')->simplePaginate(3);

        return view('livewire.vraag-bekijken', [
            'comments' => $comments
        ]);
    }
}
