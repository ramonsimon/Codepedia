<?php

namespace App\Http\Livewire;

use App\Http\Controllers\VotesController;
use App\Models\Article;
use App\Models\Topics;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;


class ArtikelBeheer extends Component
{
    use WithPagination;

    public $topic = 'all';
    public $search;

    public function getVotes($id)
    {
        $votes_controller = new VotesController();
        return $votes_controller->getRating('Article', $id);
    }

    public function render()
    {

        $search = '%' . $this->search . '%';

        if (Session::has('topic')) {
            $this->topic = Session::get('topic');
        }

        if ($this->topic == "all") {
            $articles = Article::where('title', 'like', $search)->simplePaginate(8, ['*'], 'articlePage');
        } else {
            $articles = Article::where('title', 'like', $search )
                ->where('topic_id', '=', $this->topic)->simplePaginate(8, ['*'], 'articlePage');
        }

        return view('livewire.artikel-beheer', [
            'topics' => Topics::get(),
            'articles' => $articles,
        ]);
    }
}
