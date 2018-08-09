<?php
/**
 * Created by PhpStorm.
 * User: coeus
 * Date: 8/8/18
 * Time: 6:44 PM
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class Employees
{
    public $entityManager;

    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->entityManager = $doctrine;
    }

        public function createEmployee($user)
    {

        $employee = $user->get('employee')->getData();

        $login = $user->get('user')->getData();
        $login->setEnabled(true);
        $login->setPlainPassword($user->getData()["user"]->getPlainPassword());
        $login->setPassword(password_hash($user->getData()["user"]->getPassword(),PASSWORD_BCRYPT));

        $info = $user->get('info')->getData();
        $info->setEmployee($employee);

        $this->entityManager->persist($employee);
        $this->entityManager->persist($login);
        $this->entityManager->flush();

        $this->entityManager->persist($info);
        $this->entityManager->flush();

        return true;
    }

}