<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConnectTMDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connect:tmdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate and seed the database with TMDB data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting database migration and seeding...');

        $this->call('migrate', ['--force' => true]);
        $this->call('db:seed', ['--force' => true]);

        $this->info('Database migration and seeding completed successfully.');
    }
}
