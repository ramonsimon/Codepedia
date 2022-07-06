<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Votes;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class VotesPolicy
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
     * @param Votes $votes
     * @return Response|bool
     */
    public function view(User $user, Votes $votes)
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
     * @param Votes $votes
     * @return Response|bool
     */
    public function update(User $user, Votes $votes)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Votes $votes
     * @return Response|bool
     */
    public function delete(User $user, Votes $votes)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Votes $votes
     * @return Response|bool
     */
    public function restore(User $user, Votes $votes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Votes $votes
     * @return Response|bool
     */
    public function forceDelete(User $user, Votes $votes)
    {
        //
    }
}
