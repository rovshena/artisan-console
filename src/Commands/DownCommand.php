<?php

namespace Rovshen\LaravelArtisanConsole\Commands;

use Rovshen\LaravelArtisanConsole\Command;

class DownCommand extends Command
{
    protected string $name = 'down';

    protected string $description = 'Put the application into maintenance / demo mode';

    public function handle(): void
    {
        file_put_contents(__DIR__ . '/../../down', '');

        $this->info('Application is now in maintenance mode.');
    }
}