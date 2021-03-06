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

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

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

        $this->description = clean(($this->description));

        $this->validate();

        Article::where('id', $this->articleId)->
        update(['title' => $this->title,'description' => $this->description,'topic_id' => $this->topic_id, 'sub_description' => $this->sub_description]);

        $this->emit('refresh');
        $this->closeModal();

    }

    public function mount($article)
    {
        $this->article = $article;
        $this->onderwerpen = Topics::all();
        $this->title = $this->article['title'];
        $this->description = $this->article['description'];
        $this->topic_id = $this->article['topic_id'];
        $this->sub_description = $this->article['sub_description'];
        $this->articleId = $this->article['id'];
    }

    public function render()
    {
        return view('livewire.artikel-wijzigen');
    }
}
