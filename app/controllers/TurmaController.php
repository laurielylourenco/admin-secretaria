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

        $this->view('home', ['turma' => 'listagem', 'turma_cadastrada' => $turma]);
    }

    
}
