<?php

namespace App\Http\Livewire;

use App\Models\question_comments;
use LivewireUI\Modal\ModalComponent;
use App\Models\Comments;

class ReactieWijzigen extends ModalComponent
{

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

        if ($this->type == 'article') {

            if (auth()->id() != $this->comment['user_id']) {
                return redirect('/artikel/' . $this->slug);
            }

            $this->validate();

            Comments::where('id', $this->comment['id'])->
            update(['body' => $this->body]);

            return redirect('/artikel/' . $this->slug)->with([
                'title' => 'Gelukt!',
                'message' => 'Uw reactie ' . $this->comment['body'] . ' is veranderd naar ' . $this->body,
                'bg' => 'bg-green-200',
                'border' => 'border-green-600'
            ]);

        } elseif($this->type == 'question') {

           if (auth()->id() != $this->comment['user_id']) {
                    return redirect('/vraag/' . $this->slug);
                }

                if($this->comment_type == 'subcomment'){
                    dd('ff');
                }else {

                    question_comments::where('id', $this->comment['id'])->
                    update(['body' => $this->body]);
                }


                if ($this->type == 'question')
                    return redirect('/vraag/' . $this->slug)->with([
                        'title' => 'Gelukt!',
                        'message' => 'Uw reactie ' . $this->comment['body'] . ' is veranderd naar ' . $this->body,
                        'bg' => 'bg-green-600',
                        'border' => 'border-green-800'
                    ]);



            return redirect('/vraag/' . $this->slug)->with([
                'title' => 'Oeps!',
                'message' => 'De vraag is gesloten, er kunnen daarom geen reacties worden gewijzigd.',
                'bg' => 'bg-red-600',
                'border' => 'border-red-800'
            ]);
        }

    }


    public function mount($comment, $slug)
    {
        $this->comment = $comment;
        $this->slug = $slug;
        $this->body = $comment['body'];
    }

    public function render()
    {

        return view('livewire.reactie-wijzigen');
    }
}
