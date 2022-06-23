<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\question_comments;
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

        if ($this->comment_type == "comment") {
            if ($this->type == 'question') {
                if (!question_comments::where(['question_comments.id' => $this->comment['id']])->join('questions', 'questions.id', 'question_comments.question_id')->get()[0]->is_closed) {

                    if (auth()->id() != $this->comment['user_id'] && !auth()->user()->role('admin')) {
                        return redirect('/vraag/' . $this->slug);
                    }

                    question_comments::where('id', $this->comment['id'])->
                    delete();

                    $this->emit('refresh');

                    $this->forceClose()->closeModal();

                    $this->alert('success', 'Reactie verwijderd', [
                        'position' => 'bottom-end'
                    ]);

                }

                $this->emit('refresh');

                $this->forceClose()->closeModal();

                $this->alert('warning', 'De vraag is gesloten en dus kunnen er geen reacties worden verwijderd', [
                    'position' => 'bottom-end'
                ]);
            } elseif ($this->type == 'article') {

                if (auth()->id() != $this->comment['user_id'] && !auth()->user()->role('admin')) {
                    return redirect('/artikel/' . $this->slug);
                }

                Comments::where('id', $this->comment['id'])->
                delete();

                $this->emit('refresh');

                $this->forceClose()->closeModal();

                $this->alert('success', 'Reactie verwijderd', [
                    'position' => 'bottom-end'
                ]);

            }

        } else {

            if ($this->type == 'question') {
                if (auth()->id() != $this->comment['user_id'] && !auth()->user()->role('admin')) {
                    return redirect('/vraag/' . $this->slug);
                }

                QuestionSubComments::where('id', $this->comment['id'])->
                delete();

                $this->forceClose()->closeModal();

                if ($this->type == 'question')

                $this->emit('refresh');

                $this->forceClose()->closeModal();

                $this->alert('success', 'Reactie verwijderd', [
                    'position' => 'bottom-end'
                ]);
            } elseif ($this->type == 'article') {

                if (auth()->id() != $this->comment['user_id'] && !auth()->user()->role('admin')) {
                    return redirect('/artikel/' . $this->slug);
                }

                SubComments::where('id', $this->comment['id'])->
                delete();

                $this->emit('refresh');

                $this->forceClose()->closeModal();

                $this->alert('success', 'Reactie verwijderd', [
                    'position' => 'bottom-end'
                ]);

            }

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
