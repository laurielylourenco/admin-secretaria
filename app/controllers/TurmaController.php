<?php


require_once "../app/controllers/LoggerController.php";
require_once "../app/middleware/FormTurma.php";

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
            
            $validarForm = new FormTurma();
            $erros = $validarForm->validar();

            $dadosPost = [
                'nome' => filter_input(INPUT_POST, 'nome'),
                'descricao' => filter_input(INPUT_POST, 'descricao')
            ];

            if (count($erros) > 0) {
                return $this->view('turma/criar', ['erros' => $erros, 'post' => $dadosPost]);
            }

            $this->turmaModel->criar($dadosPost['nome'], $dadosPost['descricao']);

            $_SESSION['sucesso'] = "Turma cadastrada com sucesso!";
            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        } catch (\Throwable $th) {
            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());
            return $this->view('turma/criar', ['erro_geral' => 'Erro ao cadastrar turma!', 'post' => $dadosPost]);
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
            
            $validarForm = new FormTurma();
            $erros = $validarForm->validar();

            $id = (int) filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $dadosPost = [
                'id' => $id,
                'nome' => filter_input(INPUT_POST, 'nome'),
                'descricao' => filter_input(INPUT_POST, 'descricao')
            ];

            if (count($erros) > 0) {
        
                return $this->view('turma/editar', ['erros' => $erros, 'turma_update' => $dadosPost]);
            }

            $this->turmaModel->atualizar($id, $dadosPost['nome'], $dadosPost['descricao']);

            $_SESSION['sucesso'] = "Turma atualizada com sucesso!";
            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        } catch (\Throwable $th) {
            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());
            header("Location: " . URL_BASE . "?turma=lista");
            exit;
        }
    }
}
