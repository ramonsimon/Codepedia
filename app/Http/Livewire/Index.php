<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\articles_rating;
use App\Models\Topics;
use Livewire\Component;

class Index extends Component
{


    public function goToArticles($topic)
    {
        return redirect('artikel/overzicht')->with([
            'topic' => $topic
        ]);
    }

    public function render()
    {
        return view('livewire.index', [
            'articles' => Article::with('user')
                ->addSelect(['voted_by_user' => articles_rating::select('id')
                    ->where('user_id',auth()->id())
                    ->whereColumn('article_id', 'articles.id')])
                ->withCount('articles_rating')
                ->orderBy('id', 'desc')
                ->simplePaginate(Article::PAGINATION_COUNT),
            'topics' => Topics::skip(0)->take(4)->orderBy("name", "ASC")->get()
        ]);
    }
}
