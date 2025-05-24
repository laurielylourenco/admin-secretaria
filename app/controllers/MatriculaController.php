<?php

class MatriculaController extends Controller
{

    private $matriculaModel;

    public function __construct()
    {
        if (!isset($_SESSION['usuario'])) {
            $this->view('usuario/login');
            exit;
        }

        $this->matriculaModel = $this->model('Matricula');
    }


    public function index()
    {

        $matricula = [];

        $this->view('home', ['matricula' => 'listagem', 'turma_cadastrada' => $matricula]);
    }
}
