<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Domain\Jwt;
use Src\Shared\Domain\ValidateCredentials;
use Src\Shared\Infrastructure\TokenGenerator;
use Src\Shared\Infrastructure\ValidateAuthCredentialsAttempt;
use Src\User\App\FindUserByEmail;
use Src\User\App\LoginUser;
use Src\User\App\RegisterUser;
use Src\User\App\UserEmailAlreadyExist;
use Src\User\Domain\AllUsers;
use Src\User\Infrastructure\AllUsersEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AllUsers::class, function () {
            return new AllUsersEloquent();
        });

        $this->app->bind(UserEmailAlreadyExist::class, function () {
            return new UserEmailAlreadyExist($this->app->make(AllUsers::class));
        });

        $this->app->bind(RegisterUser::class, function () {
            return new RegisterUser(
                $this->app->make(AllUsers::class),
                $this->app->make(UserEmailAlreadyExist::class),
            );
        });

        $this->app->bind(Jwt::class, function () {
            return new TokenGenerator();
        });

        $this->app->bind(LoginUser::class, function () {
            return new LoginUser(
                $this->app->make(AllUsers::class),
                $this->app->make(ValidateCredentials::class),
            );
        });

        $this->app->bind(ValidateCredentials::class, function () {
            return new ValidateAuthCredentialsAttempt();
        });

        $this->app->bind(FindUserByEmail::class, function () {
            return new FindUserByEmail($this->app->make(AllUsers::class),);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
