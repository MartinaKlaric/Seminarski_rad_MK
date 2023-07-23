<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;

class PagePolicy
{
    /**
     * Determine if the given page can be updated by the user.
     */
    public function update(User $user, Page $page): bool
    {
        return $user->id === $page->user_id || $user->isAdmin();
    }

    /**
     * Determine if the given page can be deleted by the user.
     */
    public function delete(User $user, Page $page): bool
    {
        return $user->id === $page->user_id || $user->isAdmin();
    }
}
