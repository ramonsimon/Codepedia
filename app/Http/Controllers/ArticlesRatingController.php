<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storearticles_ratingRequest;
use App\Http\Requests\Updatearticles_ratingRequest;
use App\Models\articles_rating;

class ArticlesRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storearticles_ratingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storearticles_ratingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\articles_rating  $articles_rating
     * @return \Illuminate\Http\Response
     */
    public function show(articles_rating $articles_rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\articles_rating  $articles_rating
     * @return \Illuminate\Http\Response
     */
    public function edit(articles_rating $articles_rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatearticles_ratingRequest  $request
     * @param  \App\Models\articles_rating  $articles_rating
     * @return \Illuminate\Http\Response
     */
    public function update(Updatearticles_ratingRequest $request, articles_rating $articles_rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\articles_rating  $articles_rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(articles_rating $articles_rating)
    {
        //
    }
}
