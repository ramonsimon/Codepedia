<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Question;
use Illuminate\Http\Request;

class VraagController extends Controller
{
    public function show(Question $question)
    {
        return view('index-bekijken', [
            'question' => $question,
        ]);
    }
}
