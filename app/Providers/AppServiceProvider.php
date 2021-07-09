<?php

namespace App\Providers;

use App\Club;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        /*$clubs_header = Club::all();


        View::share([

            'clubs_header'=>$clubs_header,

        ]);*/

        Schema::defaultStringLength(191);
    }
}
