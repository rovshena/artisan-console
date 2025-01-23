<?php

namespace Rovshen\LaravelArtisanConsole\Commands;

use Rovshen\LaravelArtisanConsole\Command;

class MakeCommand extends Command
{
    protected string $name = 'make:command';

    protected string $description = 'Create a new Artisan command';

    protected array $arguments = ['name'];

    public function handle(): void
    {
        $name = $this->argument('name');

        $template = file_get_contents(__DIR__ . '/../../stubs/Command.stub');

        $content = str_replace('{{ $name }}', $name, $template);

        file_put_contents(__DIR__ . "/$name.php", $content);

        $this->info('Console command created successfully.');
    }
}