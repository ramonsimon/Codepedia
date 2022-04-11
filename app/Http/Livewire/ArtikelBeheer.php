<?php

namespace App\Http\Livewire;

use App\Models\Articles;
use Livewire\Component;

class ArtikelBeheer extends Component
{
    public function render()
    {
        return view('livewire.artikel-beheer',
            ['articles' => Articles::all(),
        ]);
    }
}
