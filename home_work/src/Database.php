<?php
namespace App;

/**
 * READ ME
 * This class works like a database class, but this is only a simulation of real database. We have one mistake here: first letter of each name should be upper-case. But a written unit test should tell us about it before we fix that here.
 */

class Database {

    protected $table = [
        1 => 'adam',
        2 => 'robert',
        3 => 'john',
    ];

    protected function fetchUser($id)
    {
        return $this->table[$id];
    }
}