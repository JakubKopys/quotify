<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Quote;
use Like;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Like::creating(function ($like) {
            $like->quote()->increment('likes_count');
        });

        Like::deleting(function ($like) {
            $like->quote()->decrement('likes_count');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
