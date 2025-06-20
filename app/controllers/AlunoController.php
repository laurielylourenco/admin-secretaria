<?php

require_once "../app/controllers/LoggerController.php";
require_once "../app/middleware/FormAluno.php";

class AlunoController extends Controller
{
    private $alunoModel;

    private $logger;

    public function __construct()
    {
        if (!isset($_SESSION['usuario'])) {
            $this->view('usuario/login');
            exit;
        }

        $this->alunoModel = $this->model('Aluno');
        $this->logger =  new LoggerController();
    }


    public function index()
    {
        $alunos_cadastrado = [];
        $lista = $this->alunoModel->listar();
        if ($lista) {
            $alunos_cadastrado = $lista;
        }
        $this->view('home', ['aluno' => 'listagem', 'alunos_cadastrado' => $alunos_cadastrado]);
    }


    public function criar()
    {
        return $this->view('aluno/criar');
    }

    public function editar()
    {

        $id = (int) filter_input(INPUT_GET, 'id_aluno', FILTER_VALIDATE_INT);

        $aluno = $this->alunoModel->buscarAlunoById($id);

        if ($aluno) {
            return $this->view('aluno/editar', ['aluno_update' => $aluno]);
        } else {
            header("Location: " . URL_BASE . "?aluno=lista");
            exit;
        }
    }

    public function atualizar()
    {
        try {
            $id = (int) filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

            $postData = [
                'id' => $id,
                'nome' => trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS)),
                'dataNascimento' => trim(filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_SPECIAL_CHARS)),
                'cpf' => trim(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS)),
                'email' => trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)),
                'senha' => $_POST['senha'] ?? ''
            ];

            $validarForm = new FormAluno();

            $erros = $validarForm->validarUpdate();

            if (!empty($erros)) {
                
                return $this->view('aluno/editar', ['erros' => $erros, 'aluno_update' => $postData]);
            }

            if (empty($postData['senha'])) {
                $senhaAntiga = $this->alunoModel->buscarSenhaById($id);
                $senhaParaSalvar = $senhaAntiga['senha'];
            } else {
                $senhaParaSalvar = password_hash($postData['senha'], PASSWORD_DEFAULT);
            }

            $cpfFormatado = $this->formatarCPF($postData['cpf']);

            
            $this->alunoModel->atualizar($id, $postData['nome'], $postData['dataNascimento'], $cpfFormatado, $postData['email'], $senhaParaSalvar);

            
            $_SESSION['sucesso'] = "Dados do aluno atualizados com sucesso!";
            header("Location: " . URL_BASE . "?aluno=lista");
            exit;
        } catch (\Throwable $th) {
            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());
            $_SESSION['erro_geral'] = "Ocorreu um erro ao atualizar os dados.";
            header("Location: " . URL_BASE . "?aluno=lista");
            exit;
        }
    }

    public function inserir()
    {
        try {
            
            $postData = [
                'nome' => trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS)),
                'dataNascimento' => trim(filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_SPECIAL_CHARS)),
                'cpf' => trim(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS)),
                'email' => trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)),
                'senha' => $_POST['senha'] ?? ''
            ];

            $validarForm = new FormAluno();
            $erros = $validarForm->validarInsert();


            if ($this->alunoModel->isAluno($postData['cpf'], $postData['email'])) {
                $erros['geral'] = "Já existe um aluno cadastrado com este CPF ou E-mail.";
            }

            if (!empty($erros)) {

                return $this->view('aluno/criar', ['erros' => $erros, 'post' => $postData]);
            }

            $senhaHash = password_hash($postData['senha'], PASSWORD_DEFAULT);
            $cpfFormatado = $this->formatarCPF($postData['cpf']);

            $this->alunoModel->criar($postData['nome'], $postData['dataNascimento'], $cpfFormatado, $postData['email'], $senhaHash);

            $_SESSION['sucesso'] = "Aluno cadastrado com sucesso!";
            header("Location: " . URL_BASE . "?aluno=lista");
            exit;
        } catch (\Throwable $th) {
            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());
            return $this->view('aluno/criar', ['erros' => ['geral' => 'Ocorreu um erro inesperado ao cadastrar o aluno.'], 'post' => $postData]);
        }
    }

    public function deletar()
    {
        try {
            $id = (int) filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

            $this->alunoModel->deletar($id);

            header("Location: " . URL_BASE . "?aluno=lista");
            exit;
        } catch (\Throwable $th) {

            $this->logger->logError($th->getMessage(),  $th->getFile(), $th->getLine());

            header("Location: " . URL_BASE . "?aluno=lista");
            exit;
        }
    }



    function isSenhaForte(string $senha)
    {

        if (strlen($senha) < 8) {
            return false;
        }

        if (!preg_match('/[A-Z]/', $senha)) {
            return false;
        }

        if (!preg_match('/[a-z]/', $senha)) {
            return false;
        }

        if (!preg_match('/[0-9]/', $senha)) {
            return false;
        }

        if (!preg_match('/[^A-Za-z0-9]/', $senha)) {
            return false;
        }
        return true;
    }


    function formatarCPF(string $cpf): string
    {
        // Remove qualquer caractere que não seja número
        $cpf = preg_replace('/\D/', '', $cpf);

        // Formata o CPF
        return substr($cpf, 0, 3) . '.' .
            substr($cpf, 3, 3) . '.' .
            substr($cpf, 6, 3) . '-' .
            substr($cpf, 9, 2);
    }

    function validarCPF($cpf)
    {

        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) != 11) return false;

        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        // Calcula o primeiro dígito verificador
        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($i = 0; $i < $t; $i++) {
                $soma += $cpf[$i] * (($t + 1) - $i);
            }
            $digito = (10 * $soma) % 11;
            $digito = ($digito == 10) ? 0 : $digito;

            if ($cpf[$t] != $digito) return false;
        }

        return true;
    }
}
