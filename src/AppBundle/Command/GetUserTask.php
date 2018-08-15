<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Service\UserTask;

/**
 * Class GetUserTask
 * @package AppBundle\Command
 */
class GetUserTask extends Command
{
    public $requirePassword;
    public $userTask;

    public function __construct($requirePassword = false, UserTask $userTask)
    {
        parent::__construct();
        $this->requirePassword = $requirePassword;
        $this->userTask = $userTask;
    }

    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this
            ->setName('app:get-user-task')
            ->setDescription('This Command which will take as an argument username and returns the associated task.')
            ->setHelp('This command allows you to get user associated tasks...')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $tasks = $this->userTask->getUserTask($input->getArgument('username'));

        if ($tasks->count()){
            foreach ($tasks as $task) {
                $output->writeln($task);
            }
            $output->writeln('successfully returned tasks associated with username!');
        }
        else{
            $output->writeln('No tasks assigned with this username!');
        }

    }
}