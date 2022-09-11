<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class Website extends Command
{
  
    

    protected $signature = 'make:website {name}';

    

    protected $description = 'Website Creating Command';

    
    
   

    public function handle()
    {

        $name = $this->argument('name');

        if (!is_dir('website')) {
            mkdir('website', 0755, true);
        }

        $website = "website/$name";

        if (!is_dir($website)) {
            
            mkdir($website, 0755, true);
        }

        if (!is_dir("$website/Controllers")) {

            mkdir("$website/Controllers", 0755, true);
        }

        if (!is_dir("$website/database")) {

            mkdir("$website/database", 0755, true);

            if (!is_dir("$website/database/migrations")) {

                mkdir("$website/database/migrations", 0755, true);
            }

            if (!is_dir("$website/database/seeders")) {

                mkdir("$website/database/seeders", 0755, true);
            }
        }

        if (!is_dir("$website/Models")) {

            mkdir("$website/Models", 0755, true);
        }

        if (!is_dir("$website/Providers")) {

            mkdir("$website/Providers", 0755, true);
        }

        if (!is_dir("$website/Requests")) {

            mkdir("$website/Requests", 0755, true);
        }

        if (!is_dir("$website/routes")) {

            mkdir("$website/routes", 0755, true);

            file_put_contents("$website/routes/web.php", '', FILE_APPEND);
        }

        if (!is_dir("$website/Services")) {

            mkdir("$website/Services", 0755, true);
        }

        $sidebar_name = Str::snake($website);

        if (!is_dir("$website/views/partials/sidebars")) {

            mkdir("$website/views/partials/sidebars", 0755, true);
        }



        $this->info("Website $name Created");

        // $path = $this->argument('path');
    
        
        // if($path == '') {
        //     $path = $this->ask('Module Name: ');
        // }



        // $stub = file_get_contents(base_path('app/Console/stubs/model.stub'));

        // $stub = str_replace('Path', $path, $stub);
        // $stub = str_replace('ModelName', $name, $stub);

        
        // $dir = "module/$path/Models";

        // if (!is_dir($dir)) {
        //     mkdir($dir, 0755, true);
        // }


        // $migration = $this->ask('Need Migration(Y/N): ');

        
        // $this->info("Creating Module $name");

        // file_put_contents("$dir/$name.php", $stub);


        // $this->info("Created Module $name");




        // // make migration
        // if(strtolower($migration) == 'y' || strtolower($migration) == 'yes') {



        //     $migrationDir = "module/$path/database/migrations";


        //     if (!is_dir($migrationDir)) {
        //         mkdir($migrationDir, 0755, true);
        //     }

        //     $migrationStub = file_get_contents(base_path('app/Console/stubs/migration.stub'));
            
        //     $modelPulural = str_plural($name);

        //     $tableName = snake_case($modelPulural);

        //     $time = Carbon::parse(now())->format('Y_m_d_u');


        //     $migrationStub = str_replace('TableName', $tableName, $migrationStub);
        //     $migrationStub = str_replace('ClassName', "Create" . $modelPulural . "Table", $migrationStub);

        //     $filename = $time . '_create_' . snake_case($tableName) . '_table.php';

        //     $this->info("Creating Migration $filename");

        //     file_put_contents("$migrationDir/$filename", $migrationStub);

        //     $this->info("Created Migration $filename");
        // }


    }
}
