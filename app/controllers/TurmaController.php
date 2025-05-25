<?php

class TurmaController extends Controller
{

    private $turmaModel;

    public function __construct()
    {
        if (!isset($_SESSION['usuario'])) {
            $this->view('usuario/login');
            exit;
        }

        $this->turmaModel = $this->model('Turma');
    }


    public function index()
    {
        $turma = [];
        $lista = $this->turmaModel->listar();
        if ($lista) {
            $turma = $lista;
        }

        $this->view('home', ['turma' => 'listagem', 'turma_cadastrada' => $turma]);
    }

    public function criar()
    {
        return $this->view('turma/criar');
    }

    public function inserir()
    {
        try {

            $nome = (string) filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = (string) filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);


            if (empty($nome) || strlen($nome) < 3) {

                return  $this->view('turma/criar', ['erro' => 'Nome precisa ter 3 letras ou mais']);
            }

            if (empty($descricao)) {

                return  $this->view('turma/criar', ['erro' => 'Descrição precisa ser preenchida!']);
            }

            $this->turmaModel->criar($nome, $descricao);

            header("Location: " . URL_BASE . "?turma=criar");
            exit;
        } catch (\Throwable $th) {
            //throw $th;

            return $this->view('turma/criar', ['erro' => 'Erro ao cadastrar turma!']);
        }
    }


    public function listar()
    {
        try {

            $nome = (string) filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = (string) filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);


            if (empty($nome) || strlen($nome) < 3) {

                return  $this->view('turma/criar', ['erro' => 'Nome precisa ter 3 letras ou mais']);
            }

            if (empty($descricao)) {

                return  $this->view('turma/criar', ['erro' => 'Descrição precisa ser preenchida!']);
            }

            $this->turmaModel->criar($nome, $descricao);

            header("Location: " . URL_BASE . "?turma=criar");
            exit;
        } catch (\Throwable $th) {
            //throw $th;

            return $this->view('turma/criar', ['erro' => 'Erro ao cadastrar turma!']);
        }
    }


    public function deletar()
    {

        $id = (int) filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $this->turmaModel->deletar($id);

        header("Location: " . URL_BASE . "?turma=lista");
        exit;
    }

}
