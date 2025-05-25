<?php
class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }


    public function buscarPorEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
