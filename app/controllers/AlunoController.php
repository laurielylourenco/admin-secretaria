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
        $this->view('home', ['aluno' => 'listagem']);
    }


    public function criar()
    {
        $this->view('aluno/criar');
    }



    public function inserir()
    {
       

        $nome = (string) $_POST['nome'];
        $data_nascimento = (string) $_POST['dataNascimento'];
        $cpf = (string) $_POST['cpf'];
        $email = (string) $_POST['email'];
        $senha = (string) $_POST['senha'];


        if (!isset($nome) || strlen($nome) < 3) {

          return  $this->view('aluno/criar', ['erro' => 'Nome precisa ter mais de 3 letras']);
        }

        if ($data_nascimento == date('Y-m-d')) {
            return $this->view('aluno/criar', ['erro' => 'Data de nascimento precisa ser diferente da data atual!']);
        }

        if ($this->alunoModel->isAluno($cpf, $email)) {
            return $this->view('aluno/criar', ['erro' => 'Esse aluno já existe!']);
        }

        if (!$this->isSenhaForte($senha)) {
            return $this->view('aluno/criar', ['erro' => 'A senha não atende aos critérios de segurança. Ela deve ter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas, números e símbolos.']);
        }


        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $aluno = $this->alunoModel->criar($nome, $data_nascimento, $cpf, $email, $senha);
        
        $this->view('aluno/criar', ['sucesso' => 'Aluno criado com sucesso']);
    }

    function isSenhaForte($senha)
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
}
