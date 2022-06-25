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
        if (!auth()->check()) {
            return;
        }
        if ($this->type == 'article' && $this->comment_type == 'sub_comment') {
            $comment = SubComments::where('id', $this->comment['id'])->first();
        } elseif ($this->type == 'article') {
            $comment = Comments::where('id', $this->comment)->first();
        } elseif ($this->type == 'question' && $this->comment_type == 'sub_comment') {
            $comment = QuestionSubComments::where('id', $this->comment['id'])->first();
        } elseif ($this->type == 'question') {
            $comment = QuestionComments::where('id', $this->comment['id'])->first();
        }

        if ($comment->is_closed == false){
            $comment->delete();
            $this->emit('refresh');
            $this->forceClose()->closeModal();

            $this->alert('success', 'Reactie verwijderd', [
                'position' => 'bottom-end'
            ]);
        } else{
            $this->alert('danger', 'Reactie is gesloten', [
                'position' => 'bottom-end'
            ]);
        }
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
