<?php require_once('../app/views/templates/menu.php') ?>

<?php

$alunoId = isset($aluno_update['id']) ? htmlspecialchars($aluno_update['id']) : '';
$nomeValor = isset($aluno_update['nome']) ? htmlspecialchars($aluno_update['nome']) : '';
$dataNascimentoValor = isset($aluno_update['data_nascimento']) ? htmlspecialchars($aluno_update['data_nascimento']) : ''; // Formato: YYYY-MM-DD
$cpfValor = isset($aluno_update['cpf']) ? htmlspecialchars($aluno_update['cpf']) : '';
$emailValor = isset($aluno_update['email']) ? htmlspecialchars($aluno_update['email']) : '';
?>

<div class="container-fluid">

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
            <h5 id="formTitle">Editar Dados do Aluno: <?= htmlspecialchars($aluno_update['nome'] ?? '') ?></h5>
        </div>
        <div class="card-body">
            <form id="studentForm" method="post" action="<?= URL_BASE ?>?aluno=atualizar">

                <input type="hidden" name="id" value="<?= htmlspecialchars($aluno_update['id'] ?? '') ?>">
                <input type="hidden" name="aluno" value="atualizar">

                <?php if (isset($erros['geral'])): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($erros['geral']) ?></div>
                <?php endif; ?>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= isset($erros['nome']) ? 'is-invalid' : '' ?>" id="nome" name="nome" value="<?= htmlspecialchars($aluno_update['nome'] ?? '') ?>" required>
                        <?php if (isset($erros['nome'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['nome']) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="dataNascimento" class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
                        <input type="date" class="form-control <?= isset($erros['data_nascimento']) ? 'is-invalid' : '' ?>" id="dataNascimento" name="dataNascimento" value="<?= htmlspecialchars($aluno_update['data_nascimento'] ?? '') ?>" required>
                        <?php if (isset($erros['data_nascimento'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['data_nascimento']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= isset($erros['cpf']) ? 'is-invalid' : '' ?>" id="cpf" name="cpf" placeholder="Apenas números" maxlength="11" value="<?= htmlspecialchars($aluno_update['cpf'] ?? '') ?>" required>
                        <?php if (isset($erros['cpf'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['cpf']) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control <?= isset($erros['email']) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="exemplo@dominio.com" value="<?= htmlspecialchars($aluno_update['email'] ?? '') ?>" required>
                        <?php if (isset($erros['email'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['email']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control <?= isset($erros['senha']) ? 'is-invalid' : '' ?>" id="senha" name="senha" placeholder="Deixe em branco para não alterar">
                        <small class="form-text text-muted">Preencha apenas se desejar alterar a senha atual.</small>
                        <?php if (isset($erros['senha'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['senha']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

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