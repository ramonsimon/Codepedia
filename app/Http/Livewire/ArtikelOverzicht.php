<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Topics;
use App\Models\Article;

class ArtikelOverzicht extends Component
{
    public $topic;
    public $search;

    public function render()
    {
        $search = '%' . $this->search . '%';

        if ($this->topic == "all") {
            $articles = Article::where('title', 'like', $search)->get();
        } else {
            $articles = Article::where('title', 'like', $search )
                ->where('topic_id', '=', $this->topic)->get();
        }

        return view('livewire.artikel-overzicht', [
            'topics' => Topics::get(),
            'articles' => $articles,
        ]);
    }
}
