<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Reset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the default user account';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $status = Command::SUCCESS;

        $user = User::first();

        if ($user) {
            $user->name = 'admin';
            $user->email = 'admin@example.com';
            $user->save();
            $this->info('[Reset] Default user account reset with the following credentials:');
            
            $header = ['Email', 'Password'];
            $body = [
                ['admin@example.com', 'password']
            ];

            $this->table($header, $body);
            $this->warn('[Setup] You should login and change these credentials immediately.');

            return $status;
        }

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        $this->info('[Setup] Default user account created with the following credentials:');

        $header = ['Email', 'Password'];
        $body = [
            ['admin@example.com', 'password']
        ];

        $this->table($header, $body);
        $this->warn('[Setup] You should login and change these credentials immediately.');

        return $status;
    }
}
