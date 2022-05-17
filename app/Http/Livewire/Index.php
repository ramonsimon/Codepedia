<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\articles_rating;
use App\Models\Topics;
use Livewire\Component;
use App\Http\Controllers\VotesController;

class Index extends Component
{

    public function getVotes($id)
    {
        $votes_controller = new VotesController();
        return $votes_controller->getRating('Article', $id);
    }

    public function goToArticles($topic)
    {
        return redirect('artikel/overzicht')->with([
            'topic' => $topic
        ]);
    }

    public function render()
    {

        $articles = Article::orderBy('updated_at', 'DESC')
            ->simplePaginate(Article::PAGINATION_COUNT);

        return view('livewire.index', [
            'articles' => $articles,
            'topics' => Topics::skip(0)->take(4)->orderBy("name", "ASC")->get()
        ]);
    }
}
