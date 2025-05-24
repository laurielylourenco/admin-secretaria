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

    public function isAluno($cpf, $email){

        $stmt = $this->db->prepare("SELECT * FROM alunos WHERE email = ? OR cpf = ?");
        $stmt->execute([$email, $cpf]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}
