<?php

namespace App\Policies;

use App\Models\User;
use App\Models\reviews_assistant;
use Illuminate\Auth\Access\Response;

class ReviewsAssistantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, reviews_assistant $reviewsAssistant): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, reviews_assistant $reviewsAssistant): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, reviews_assistant $reviewsAssistant): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, reviews_assistant $reviewsAssistant): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, reviews_assistant $reviewsAssistant): bool
    {
        //
    }
}
