<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        parent::__construct();
    }*/

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Insert your name');
        $email = $this->ask('Insert your email');
        $user = User::where('email', '=', $email)->first();
        if($user !== null) {
            $this->info('email adress already exists');
        }else{
            $password = $this->ask('Insert your password');
        if(strlen($password) < 8) {
            $this->info('password must be at least 8 characters long');
        }else{
            $admin = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password), 
                'role' => 'Admin' 
            ]);
            $this->info('Admin added: ' .$admin->name);
            }
        }
    }
}
