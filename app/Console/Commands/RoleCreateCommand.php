<?php

namespace App\Console\Commands;

use CardsGame\Entities\Role;
use CardsGame\Repositories\PersistRepository;
use Illuminate\Console\Command;

class RoleCreateCommand extends Command
{
    protected $signature = 'card:role:create
                                {name : The role\'s name}
                                {--slug= : The role\'s slug.}';

    protected $description = 'Register Roles';

    public function handle(PersistRepository $persistRepository)
    {
        $name = $this->argument('name');
        $slug = $this->option('slug') ?? $name;

        $role = new Role($name, strtolower($slug));

        $persistRepository->save($role);

        $this->info('Role ' . $role->getName() . ' created successfully');
    }
}
