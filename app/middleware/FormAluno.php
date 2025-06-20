<?php

require_once "/var/www/html/admin-secretaria/app/middleware/FormBase.php";

class FormAluno extends FormBase
{


    public function validarInsert(): array
    {

        $nome = (string) trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
        $data_nascimento = (string) trim(filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_SPECIAL_CHARS));
        $cpf = (string) trim(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS));
        $email = (string) trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $senha = (string) trim($_POST['senha']);

        $erros = [];


        if (empty($nome)) {
            $erros['nome'] = "É necessário informar o nome.";
        } elseif (strlen($nome) < 3) {
            $erros['nome'] = "O nome precisa ter 3 letras ou mais.";
        }

        if (empty($data_nascimento)) {
            $erros['data_nascimento'] = "A data de nascimento precisa ser informada.";
        } elseif (!$this->validarDataNascimento($data_nascimento)) {
            $erros['data_nascimento'] = "Data de nascimento inválida. Verifique se a data não é futura.";
        }


        if (empty($cpf)) {
            $erros['cpf'] = "O CPF precisa ser informado.";
        } elseif (!$this->validarCPF($cpf)) {
            $erros['cpf'] = "CPF inválido.";
        }

        if (empty($email)) {
            $erros['email'] = "O e-mail precisa ser informado.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros['email'] = "Formato de e-mail inválido.";
        }

        if (empty($senha)) {
            $erros['senha'] = "A senha precisa ser informada.";
        } elseif (!$this->isSenhaForte($senha)) {
            $erros['senha'] = "A senha deve ter no mínimo 8 caracteres, com maiúsculas, minúsculas, números e símbolos.";
        }


        return $erros;
    }



    public function validarUpdate(): array
    {


        $id = (int) filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = (string) trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
        $data_nascimento = (string) trim(filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_SPECIAL_CHARS));
        $cpf = (string) trim(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS));
        $email = (string) trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $senha = (string) trim($_POST['senha']);


        $erros = [];

        if (empty($nome)) {
            $erros['nome'] = "E necessario informa o nome";
        } elseif (!isset($nome) || strlen($nome) < 3) {
            $erros['nome'] = "Nome precisa ter mais de 3 letras";
        }

        if (empty($data_nascimento)) {
            $erros['data_nascimento'] = "A data de nascimento precisa ser informada.";
        } elseif (!$this->validarDataNascimento($data_nascimento)) {
            $erros['data_nascimento'] = "Data de nascimento inválida";
        }

        if (empty($cpf)) {

            $erros['cpf'] = "CPF precisa ser enviado!";
        } elseif (!$this->validarCPF($cpf)) {
            $erros['cpf'] = "CPF inválido!";
        }

        if (empty($email)) {
            $erros['email'] = "Email precisa ser enviado!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros['email'] = "Email inválido!";
        }

        if (!empty($senha)) {
            if (!$this->isSenhaForte($senha)) {
                $erros['senha'] = "A senha não atende aos critérios de segurança. Ela deve ter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas, números e símbolos.";
            }
        }

        return $erros;
    }
}
