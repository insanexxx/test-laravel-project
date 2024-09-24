<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup project (migration and seeding)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate', ['--seed' => true]); // Выполняет миграции и сидирует базу данных
        $this->info('Project setup completed!');
    }
}
