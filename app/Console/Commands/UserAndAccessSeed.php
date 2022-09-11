<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UserAndAccessSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user-access:seed';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $seed_path = 'Module\UserAccess\database\seeders\Permission\DatabaseSeeder';

        Artisan::call('db:seed', [
            '--class' => $seed_path
        ]);

        $this->info("Data seeding successfully!");
    }
}
