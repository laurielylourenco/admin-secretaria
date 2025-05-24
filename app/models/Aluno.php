<?php
class Aluno
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function criar(string $nome, string $dataNascimento, string $cpf, string $email, string $senha)
    {
        $stmt = $this->db->prepare("INSERT INTO alunos (nome, data_nascimento, cpf, email, senha) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nome, $dataNascimento, $cpf, $email, $senha]);
    }

    public function atualizar(int $id, string $nome, string $dataNascimento, string $cpf, string $email, string $senha)
    {
        $stmt = $this->db->prepare("UPDATE alunos SET nome = ?, data_nascimento = ?, cpf = ?, email = ?, senha = ? WHERE id = ?");
        return $stmt->execute([$nome, $dataNascimento, $cpf, $email, $senha, $id]);
    }


    public function isAluno(string $cpf, string $email)
    {

        $stmt = $this->db->prepare("SELECT * FROM alunos WHERE email = ? OR cpf = ?");
        $stmt->execute([$email, $cpf]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarAlunoById(int $id_aluno)
    {

        $stmt = $this->db->prepare("SELECT id, nome, data_nascimento,
                REPLACE(REPLACE(REPLACE(cpf, '.', ''), '-', ''), ' ', '') AS cpf,
                email FROM alunos WHERE id = ?");

        $stmt->execute([$id_aluno]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function buscarSenhaById(int $id_aluno)
    {

        $stmt = $this->db->prepare("SELECT senha FROM alunos WHERE id = ?");

        $stmt->execute([$id_aluno]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function listar()
    {
        $stmt = $this->db->query("
            SELECT id, nome,  DATE_FORMAT(data_nascimento, '%d/%m/%Y') AS data_nascimento,
            cpf, email 
            FROM 
                alunos 
            ORDER BY nome ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function deletar(int $id)
    {
        $stmt = $this->db->prepare("DELETE FROM alunos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
