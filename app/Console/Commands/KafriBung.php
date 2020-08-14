<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class KafriBung extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafri:bung';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Migrate Rollback and All Seeder';

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
        $this->info('Running Bro');
        $this->call('migrate:rollback');
        $this->call('migrate');
        $this->call('db:seed');
        $this->line('Success Bro');
    }
}
