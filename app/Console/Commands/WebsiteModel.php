<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class WebsiteModel extends Command
{



    protected $signature = 'website:model {name} {path?}';



    protected $description = 'Command description';





    public function handle()
    {

        $name = $this->argument('name');
        $path = $this->argument('path');


        if ($path == '') {
            $path = $this->ask('Website Name: ');
        }



        $stub = file_get_contents(base_path('app/Console/stubs/model.stub'));

        $stub = str_replace('Path', $path, $stub);
        $stub = str_replace('ModelName', $name, $stub);


        $dir = "website/$path/Models";

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }


        $migration = $this->ask('Need Migration(Y/N): ');


        $this->info("Creating Module $name");

        file_put_contents("$dir/$name.php", $stub);


        $this->info("Created Module $name");




        // make migration
        if (strtolower($migration) == 'y' || strtolower($migration) == 'yes') {

            Artisan::call("website:migration $name $path");
        }
    }
}
