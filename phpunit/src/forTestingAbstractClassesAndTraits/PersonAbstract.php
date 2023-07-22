<?php

namespace forTestingAbstractClassesAndTraits;

abstract class PersonAbstract
{
    protected $firstName;
    protected $lastName;

    public function __construct($name, $last_name)
    {
        $this->firstName = $name;
        $this->lastName = $last_name;
    }

    abstract public function getSalary();

    public function showFullNameAndSalary()
    {
        return $this->firstName . ' ' . $this->lastName . ' earns ' . $this->getSalary(). ' per month';
    }
}
