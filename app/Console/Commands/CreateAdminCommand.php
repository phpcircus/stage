<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class CreateAdminCommand extends Command
{
    /** @var string */
    protected $name = 'create:admin';

    /** @var string */
    protected $description = 'Create an administrator account using the given options or the defaults from configuration.';

    /** @var \App\Models\User */
    protected $users;

    /**
     * Create a new command instance.
     */
    public function __construct(User $users)
    {
        $this->users = $users;
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->comment('creating admin account...');

        $admin = $this->users->createUser([
            'name' => $this->option('name'),
            'email' => $this->option('email'),
            'password' => $this->option('password'),
            'email_verified_at' => now(),
            'is_admin' => 1,
        ]);

        $this->comment("Admin account for {$admin->name} successfully created.");
    }

    /**
     * Get the options for the command.
     */
    protected function getOptions(): array
    {
        return [
            ['name', null, InputOption::VALUE_OPTIONAL, 'The name of the user.', config('auth.admin.name')],
            ['email', null, InputOption::VALUE_OPTIONAL, 'The email of the user.', config('auth.admin.email')],
            ['password', null, InputOption::VALUE_OPTIONAL, 'The password for the user.', config('auth.admin.password')],
        ];
    }
}
