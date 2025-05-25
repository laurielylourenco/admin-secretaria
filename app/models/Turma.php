<?php
class Turma
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function criar(string $nome, string $descricao)
    {
        $stmt = $this->db->prepare("INSERT INTO turmas (nome, descricao) VALUES (?,?)");
        return $stmt->execute([$nome, $descricao]);
    }

    public function listar()
    {
        $stmt = $this->db->query("
            SELECT *
            FROM 
                turmas 
            ORDER BY nome ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function deletar(int $id)
    {
        $stmt = $this->db->prepare("DELETE FROM turmas WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function buscarTurmaById(int $id)
    {

        $stmt = $this->db->prepare("SELECT * FROM turmas WHERE id = ?");

        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(int $id, string $nome, string $descricao)
    {
        $stmt = $this->db->prepare("UPDATE turmas SET nome = ?, descricao = ? WHERE id = ?");
        return $stmt->execute([$nome, $descricao, $id]);
    }
}
