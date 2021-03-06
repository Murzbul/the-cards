<?php

namespace App\Console\Commands;

use CardsGame\Entities\User;
use CardsGame\Repositories\PersistRepository;
use Illuminate\Console\Command;

class UserCreateCommand extends Command
{
    protected $signature = 'card:user:create
                                {email : The user\'s email}
                                {--password= : The user\'s password.}
                                {--name= : The user\'s name.}';

    protected $description = 'Register users';

    public function handle(PersistRepository $persistRepository)
    {
        $email = $this->argument('email');
        $password = $this->option('password');
        $name = $this->option('name');

        $user = new User($name, $email, bcrypt($password));

        $persistRepository->save($user);

        $this->info('User ' . $user->getEmail() . ' created successfully');
    }
}
