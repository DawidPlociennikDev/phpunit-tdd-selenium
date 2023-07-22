<?php

namespace forTestingAbstractClassesAndTraits;

class Employee extends PersonAbstract 
{
    public function getSalary()
    {
        return 50 * 100; // $ * h
    }
}