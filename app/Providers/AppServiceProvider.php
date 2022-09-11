<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Str;
use Module\UserAccess\Models\Website;
use Illuminate\Support\ServiceProvider;
use Website\Nulcode\Models\NulcodeCategory;

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

        
    }
}
