<?php

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
    public $tasks;

    /**
     * Employees constructor.
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->entityManager = $doctrine;
        $this->tasks = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param $username
     * @return ArrayCollection
     */
    public function getUserTask($username)
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy([
            'username' => $username
        ]);

        $employee = $this->entityManager->getRepository(Employee::class)->findOneBy([
            'email' => $user->getEmail()
        ]);

        foreach ($employee->getTask() as $item) {
            $this->tasks->add($item->getTitle());
        }

        return $this->getTasks();
    }
}