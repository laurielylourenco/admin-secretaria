
<?php



class FormBase
{

    protected function validarDataNascimento($data)
    {

        if (strpos($data, '/') !== false) {
            list($dia, $mes, $ano) = explode('/', $data);
        } elseif (strpos($data, '-') !== false) {
            list($ano, $mes, $dia) = explode('-', $data);
        } else {
            return false; // formato inválido
        }

        $dia = (int)$dia;
        $mes = (int)$mes;
        $ano = (int)$ano;

        // Verifica se a data é válida
        if (!checkdate($mes, $dia, $ano)) {
            return false;
        }

        // Cria o objeto da data de nascimento
        $dataNascimento = DateTime::createFromFormat('Y-m-d', "$ano-$mes-$dia");
        $hoje = new DateTime();

        // Verifica se a data de nascimento é no futuro
        if ($dataNascimento > $hoje) {
            return false;
        }

        // Verifica se a idade está dentro do intervalo aceitável (0 a 130 anos)
        $idade = $hoje->diff($dataNascimento)->y;
        return ($idade >= 0 && $idade <= 130);
    }

    protected function validarCPF($cpf)
    {

        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) != 11) return false;

        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        // Calcula o primeiro dígito verificador
        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($i = 0; $i < $t; $i++) {
                $soma += $cpf[$i] * (($t + 1) - $i);
            }
            $digito = (10 * $soma) % 11;
            $digito = ($digito == 10) ? 0 : $digito;

            if ($cpf[$t] != $digito) return false;
        }

        return true;
    }


    protected function isSenhaForte(string $senha)
    {

        if (strlen($senha) < 8) {
            return false;
        }

        if (!preg_match('/[A-Z]/', $senha)) {
            return false;
        }

        if (!preg_match('/[a-z]/', $senha)) {
            return false;
        }

        if (!preg_match('/[0-9]/', $senha)) {
            return false;
        }

        if (!preg_match('/[^A-Za-z0-9]/', $senha)) {
            return false;
        }
        return true;
    }
}
