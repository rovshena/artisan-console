<?php

namespace Rovshen\Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Command extends SymfonyCommand
{
    protected string $name;

    protected string $description;

    protected OutputInterface $output;

    public function __construct()
    {
        parent::__construct($this->name);

        if (isset($this->description)) {
            $this->setDescription($this->description);
        }

        $this->output = new ConsoleOutput();

        $this->setCode(fn() => $this->handle());
    }

    public function info($message): void
    {
        $this->output->writeln("<info>$message</info>");
    }
}