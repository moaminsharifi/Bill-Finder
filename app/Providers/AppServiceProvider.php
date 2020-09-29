<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Hashids\Hashids;

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
        // default String Length Added
        Schema::defaultStringLength(191);
        //
        /**
         * BillKey Singleton
         * usage:
         *  - app()->make('BillKey')->encode($id);
         *  - app()->make('BillKey')->decode($id)[0];
         */
        $this->app->singleton('BillKey' ,function ($app) {
            return new Hashids(0,6 , 'abcdefghijklmnopqrstuvwxyz123456789' );
        });
    }
}
