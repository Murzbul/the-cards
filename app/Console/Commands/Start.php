<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Start extends Command
{
    protected $signature = 'cards:start';
    protected $description = 'Started command project';

    public function handle()
    {
        if (! app()->environment('local')) {
            $this->error('ARE YOU CRAZY? This is a development only command');

            return;
        }

        $this->warn('Schema Drop');
        Artisan::call('doctrine:schema:drop --force');
        $this->info(Artisan::output());

        $this->warn('Schema Update');
        Artisan::call('doctrine:schema:update');
        $this->info(Artisan::output());

        $this->warn('Create Admin Role');
        Artisan::call('card:role:create Admin');
        $this->info(Artisan::output());

        $this->warn('Create Admin Role');
        Artisan::call('card:role:create Editor');
        $this->info(Artisan::output());

        $this->warn('Create Admin User');
        Artisan::call('card:user:create admin@cards.com --password=123456 --name=admin');
        $this->info(Artisan::output());

        $this->warn('Assign role to a user');
        Artisan::call('card:assign:role:to:user admin@cards.com admin');
        $this->info(Artisan::output());

        $this->info('For additional configurations (Sentry, AWS), check the readme file');
    }
}
