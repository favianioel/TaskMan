<?php namespace TaskMan\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command
{
    protected function configure()
    {
        $this->setName('complete')
            ->setDescription('complete a task by its ID')
            ->addArgument('id', InputArgument::REQUIRED);
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        $this->database->query('delete from tasks where id = :id', compact('id'));
        $output->writeln('<info>Task Completed</info>');

        $this->showTasks($output);
    }
}