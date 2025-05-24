<?php


class AlunoController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['usuario'])) {
            $this->view('usuario/login');
            exit;
        }
    }


    public function index()
    {
        $this->view('home', ['aluno' => 'listagem']);
    }


    public function criar()
    {
        $this->view('aluno/criar');
    }
}
