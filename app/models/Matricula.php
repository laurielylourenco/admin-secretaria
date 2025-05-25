<?php
class Matricula
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function isMatricula(int $aluno,  int $turma)
    {

        $stmt = $this->db->prepare("SELECT * FROM matriculas WHERE aluno_id = ? AND turma_id = ?");
        $stmt->execute([$aluno, $turma]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function criar(int $aluno, int $turma, string $data_matricula)
    {

        $stmt = $this->db->prepare("INSERT INTO matriculas (aluno_id, turma_id, data_matricula) VALUES (?,?,?)");
        return $stmt->execute([$aluno, $turma, $data_matricula]);
    }
}
