<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\User;
use Livewire\Component;
use App\Models\Topics;


class ArtikelToevoegen extends Component
{
public $title;
public $onderwerpen;
public $topic_id = 1;
public $description;
public $sub_description;


    protected $rules = [
        'title' => 'required',
        'topic_id' => 'required',
        'description' => 'required|min:4',
        'sub_description' =>'required|min:4',

    ];

    //custom message for validation
    protected $messages = [
        'title.required' => 'De titel is verplicht',
        'topic_id.required' => 'Het onderwerp is verplicht',
        'description.required' => 'De inhoud is verplicht',
        'sub_description.required' => 'De omschrijving is verplicht',
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
