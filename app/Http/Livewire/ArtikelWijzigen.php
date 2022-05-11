<?php

namespace App\Http\Livewire;

use App\Models\Topics;
use LivewireUI\Modal\ModalComponent;
use App\Models\Article;

class ArtikelWijzigen extends ModalComponent
{
    public $article;
    public $onderwerpen;
    public $title;
    public $articleId;
    public $description;
    public $topic_id;
    public $sub_description;
    public $body;

    protected $rules = [
        'title' => 'required|min:4',
        'topic_id' => 'required|integer',
        'description' => 'required|min:4',
        'sub_description' =>'required|min:4',
    ];

    public function cancel()
    {
        $this->forceClose()->closeModal();
    }

    public function submit()
    {
        $this->articleId = $this->article['id'];
        $this->validate();

        Article::where('id', $this->articleId)->
        update(['title' => $this->title]);

        return redirect('/artikel/beheer')->with([
            'title' => 'Gelukt!',
            'message' => 'Het artikel ' . $this->article['title'] . ' is veranderd naar ' . $this->title,
            'bg' => 'bg-green-200',
            'border' => 'border-green-600'
        ]);
    }

    public function mount($article)
    {
        $this->article = $article;
        $this->onderwerpen = Topics::all();
        $this->title = $this->article['title'];
        $this->body = $this->article['description'];
        $this->topic_id = $this->article['topic_id'];
        $this->sub_description = $this->article['sub_description'];
    }

    public function render()
    {
        return view('livewire.artikel-wijzigen');
    }
}
