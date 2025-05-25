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
        WITH
            qtd_alunos AS (
                SELECT
                COUNT(*) AS alunos_por_turma,
                turma_id
                FROM
                matriculas
                GROUP BY
                turma_id
        )
        SELECT
        t.id,
        t.nome,
        t.descricao,
        CASE
            WHEN q.alunos_por_turma IS NULL THEN 0
            ELSE q.alunos_por_turma
        END AS alunos_por_turma
        FROM
        turmas t
        LEFT JOIN qtd_alunos q ON q.turma_id = t.id
        ORDER BY
        t.nome ASC;    
        
        
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function buscarTurmaAluno(int $id)
    {

        $stmt = $this->db->prepare("SELECT t.nome as nome_turma, t.descricao as desc_turma, a.nome as nome_aluno, a.cpf,a.email,a.data_nascimento
            FROM
                matriculas m
            INNER JOIN turmas t ON t.id = m.turma_id
            INNER JOIN alunos a ON a.id = m.aluno_id
            WHERE t.id = ?");

        $stmt->execute([$id]);
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
