<?php

namespace App\Http\Livewire;

use App\Models\QuestionComments;
use App\Models\QuestionSubComments;
use App\Models\SubComments;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;
use App\Models\Comments;

class ReactieWijzigen extends ModalComponent
{
    use LivewireAlert;

    public $slug;
    public $body;
    public $type;
    public $comment;
    public $comment_type;


    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    protected $rules = [
        'body' => 'required|min:4',
    ];

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }


    public function submit()
    {
        if (!auth()->check()) {
            return;
        }
        if ($this->type == 'article' && $this->comment_type == 'sub_comment') {

            $comment = SubComments::where('id', $this->comment['id'])->first();
            $comment->description = $this->body;
            $comment->save();
        }  elseif ($this->type == 'article') {
            $comment = Comments::where('id', $this->comment)->first();
            $comment->body = $this->body;
            $comment->save();
        } elseif ($this->type == 'question' && $this->comment_type == 'sub_comment') {
            $comment = QuestionSubComments::where('id', $this->comment['id'])->first();
            $comment->description = $this->body;
            $comment->save();
        } elseif ($this->type == 'question') {
            $comment = QuestionComments::where('id', $this->comment['id'])->first();
            $comment->body = $this->body;
            $comment->save();


        }
        $this->alert('success', 'Reactie gewijzigd', [
            'position' => 'bottom-end'
        ]);

        $this->emit('refresh');
        $this->closeModal();

    }

    public function mount($comment, $slug, $comment_type)
    {
        $this->comment = $comment;
        $this->slug = $slug;

        if ($comment_type == 'sub_comment') {
            $this->body = $comment['description'];
        }else{
            $this->body = $comment['body'];
        }
        $this->comment_type = $comment_type;


    }

    public function render()
    {

        return view('livewire.reactie-wijzigen');
    }
}
