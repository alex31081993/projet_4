<?php
namespace model;
class Manager
{
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    protected function dbConnect()
    {
        return $this->pdo;
    }
}