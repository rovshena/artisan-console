<?php

namespace Rovshen\Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Command extends SymfonyCommand
{
    protected string $name;

    protected string $description;

    protected array $arguments = [];

    protected OutputInterface $output;

    protected InputInterface $input;

    public function __construct()
    {
        parent::__construct($this->name);

        if (isset($this->description)) {
            $this->setDescription($this->description);
        }

        $this->setCode(function (InputInterface $input, OutputInterface $output) {
            $this->output = $output;

            $this->input = $input;

            $this->handle();
        });
    }

    protected function configure(): void
    {
        foreach ($this->arguments as $name) {
            $this->addArgument($name, InputArgument::REQUIRED);
        }
    }

    public function argument($name): string
    {
        return $this->input->getArgument($name);
    }

    public function ask($question): false|string
    {
        $this->output->writeln('');

        return readline($question);
    }

    public function info($message): void
    {
        $this->output->writeln("<info>$message</info>");
    }
}