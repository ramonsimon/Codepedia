<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Article;

class ArtikelVerwijderModal extends ModalComponent
{
    public $article;

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }

    public function delete()
    {
        Article::where('id', $this->article['id'])->
        delete();

        $this->forceClose()->closeModal();

        return redirect('/artikel/beheer')->with([
            'title' => 'Gelukt!',
            'message' => 'Het artikel is verwijderd.',
            'bg' => 'bg-green-600',
            'border' => 'border-green-800'
        ]);

    }

    public function mount($article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.artikel-verwijder-modal');
    }
}

