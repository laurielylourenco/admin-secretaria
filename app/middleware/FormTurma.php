<?php

require_once "/var/www/html/admin-secretaria/app/middleware/FormBase.php";

class FormTurma extends FormBase
{
    public function validar(): array
    {
        $nome = (string) trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
        $descricao = (string) trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS));

        $erros = [];

        if (empty($nome) || strlen($nome) < 3) {
            $erros['nome'] = 'O nome da turma precisa ter 3 letras ou mais.';
        }

        if (empty($descricao)) {
            $erros['descricao'] = 'A descrição precisa ser preenchida.';
        }

        return $erros;
    }
}