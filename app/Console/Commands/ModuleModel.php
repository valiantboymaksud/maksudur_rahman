<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputArgument;

class ModuleModel extends Command
{



    protected $signature = 'module:model {name} {path?}';



    protected $description = 'Command description';





    public function handle()
    {

        $name = $this->argument('name');
        $path = $this->argument('path');


        if ($path == '') {
            $path = $this->ask('Module Name: ');
        }



        $stub = file_get_contents(base_path('app/Console/stubs/model.stub'));

        $stub = str_replace('Path', $path, $stub);
        $stub = str_replace('ModelName', $name, $stub);


        $dir = "module/$path/Models";

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }


        $migration = $this->ask('Need Migration(Y/N): ');


        $this->info("Creating Module $name");

        file_put_contents("$dir/$name.php", $stub);


        $this->info("Created Module $name");




        // make migration
        if (strtolower($migration) == 'y' || strtolower($migration) == 'yes') {

            Artisan::call("module:migration $name $path");
        }
    }
}
