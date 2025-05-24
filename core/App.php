<?php
class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {

        $url = $this->parseUrl();

        if (isset($url[0]) && file_exists("../app/controllers/{$url[0]}Controller.php")) {
            $this->controller = $url[0] . 'Controller';
            unset($url[0]);
        }

        require_once "../app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];


        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl()
    {

        if (isset($_GET['url'])) {


            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        if (isset($_GET['usuario']) && $_GET['usuario'] === 'signup') {

            return ['Usuario', 'signup'];
        }

        if (isset($_GET['usuario']) && $_GET['usuario'] === 'login') {

            return ['Usuario', 'login'];
        }

        if (isset($_POST['usuario']) && $_POST['usuario'] === 'logar') {

            return ['Usuario', 'logar'];
        }

        if (isset($_GET['usuario']) && ($_GET['usuario'] === 'logar')) {
            return ['Usuario', 'logar'];
        }

        if (isset($_GET['usuario']) && ($_GET['usuario'] === 'logout')) {
            return ['Usuario', 'logout'];
        }

        if (isset($_GET['aluno']) && ($_GET['aluno'] === 'lista')) {
            return ['Aluno', 'index'];
        }

        if (isset($_GET['aluno']) && ($_GET['aluno'] === 'criar')) {
            return ['Aluno', 'criar'];
        }

        if (isset($_POST['aluno']) && ($_POST['aluno'] === 'inserir')) {
            return ['Aluno', 'inserir'];
        }

        if (isset($_POST['aluno']) && ($_POST['aluno'] === 'deletar')) {
            return ['Aluno', 'deletar'];
        }

        if (isset($_GET['aluno']) && ($_GET['aluno'] === 'editar')) {
            return ['Aluno', 'editar'];
        }

        if (isset($_POST['aluno']) && ($_POST['aluno'] === 'atualizar')) {
            return ['Aluno', 'atualizar'];
        }

        if (isset($_POST['turma']) && ($_POST['turma'] === 'lista')) {
            return ['Turma', 'lista'];
        }


        
        return [];
    }
}
