<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Article;

class ArtikelBekijken extends Component
{

    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;

    }



    public function render()
    {

        return view('livewire.artikel-bekijken');
    }
}
