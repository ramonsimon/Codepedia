<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Topics;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\articles_rating;

class ArticleController extends Controller
{

    public $article;
    public $hasVoted;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Coxntracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        return view('index', [
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('index-bekijken', [
        'article' => $article,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
