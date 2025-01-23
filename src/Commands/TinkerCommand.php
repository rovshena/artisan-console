<?php

namespace Rovshen\Console\Commands;

use Rovshen\Console\Command;

class TinkerCommand extends Command
{
    protected string $name = 'tinker';

    protected string $description = 'Interact with your application';

    public function handle(): void
    {
        while (true) eval($this->ask('>>> '));
    }
}