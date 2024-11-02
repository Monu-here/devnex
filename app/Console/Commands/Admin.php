<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {name} {email} {password}';

    /**
     * The console create a new admin';.
     *
     * @var string
     */
    protected $description = 'create a new admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        // Create admin using User model
        $admin = User::create([
            'name' => $name,
            'email' => $email,
            'password' =>  bcrypt($password),
            'role' => '1',
        ]);

        $this->info("Admin created successfully: {$admin->name}");
    }
}
