<?php

namespace App\Providers;

use App\Repositories\Post\EloquentPost;
use App\Repositories\Post\PostRepositories;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostRepositories::class, EloquentPost::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Inertia::share([
            'errors' => function () {
                return Session::get('errors') ? Session::get('errors')->getBag('default')->getMessage() :  (object)[];
            }
        ]);

        Inertia::share('flash', function () {
            return [
                'success' => Session::get('success'),
                'errors' => Session::get('errors'),
            ];
        });

    }
}
