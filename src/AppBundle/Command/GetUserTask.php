<?php
/**
 * Created by PhpStorm.
 * User: coeus
 * Date: 8/13/18
 * Time: 11:32 AM
 */

namespace AppBundle\Command;

use AppBundle\Entity\Employee;
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

    public function __construct(bool $requirePassword = false, UserTask $userTask)
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
        $output->writeln('successfully returned tasks associated with username!');
        $this->userTask->getUserTask($input->getArgument('username'));

//        dump($employee->getTask());
    }
}