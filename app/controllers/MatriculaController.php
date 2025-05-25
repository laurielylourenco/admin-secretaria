<?php

class MatriculaController extends Controller
{

    private $matriculaModel;
    private $alunoModel;
    private $turmaModel;

    public function __construct()
    {
        if (!isset($_SESSION['usuario'])) {
            $this->view('usuario/login');
            exit;
        }

        $this->matriculaModel = $this->model('Matricula');
        $this->turmaModel = $this->model('Turma');
        $this->alunoModel = $this->model('Aluno');
    }


    public function index()
    {

        $matricula = [];

        $this->view('home', ['matricula' => 'listagem', 'turma_cadastrada' => $matricula]);
    }


    public function criar()
    {

        /* Todos os aluno */
        $turma = [];
        $alunos_cadastrado = [];

        $lista = $this->turmaModel->listar();
        if ($lista) {
            $turma = $lista;
        }

        $lista = $this->alunoModel->listar();
        if ($lista) {
            $alunos_cadastrado = $lista;
        }
        /* Todas as turmas */
        return $this->view('matricula/criar', ['turma_cadastrada' => $turma, 'alunos_cadastrado' => $alunos_cadastrado]);
    }


    public function inserir()
    {

        $aluno = (int) filter_input(INPUT_POST, 'aluno_id', FILTER_VALIDATE_INT);
        $turma = (int) filter_input(INPUT_POST, 'turma_id', FILTER_VALIDATE_INT);
        $data_matricula = (string) filter_input(INPUT_POST, 'data_matricula', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($aluno)) {

            return  $this->view('matricula/criar', ['erro' => 'Voce precisa passa o aluno']);
        }
        if (empty($turma)) {

            return  $this->view('matricula/criar', ['erro' => 'Voce escolher uma turma']);
        }

        if (empty($data_matricula)) {
            return  $this->view('matricula/criar', ['erro' => 'Data de matricula é necessaria']);
        }

        /* Validação para verificar se Aluno já tem matricula na Turma selecionada RN04 */
        if ($this->matriculaModel->isMatricula($aluno, $turma)) {
            return $this->view('matricula/criar', ['erro' => 'Essa matricula já existe!']);
        }

        $this->matriculaModel->criar($aluno, $turma, $data_matricula);

        header("Location: " . URL_BASE . "?matricula=criar");
        exit;
    }
}
