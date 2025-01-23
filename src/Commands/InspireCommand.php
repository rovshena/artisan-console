<?php

namespace Rovshen\Console\Commands;

use Rovshen\Console\Command;

class InspireCommand extends Command
{
    protected string $name = 'inspire';

    protected string $description = 'Display an inspiring quote';

    public function handle(): void
    {
        $this->info('I am a fancy tool developed by a great software engineer.');
    }
}