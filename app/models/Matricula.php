<?php
class Matricula
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    
}
