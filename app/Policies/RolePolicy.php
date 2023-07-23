<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class RolePolicy
{
    /**
     * Determine a role can be created by the user.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the given role can be updated by the user.
     */
    public function update(User $user, Role $role): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the given role can be deleted by the user.
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->isAdmin();
    }
}
