<?php
class Aluno
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function criar($nome, $dataNascimento, $cpf, $email, $senha)
    {
        $stmt = $this->db->prepare("INSERT INTO alunos (nome, data_nascimento, cpf, email, senha) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nome, $dataNascimento, $cpf, $email, $senha]);
    }
}
