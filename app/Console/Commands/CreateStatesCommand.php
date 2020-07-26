<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\State;

class CreateStatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_states';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create states';

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
        State::create([
            'state' => "Serbia" 
        ]);
    }
}
