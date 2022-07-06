<?php

namespace App\Policies;

use App\Models\User;
use App\Models\articles_rating;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlesRatingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param articles_rating $articlesRating
     * @return Response|bool
     */
    public function view(User $user, articles_rating $articlesRating)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param articles_rating $articlesRating
     * @return Response|bool
     */
    public function update(User $user, articles_rating $articlesRating)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param articles_rating $articlesRating
     * @return Response|bool
     */
    public function delete(User $user, articles_rating $articlesRating)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param articles_rating $articlesRating
     * @return Response|bool
     */
    public function restore(User $user, articles_rating $articlesRating)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param articles_rating $articlesRating
     * @return Response|bool
     */
    public function forceDelete(User $user, articles_rating $articlesRating)
    {
        //
    }
}
