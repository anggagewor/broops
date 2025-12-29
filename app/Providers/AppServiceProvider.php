<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Platform\Auth\Domain\Contracts\PasswordHasher;
use Modules\Platform\Auth\Domain\Contracts\TokenIssuer;
use Modules\Platform\Auth\Domain\Contracts\TokenRepository;
use Modules\Platform\Auth\Domain\Contracts\UserRepository;
use Modules\Platform\Auth\Infrastructure\Persistence\DatabaseTokenRepository;
use Modules\Platform\Auth\Infrastructure\Persistence\EloquentUserRepository;
use Modules\Platform\Auth\Infrastructure\Security\JwtTokenIssuer;
use Modules\Platform\Auth\Infrastructure\Security\LaravelPasswordHasher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(PasswordHasher::class, LaravelPasswordHasher::class);
        $this->app->bind(TokenIssuer::class, JwtTokenIssuer::class);
        $this->app->bind(TokenRepository::class,DatabaseTokenRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
