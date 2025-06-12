<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobOfferPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobOffer $jobOffer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can apply for a job offer.
     *
     * @param User $user
     * @param JobOffer $jobOffer
     * @return boolean
     */
    public function apply(User $user, JobOffer $jobOffer): bool
    {
        return $user->role === UserRole::DEVELOPER && 
                ! $user->appliedJobs()->where('job_offer_id', $jobOffer->id)->exists();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobOffer $jobOffer): bool
    {
        return $user->id === $jobOffer->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobOffer $jobOffer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobOffer $jobOffer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobOffer $jobOffer): bool
    {
        return false;
    }
}
