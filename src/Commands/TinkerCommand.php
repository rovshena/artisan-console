<?php

namespace Rovshen\LaravelArtisanConsole\Commands;

use Rovshen\LaravelArtisanConsole\Command;

class TinkerCommand extends Command
{
    protected string $name = 'tinker';

    protected string $description = 'Interact with your application';

    public function handle(): void
    {
        while (true) eval($this->ask('>>> '));
    }
}