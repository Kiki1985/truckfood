<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateTrucksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_truck{truck}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new truck';

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
     * @return int
     */
    public function handle()
    {
        $truck = $this->argument('truck');
        for ($i=0; $i < $truck; $i++) { 
            factory(\App\Truck::class)->create();
        }
    }
}
