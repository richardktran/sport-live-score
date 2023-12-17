<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));
        Vite::macro('css', fn (string $asset) => $this->asset("resources/css/{$asset}"));
        Vite::macro('js', fn (string $asset) => $this->asset("resources/js/{$asset}"));
        Vite::macro('assetsComponent', fn (string $asset) => $this->asset("resources/assets/{$asset}"));
    }
}
