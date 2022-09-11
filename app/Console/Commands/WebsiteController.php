<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WebsiteController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:controller {name} {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {

        $name = $this->argument('name');
        $path = $this->argument('path');


        if ($path == '') {
            $path = $this->ask('Website Name: ');
        }

        $stub = file_get_contents(base_path('app/Console/stubs/controller.stub'));


        $parts = explode('/', $name);

        $className = array_pop($parts);

        $dir = implode('/', $parts);

        if (!is_dir("website/{$path}/Controllers/$dir")) {

            mkdir("website/{$path}/Controllers/$dir", 0755, true);

            $stub = str_replace("ModuleName", "$path" . "\Controllers\\" . $dir, $stub);
        } else {

            $stub = str_replace("ModuleName", "$path" . "\Controllers", $stub);
        }

        $stub = str_replace('DummyClass', $className, $stub);

        if (!file_exists("website/{$path}/Controllers/$name" . '.php')) {

            file_put_contents("website/{$path}/Controllers/$name" . '.php', $stub);
        }

        $this->info('Controller created success !');
    }
}
