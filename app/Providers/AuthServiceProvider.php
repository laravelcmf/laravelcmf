<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Passport 的路由
        Passport::routes();
        // access_token 过期时间
        Passport::tokensExpireIn(now()->addDays(15));
        // refreshTokens 过期时间
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
