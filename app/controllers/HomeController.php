<?php
class HomeController extends Controller
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
        $this->view('home');
    }
}
