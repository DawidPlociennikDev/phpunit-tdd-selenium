<?php

class Database
{
    /**
     * @codeCoverageIgnore
     */
    public function getEmailAndLastName()
    {
        echo 'real db touched'; // @codeCoverageIgnore

        // @codeCoverageIgnoreStart
        echo 'real db touched';
        echo 'real db touched';
        echo 'real db touched';
        echo 'real db touched';
        echo 'real db touched';
        echo 'real db touched';
        echo 'real db touched';
        // @codeCoverageIgnoreEnd
    }
}

class User
{
    protected $name;
    private $last_name;
    private $db;

    public function __construct($name, $last_name)
    {
        $this->name = ucfirst($name);
        $this->last_name = ucfirst($last_name);
        $this->db = new Database;
    }

    public function getFullName()
    {
        $this->db->getEmailAndLastName();
        return "$this->name $this->last_name";
    }

    protected function hashPassword()
    {
        return 'password hashed!';
    }

    public function someOperation($array)
    {
        $count = count($array);
        if ($count == 0) return 'error';
        elseif ($count == 1) {
            if ($array[0] == 0) return 'error';
            else return 'ok!';
        } else {
            return 'ok!';
        }
    }
}
