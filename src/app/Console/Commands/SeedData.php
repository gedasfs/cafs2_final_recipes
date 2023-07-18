<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SeedData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-data {--class=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts into the database the default data (categories list, etc.)';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('db:seed', ['--class' => $this->option('class') ?? 'DataSeeder']);
    }
}
