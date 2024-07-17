<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ApplicationPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Application $application): Response
    {
        return ($user->is($application->user))
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Application $application): Response
    {
        return $this->view($user, $application);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Application $application): Response
    {
        return $this->view($user, $application);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Application $application): Response
    {
        return $this->view($user, $application);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Application $application): Response
    {
        return $this->view($user, $application);
    }
}
