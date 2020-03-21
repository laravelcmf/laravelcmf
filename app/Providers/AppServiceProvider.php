<?php

namespace App\Providers;

use Dingo\Api\Facade\API;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        if($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        \Carbon\Carbon::setLocale('zh');
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        if($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        API::error(function(\Illuminate\Auth\AuthenticationException $exception) {
            abort(401, $exception->getMessage());
        });

        API::error(function(\Illuminate\Auth\Access\AuthorizationException $exception) {
            abort(403, $exception->getMessage());
        });

        API::error(function(\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            abort(404);
        });

        API::error(function(ValidationException $exception) {
            $firstMessage = array_first($exception->errors());
            $firstMessage = is_array($firstMessage) ? array_first($firstMessage) : $firstMessage;;
            abort(422, $firstMessage);
        });
    }
}
