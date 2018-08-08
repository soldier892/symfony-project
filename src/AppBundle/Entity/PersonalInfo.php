<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonalInfo
 *
 * @ORM\Table(name="personal_info")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonalInfoRepository")
 */
class PersonalInfo
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
     * @ORM\Column(name="first_name", type="string", length=255)
     */

    private $firstName;

    /**
     * @var string
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     * @ORM\Column(name="gender", type="string", length=64)
     */
    private $gender;

    /**
     * @var mixed
     * @ORM\Column(name="dob", type="date")
     */

    private $dob;

    /**
     * @var string
     * @ORM\Column(name="cnic", type="string", length=64)
     */

    private $cnic;

    /**
     * @var object
     * @ORM\OneToOne(targetEntity="Employee", inversedBy="personalInfo")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     */

    private $employee;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return string
     */
    public function getCnic()
    {
        return $this->cnic;
    }

    /**
     * @param string $cnic
     */
    public function setCnic($cnic)
    {
        $this->cnic = $cnic;
    }

    /**
     * @return object
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param object $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }


}

