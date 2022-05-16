<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use LivewireUI\Modal\ModalComponent;

class ReactieVerwijderen extends ModalComponent
{

    public $slug;
    public $comment;

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }

    public function delete()
    {
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

    public function mount($comment, $slug)
    {
        $this->comment = $comment;
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.reactie-verwijderen');
    }
}
