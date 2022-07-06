<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storearticles_ratingRequest;
use App\Http\Requests\Updatearticles_ratingRequest;
use App\Models\articles_rating;
use Illuminate\Http\Response;

class ArticlesRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
     * @param Storearticles_ratingRequest $request
     * @return Response
     */
    public function store(Storearticles_ratingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param articles_rating $articles_rating
     * @return Response
     */
    public function show(articles_rating $articles_rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param articles_rating $articles_rating
     * @return Response
     */
    public function edit(articles_rating $articles_rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Updatearticles_ratingRequest $request
     * @param articles_rating $articles_rating
     * @return Response
     */
    public function update(Updatearticles_ratingRequest $request, articles_rating $articles_rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param articles_rating $articles_rating
     * @return Response
     */
    public function destroy(articles_rating $articles_rating)
    {
        //
    }
}
