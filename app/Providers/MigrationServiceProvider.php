<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Module\UserAccess\Models\Website;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // $activeModules = Cache::rememberForever('active_modules', function () {
        //     return Module::active()->get();
        // });


        if (file_exists(base_path("module/UserAccess/routes/web.php"))) {

            $this->loadMigrationsFrom([

                base_path() . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . "UserAccess" . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations',
            ]);
        }


        try {

            $activeWebsites = Website::active()->get();

            foreach ($activeWebsites as $key => $website) {

                $website_name = str_replace(" ", "", $website->directory_name);

                $this->loadMigrationsFrom([

                    base_path() . DIRECTORY_SEPARATOR . 'website' . DIRECTORY_SEPARATOR . $website_name . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations',
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
