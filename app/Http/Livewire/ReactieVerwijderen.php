<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\question_comments;
use App\Models\QuestionComments;
use App\Models\QuestionSubComments;
use App\Models\SubComments;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class ReactieVerwijderen extends ModalComponent
{
    use LivewireAlert;

    public $slug;
    public $type;
    public $comment;
    public $comment_type;

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }

    public function delete()
    {
        if ($this->type == 'article' && $this->comment_type == 'sub_comment') {
            $comment = SubComments::where('id', $this->comment['id'])->first();
            $comment->delete();
        } elseif ($this->type == 'article') {
            $comment = Comments::where('id', $this->comment)->first();
            $comment->delete();
        } elseif ($this->type == 'question' && $this->comment_type == 'sub_comment' && $this->comment['question']->is_closed == false) {
            $comment = QuestionSubComments::where('id', $this->comment['id'])->first();
            $comment->delete();
        } elseif ($this->type == 'question' && $this->comment['question']->is_closed == false) {
            $comment = QuestionComments::where('id', $this->comment['id'])->first();
            $comment->delete();
        }

        // check if question is closed
        if ($this->type == 'question' && $this->comment['question']->is_closed == true) {
            $this->alert('warning', 'Deze vraag is gesloten', [
                'position' => 'bottom-end'
            ]);
        } else {
            $this->alert('success', 'Reactie verwijderd', [
                'position' => 'bottom-end'
            ]);
        }

        $this->forceClose()->closeModal();
        $this->emit('refresh');


        }

    public function mount($comment, $slug, $type, $comment_type)
    {
        $this->comment = $comment;
        $this->slug = $slug;
        $this->type = $type;
        $this->comment_type = $comment_type;
    }

    public function render()
    {
        return view('livewire.reactie-verwijderen');
    }
}
