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


            if($email === "laurielylourenco@gmail.com"  && $senha === '123' ){
                $_SESSION['usuario'] = ["nome" => "Lauriely", "email" => "laurielylourenco@gmail.com"] ;

                //$this->view('home');

                header("Location: ". URL_BASE);
            } else {
                $this->view('usuario/login', ['erro' => 'Email ou senha inválidos']);
            }
        }
    }

   

    public function logout()
    {
        session_destroy();
        header("Location: ". URL_BASE);
        exit;
    }
}
