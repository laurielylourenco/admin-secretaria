<?php


require_once "../app/controllers/LoggerController.php";

class TurmaController extends Controller
{

    private $turmaModel;
    private $logger;
    public function __construct()
    {
        if (!isset($_SESSION['usuario'])) {
            $this->view('usuario/login');
            exit;
        }

        $this->turmaModel = $this->model('Turma');
        $this->logger =  new LoggerController();
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
            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());
            return $this->view('turma/criar', ['erro' => 'Erro ao cadastrar turma!']);
        }
    }




    public function editar()
    {

        try {
            $id = (int) filter_input(INPUT_GET, 'id_turma', FILTER_VALIDATE_INT);

            $turma = $this->turmaModel->buscarTurmaById($id);

            if ($turma) {
                return $this->view('turma/editar', ['turma_update' => $turma]);
            } else {
                header("Location: " . URL_BASE . "?turma=lista");
                exit;
            }
        } catch (\Throwable $th) {

            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());

            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        }
    }


    public function deletar()
    {

        try {

            $id = (int) filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $this->turmaModel->deletar($id);

            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        } catch (\Throwable $th) {
            //throw $th;
            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());
            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        }
    }

    public function buscaPorTurmaAluno()
    {

        try {
            $id_turma = (int) filter_input(INPUT_GET, 'id_turma', FILTER_VALIDATE_INT);

            $turma = [];
            $lista = $this->turmaModel->buscarTurmaAluno($id_turma);
            if ($lista) {
                $turma = $lista;
            }

            $nome_turma = $this->turmaModel->buscarTurmaById($id_turma);


            return $this->view('turma/lista_por_aluno', ['turma_nome' => $nome_turma, 'turma_cadastrada_por_aluno' => $turma]);
        } catch (\Throwable $th) {
            //throw $th;
            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());
            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        }
    }

    public function atualizar()
    {

        try {


            $id = (int) filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

            $nome = (string) filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = (string) filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            $turma_e = $this->turmaModel->buscarTurmaById($id);

            if (empty($nome) || strlen($nome) < 3) {

                return  $this->view('turma/editar', ['erro' => 'Nome precisa ter 3 letras ou mais', 'turma_update' => $turma_e]);
            }

            if (empty($descricao)) {

                return  $this->view('turma/editar', ['erro' => 'Descrição precisa ser preenchida!', 'turma_update' => $turma_e]);
            }

            $this->turmaModel->atualizar($id, $nome, $descricao);

            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        } catch (\Throwable $th) {
            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());
            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        }
    }
}
