<?php


class AlunoController extends Controller
{
    private $alunoModel;
    public function __construct()
    {
        if (!isset($_SESSION['usuario'])) {
            $this->view('usuario/login');
            exit;
        }

        $this->alunoModel = $this->model('Aluno');
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
            $nome = (string) filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_nascimento = (string) filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf = (string) filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = (string) filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = (string) $_POST['senha'];
            $aluno = $this->alunoModel->buscarSenhaById($id);

            if ($aluno && empty($senha)) {
                $senha = $aluno['senha'];
            }

            if (!isset($nome) || strlen($nome) < 3) {

                return  $this->view('aluno/editar', ['erro' => 'Nome precisa ter mais de 3 letras']);
            }
            if (empty($id)) {
                return $this->view('aluno/editar', ['erro' => 'ID precisa ser enviado!']);
            }

            if (empty($data_nascimento)) {
                return $this->view('aluno/editar', ['erro' => 'Data de nascimento precisa ser enviada!']);
            }

            if ($data_nascimento == date('Y-m-d')) {
                return $this->view('aluno/editar', ['erro' => 'Data de nascimento precisa ser diferente da data atual!']);
            }

            if (empty($cpf)) {
                return $this->view('aluno/editar', ['erro' => 'CPF precisa ser enviado!']);
            } elseif (strlen($cpf) != 11 || !is_numeric($cpf)) {

                return $this->view('aluno/editar', ['erro' => 'CPF inválido!']);
            }

            if (empty($email)) {
                return $this->view('aluno/editar', ['erro' => 'Email precisa ser enviado!']);
            }

            if (!$this->isSenhaForte($senha)) {
                return $this->view('aluno/editar', ['erro' => 'A senha não atende aos critérios de segurança. Ela deve ter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas, números e símbolos.']);
            }


            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $cpf = $this->formatarCPF($cpf);

            $this->alunoModel->atualizar($id, $nome, $data_nascimento, $cpf, $email, $senha);

            return $this->view('aluno/editar', ['sucesso' => 'Aluno atualizado com sucesso']);
        } catch (\Throwable $th) {

            return $this->view('aluno/editar', ['erro' => 'Erro ao atualizar aluno!']);
        }
    }


    public function inserir()
    {

        try {
            $nome = (string) filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_nascimento = (string) filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf = (string) filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = (string) filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = (string) $_POST['senha'];


            if (!isset($nome) || strlen($nome) < 3) {

                return  $this->view('aluno/criar', ['erro' => 'Nome precisa ter mais de 3 letras']);
            }

            if (empty($data_nascimento)) {
                return $this->view('aluno/criar', ['erro' => 'Data de nascimento precisa ser enviada!']);
            }

            if ($data_nascimento == date('Y-m-d')) {
                return $this->view('aluno/criar', ['erro' => 'Data de nascimento precisa ser diferente da data atual!']);
            }

            if (empty($cpf)) {
                return $this->view('aluno/criar', ['erro' => 'CPF precisa ser enviado!']);
            } elseif (strlen($cpf) != 11 || !is_numeric($cpf)) {

                return $this->view('aluno/criar', ['erro' => 'CPF inválido!']);
            }

            if (empty($email)) {
                return $this->view('aluno/criar', ['erro' => 'Email precisa ser enviado!']);
            }

            if ($this->alunoModel->isAluno($cpf, $email)) {
                return $this->view('aluno/criar', ['erro' => 'Esse aluno já existe!']);
            }

            if (!$this->isSenhaForte($senha)) {
                return $this->view('aluno/criar', ['erro' => 'A senha não atende aos critérios de segurança. Ela deve ter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas, números e símbolos.']);
            }


            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $cpf = $this->formatarCPF($cpf);

            $this->alunoModel->criar($nome, $data_nascimento, $cpf, $email, $senha);

            $this->view('aluno/criar', ['sucesso' => 'Aluno criado com sucesso']);
        } catch (\Throwable $th) {
            // throw $th;
            return $this->view('aluno/criar', ['erro' => 'Erro ao cadastrar aluno!']);
        }
    }


    public function deletar()
    {
        $id = (int) filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $this->alunoModel->deletar($id);

        header("Location: " . URL_BASE . "?aluno=lista");
        exit;
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
}
