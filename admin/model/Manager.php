<?php

namespace Projet4\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=db724281053.db.1and1.com;dbname=db724281053;charset=utf8', 'dbo724281053', 'Azerty12!');
        return $db;
    }
}