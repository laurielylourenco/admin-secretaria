<?php require_once('/var/www/html/secretaria/app/views/templates/menu.php') ?>



<div class="container">

    <main class="main-content mb-4"> <div class="main-header d-flex justify-content-between align-items-center py-3 border-bottom mb-3">
            <div>
                <h1 class="h4">📝 Cadastro de Alunos</h1> </div>
            <div>
                <a href="<?= URL_BASE ?>?aluno=lista" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </main>

    <div class="card"> <div class="card-header">
            <h5 id="formTitle">Dados do Aluno</h5>
        </div>
        <div class="card-body">
            <form id="studentForm">
                <input type="hidden" id="studentId">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nome" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dataNascimento" class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dataNascimento" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cpf" placeholder="000.000.000-00" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" placeholder="exemplo@dominio.com" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="senha" required>
                    </div>
                    <div class="col-md-6">
                        <label for="confirmarSenha" class="form-label">Confirmar Senha <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="confirmarSenha" required>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2" id="cancelButton" style="display: none;">Cancelar Edição</button>
                    <button type="submit" class="btn btn-primary" id="submitButton">
                        <i class="bi bi-check-lg"></i> Salvar
                    </button>
                </div>
                <div id="formAlert" class="mt-3"></div>
            </form>
        </div>
    </div>

</div>