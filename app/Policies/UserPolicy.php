<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine a user can be created by the user.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the given user can be updated by the user.
     */
    public function update(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the given role user be deleted by the user.
     */
    public function delete(User $user): bool
    {
        return $user->isAdmin();
    }
}
