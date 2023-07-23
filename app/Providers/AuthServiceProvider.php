<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\NavigationElement;
use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use App\Policies\NavigationElementPolicy;
use App\Policies\PagePolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Page::class => PagePolicy::class,
        Role::class => RolePolicy::class,
        NavigationElement::class => NavigationElementPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}