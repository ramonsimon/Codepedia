<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\question_comments;
use LivewireUI\Modal\ModalComponent;

class ReactieVerwijderen extends ModalComponent
{

    public $slug;
    public $type;
    public $comment;

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }

    public function delete()
    {
        //TODO make sure this will also work with articles

        if ($this->type == 'question') {
            if (!question_comments::where(['question_comments.id' => $this->comment['id']])->join('questions', 'questions.id', 'question_comments.question_id')->get()[0]->is_closed) {

                if (auth()->id() != $this->comment['user_id']) {
                    return redirect('/vraag/' . $this->slug);
                }

                question_comments::where('id', $this->comment['id'])->
                delete();

                $this->forceClose()->closeModal();

                if ($this->type == 'question')
                    return redirect('/vraag/' . $this->slug)->with([
                        'title' => 'Gelukt!',
                        'message' => 'De reactie is verwijderd.',
                        'bg' => 'bg-green-600',
                        'border' => 'border-green-800'
                    ]);

            }

            return redirect('/vraag/' . $this->slug)->with([
                'title' => 'Oeps!',
                'message' => 'De vraag is gesloten, er kunnen daarom geen reacties worden verwijderd.',
                'bg' => 'bg-red-600',
                'border' => 'border-red-800'
            ]);
        } elseif($this->type == 'article') {

                if (auth()->id() != $this->comment['user_id']) {
                    return redirect('/artikel/' . $this->slug);
                }

                Comments::where('id', $this->comment['id'])->
                delete();

                $this->forceClose()->closeModal();

                    return redirect('/artikel/' . $this->slug)->with([
                        'title' => 'Gelukt!',
                        'message' => 'De reactie is verwijderd.',
                        'bg' => 'bg-green-600',
                        'border' => 'border-green-800'
                    ]);
            }

    }

    public function mount($comment, $slug, $type)
    {
        $this->comment = $comment;
        $this->slug = $slug;
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.reactie-verwijderen');
    }
}
