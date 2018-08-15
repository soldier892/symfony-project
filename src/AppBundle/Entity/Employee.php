<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employees
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var
     * @ORM\Column(name="joining_date", type="date")
     */
    private $joiningDate;

    /**
     *@ORM\Column(name="job_role", type="array")
     *@Assert\NotBlank()
     */
    private $jobRole;

    /**
     * @var
     * @ORM\Column(name="salary", type="decimal")
     */
    private $salary;

    /**
     * @var
     * @ORM\Column(name="employment_type", type="string", length=255)
     */
    private $employmentType;

    /**
     * @var object
     * @ORM\OneToOne(targetEntity="PersonalInfo", mappedBy="employee")
     */
    private $personalInfo;

    /**
     * @var object
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="employee")
     * @ORM\JoinColumn(name="dept_id", referencedColumnName="id")
     */
    private $department;

    /**
     * @var object
     * @ORM\OneToOne(targetEntity="Document", inversedBy="employee")
     */
    private $document;

    /**
     * Many Users have Many Tasks.
     * @ORM\ManyToMany(targetEntity="Task", inversedBy="employee")
     * @ORM\JoinTable(name="employee_task")
     */
    private $task;

    /**
     * Employee constructor.
     */
    public function __construct()
    {
        $this->task = new ArrayCollection();
        $this->jobRole = new ArrayCollection();
    }

    /**
     * @param $name
     * @return object
     */
    public function __get($name)
    {
        return $this->getPersonalInfo();
    }

    /**
     * @return ArrayCollection
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param Task $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getJoiningDate()
    {
        return $this->joiningDate;
    }

    /**
     * @param mixed $joiningDate
     */
    public function setJoiningDate($joiningDate)
    {
        $this->joiningDate = $joiningDate;
    }

    /**
     * @return mixed
     */
    public function getJobRole()
    {
        return $this->jobRole;
    }

    /**
     * @param mixed $jobRole
     */
    public function setJobRole($jobRole)
    {
        $this->jobRole = $jobRole;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getEmploymentType()
    {
        return $this->employmentType;
    }

    /**
     * @param mixed $employmentType
     */
    public function setEmploymentType($employmentType)
    {
        $this->employmentType = $employmentType;
    }

    /**
     * @return object
     */
    public function getPersonalInfo()
    {
        return $this->personalInfo;
    }

    /**
     * @param object $personalInfo
     */
    public function setPersonalInfo($personalInfo)
    {
        $this->personalInfo = $personalInfo;
    }

    /**
     * @return object
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param object $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return object
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param object $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->getEmail();
    }
}