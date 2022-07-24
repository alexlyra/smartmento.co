<?php

namespace App\Providers;

use App\Services\UserService\UserManager;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register () {
        $this->app->bind('UserManager', function ($app) {
            return new UserManager();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot () {
        //
    }
}
