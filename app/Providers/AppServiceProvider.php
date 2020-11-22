<?php

namespace App\Providers;

use App\Favourite;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('infavourite', function ($bookId, $userId) {
            $favourite = new Favourite();
            $book = $favourite->findBook($bookId, $userId);
            return !empty($book);
        });
    }
}
