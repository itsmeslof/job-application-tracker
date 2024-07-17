<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the default user account';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $status = Command::SUCCESS;

        if (User::count()) {
            $this->warn('A user account already exists. To reset its login credentials, run: `php artisan app:reset`');
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
