<?php

namespace App\Http\Livewire;

use App\Http\Controllers\VotesController;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\Topics;
use App\Models\Article;
use Symfony\Component\Console\Input\Input;

class ArtikelOverzicht extends Component
{
    public $topic = 'all';
    public $search;
    public $filter = false;

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
            $articles = Article::where('title', 'like', $search)->orderBy('title', 'ASC')->get();
        } else {
            $articles = Article::where('title', 'like', $search )
                ->where('topic_id', '=', $this->topic)->orderBy('title', 'ASC')->get();
        }

        if ($this->filter) {
            switch ($this->filter) {

                case 'ascending':
                    $articles = $articles->sortBy('title');
                    break;
                case 'descending':
                    $articles = $articles->sortByDesc('title');
                    break;
                case 'newest':
                    $articles = $articles->sortByDesc('created_at');
                    break;
                case 'oldest':
                    $articles = $articles->sortBy('created_at');
                    break;

            }
        }

        return view('livewire.artikel-overzicht', [
            'topics' => Topics::get(),
            'articles' => $articles,
        ]);
    }
}
