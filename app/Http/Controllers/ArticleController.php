<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Coxntracts\Foundation\Application;
use Illuminate\Http\Response;
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

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
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
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticleRequest $request
     * @return Response
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
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
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @return Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
