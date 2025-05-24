<?php require_once('/var/www/html/admin-secretaria/app/views/templates/menu.php') ?>



<div class="container">

    <main class="main-content mb-4">
        <div class="main-header d-flex justify-content-between align-items-center py-3 border-bottom mb-3">
            <div>
                <h1 class="h4">📝 Cadastro de Alunos</h1>
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
            <h5 id="formTitle">Dados do Aluno</h5>
        </div>
        <div class="card-body">
            <form id="studentForm" method="post" action="<?= URL_BASE ?>">
                <input type="hidden" id="studentId">
                <input type="hidden" id="aluno" name="aluno" value="inserir">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dataNascimento" class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Apenas números"
                            pattern="\d{11}"
                            maxlength="11"
                            title="Digite os 11 dígitos do CPF" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@dominio.com" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>

                </div>
                <?php if (isset($erro)): ?>
                    <div class="alert alert-danger"><?= $erro ?></div>
                <?php endif ?>

                <?php if (isset($sucesso)): ?>
                    <div class="alert alert-success"><?= $sucesso ?></div>
                <?php endif ?>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" id="submitButton">
                        <i class="bi bi-check-lg"></i> Salvar
                    </button>
                </div>
                <div id="formAlert" class="mt-3"></div>
            </form>
        </div>
    </div>

</div>