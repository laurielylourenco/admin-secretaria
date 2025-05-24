<?php
class Turma
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    
}
