<?php
/**
 * Created by PhpStorm.
 * User: coeus
 * Date: 8/13/18
 * Time: 12:08 PM
 */

namespace AppBundle\Service;

use AppBundle\Entity\Employee;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class GetUserTask
 * @package AppBundle\Service
 */
class UserTask
{
    /**
     * @var EntityManagerInterface
     */
    public $entityManager;

    /**
     * @var ArrayCollection
     */
    public $task;

    /**
     * Employees constructor.
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->entityManager = $doctrine;
        $this->task = new ArrayCollection();
    }

    /**
     * @param $username
     */
    public function getUserTask($username)
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy([
            'username' => $username
        ]);

        $employee = $this->entityManager->getRepository(Employee::class)->findOneBy([
            'email' => $user->getEmail()
        ]);

//        $this->task = $employee->getTask();

        dump($employee->getTask());
    }
}