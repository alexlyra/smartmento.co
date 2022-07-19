<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider {
    public function register () {
        $this->buildpath('Validation');
    }

    public function boot () {}

    private function buildpath (string $path = '') {
        $builded = app_path("Helpers/{$path}.php");
        if (file_exists($builded)) {
            require_once ($builded);
        }
    }
}
