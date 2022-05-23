<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\User;
use Livewire\Component;
use App\Models\Topics;
use Nette\Utils\Html;


class ArtikelToevoegen extends Component
{
public $title;
public $onderwerpen;
public $topic_id = 1;
public $description;

public $sub_description;


    protected $rules = [
        'title' => 'required|min:4',
        'topic_id' => 'required|integer|exists:topics,id',
        'description' => 'required|min:4',
        'sub_description' =>'required|min:4',

    ];

    public function submit()
    {
        $this->description = clean(($this->description));
        $validatedData = $this->validate();
        Article::create($validatedData);

        return redirect()->to('/artikel/beheer');

    }


    public function render()
    {
        $this->onderwerpen = Topics::all();
        return view('livewire.artikel-toevoegen');
    }
}
