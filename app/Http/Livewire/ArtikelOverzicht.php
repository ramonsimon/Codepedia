<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\Topics;
use App\Models\Article;
use Symfony\Component\Console\Input\Input;

class ArtikelOverzicht extends Component
{
    public $topic = 'all';
    public $search;

    public function render()
    {
        $search = '%' . $this->search . '%';

        if (Session::has('topic')) {
            $this->topic = Session::get('topic');
        }

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
