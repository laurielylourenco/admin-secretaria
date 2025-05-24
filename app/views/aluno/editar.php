<?php require_once('/var/www/html/admin-secretaria/app/views/templates/menu.php') ?>

<?php

$alunoId = isset($aluno_update['id']) ? htmlspecialchars($aluno_update['id']) : '';
$nomeValor = isset($aluno_update['nome']) ? htmlspecialchars($aluno_update['nome']) : '';
$dataNascimentoValor = isset($aluno_update['data_nascimento']) ? htmlspecialchars($aluno_update['data_nascimento']) : ''; // Formato: YYYY-MM-DD
$cpfValor = isset($aluno_update['cpf']) ? htmlspecialchars($aluno_update['cpf']) : '';
$emailValor = isset($aluno_update['email']) ? htmlspecialchars($aluno_update['email']) : '';
?>

<div class="container">

    <main class="main-content mb-4">
        <div class="main-header d-flex justify-content-between align-items-center py-3 border-bottom mb-3">
            <div>
                <h1 class="h4">📝 Editar Aluno</h1>
            </div>
            <div>
                <a href="<?= URL_BASE ?>?aluno=lista" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </main>

    <div class="card">
        <div class="card-header">
            <h5 id="formTitle">Editar Dados do Aluno: <?= $nomeValor ?></h5>
        </div>
        <div class="card-body">
            <form id="studentForm" method="post" action="<?= URL_BASE ?>">
                <input type="hidden" name="id" value="<?= $alunoId ?>">

                <input type="hidden" name="aluno" value="atualizar">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $nomeValor ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dataNascimento" class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?= $dataNascimentoValor ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Apenas números"
                            pattern="\d{11}"
                            maxlength="11"
                            title="Digite os 11 dígitos do CPF" value="<?= $cpfValor ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@dominio.com" value="<?= $emailValor ?>" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha"
                            placeholder="Deixe em branco para não alterar">
                        <small class="form-text text-muted">Preencha apenas se desejar alterar a senha atual.</small>
                    </div>
                </div>

                <?php if (isset($erro)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
                <?php endif; ?>

                <?php if (isset($sucesso)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($sucesso) ?></div>
                <?php endif; ?>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" id="submitButton">
                        <i class="bi bi-check-lg"></i> Atualizar Dados
                    </button>
                </div>
                <div id="formAlert" class="mt-3"></div>
            </form>
        </div>
    </div>
</div>