<?php
class UsuarioController extends Controller
{
    private $usuarioModel;

    public function __construct()
    {


        $this->usuarioModel = $this->model('Usuario');
    }

    public function login()
    {

        $this->view('usuario/login');
    }


    public function logar()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            /* */
            $usuario = $this->usuarioModel->buscarPorEmail($email);



            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario'] = [
                    'nome' => $usuario['nome'],
                    'id' => $usuario['id'],
                    'email' => $usuario['email']
                ];
                header("Location: " . URL_BASE);
                exit;
            } else {
                $this->view('usuario/login', ['erro' => 'Email ou senha inválidos']);
            }
        }
    }



    public function logout()
    {
        session_destroy();
        header("Location: " . URL_BASE);
        exit;
    }
}
