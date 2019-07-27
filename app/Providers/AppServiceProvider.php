<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $value = DB::table('additional_information')->first();
        $msgUnred = DB::table('messages')->where('status',1)->count();
        View::share('msgUnred',$msgUnred);
        View::share('company_name',$value->company_name);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
