<?php

namespace App\Providers;

use App\Club;
use App\Contact;
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
//        $clubs_header = Club::all();

        $contact = Contact::where('status','=',0)->get();

        $club_permission = Club::where('permission','=','0')->get();


        View::share([

//            'clubs_header'=>$clubs_header,
            'contact'=>$contact,
            'club_permission'=>$club_permission,

        ]);

        Schema::defaultStringLength(191);
    }
}
