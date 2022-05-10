<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Comments;
use Livewire\Component;

class ReactiesToevoegen extends Component
{
    public $article;
    public $comment = 'gggggrrfref';
    protected $rules = [
        'comment' => 'required|min:4',
    ];

    public function addComment()
    {

        $this->validate();

        Comments::create([
            'user_id' => auth()->id(),
            'article_id' => $this->article->id,
            'body' => $this->comment,
        ]);

        $this->reset('comment');

        $this->emit('commentWasAdded', 'Comment was posted!');
    }



    public function mount(Article $article){
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.reacties-toevoegen');
    }
}
