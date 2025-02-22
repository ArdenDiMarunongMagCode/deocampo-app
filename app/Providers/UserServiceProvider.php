<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function ($app) {
            $users = [
                [
                    'name' => 'Jhondel',
                    'gender' => 'Unknown',
                ],
                [
                    'name' => 'james',
                    'gender' => 'babae',
                ]
            ];
            return new UserService($users);

        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
