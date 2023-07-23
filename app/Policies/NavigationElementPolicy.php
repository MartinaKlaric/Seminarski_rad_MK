<?php

namespace App\Policies;

use App\Models\NavigationElement;
use App\Models\User;

class NavigationElementPolicy
{
    /**
     * Determine a navigation element can be created by the user.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the given navigation element can be updated by the user.
     */
    public function update(User $user, NavigationElement $navigationElement): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the given navigation element user be deleted by the user.
     */
    public function delete(User $user, NavigationElement $navigationElement): bool
    {
        return $user->isAdmin();
    }
}
