<?php

namespace App\Providers;

use App\Models\Rating;
use App\Policies\RatingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Rating::class => RatingPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
