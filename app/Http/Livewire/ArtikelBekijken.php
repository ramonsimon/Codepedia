<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\User;
use Livewire\Component;
use App\Models\Article;

class ArtikelBekijken extends Component
{

    public $article;
    public $comment;

    protected $rules = [
        'comment' => 'required|max:20|string'
    ];

    public function mount(Article $article)
    {
        $this->article = $article;

    }

    public function submit()
    {
        $validatedData = $this->validate();

        Comments::Create($validatedData);
    }

    public function render()
    {

        return view('livewire.artikel-bekijken');
    }
}
