<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->mapPolicies();
    }

    public function mapPolicies()
    {

        foreach (glob(__DIR__ . '/../Policies/*.php') as $file) {

            $policy = 'App\Policies\\' . substr(basename($file), 0, -4);

            $model = 'App\Models\\' . str_replace('Policy', '', $policy);

            if (class_exists($model) && class_exists($policy)) {

                Gate::policy($model, $policy);

            }

        }

    }
}
