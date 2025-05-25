<?php

/* error_reporting(E_ALL);
ini_set('display_errors', 1); */

// Define um caminho para salvar as sessões dentro do projeto
// O __DIR__ aponta para a pasta 'public', então '../sessions' aponta para a pasta 'sessions' na raiz do projeto.
$sessionPath = realpath(__DIR__ . '/../sessions');
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0777, true); // Tenta criar se não existir
}
ini_set('session.save_path', $sessionPath);


require_once '../config/config.php';
require_once '../core/App.php';
 require_once '../core/Controller.php';
require_once '../core/Database.php';
 
session_start();

$app = new App();
