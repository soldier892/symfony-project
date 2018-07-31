<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="department")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DepartmentRepository")
 */
class Department
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */

    private $name;

    /**
     * @var string
     * @ORM\Column(name="location", type="string", length=255)
     *
     */

    private $location;


    /**
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */

    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */

    public function setLocation($location)
    {
        $this->location = $location;
    }

}

