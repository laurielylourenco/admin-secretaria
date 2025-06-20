<?php require_once('../app/views/templates/menu.php') ?>

<div class="container-fluid">

    <main class="main-content mb-4">
        <div class="main-header d-flex justify-content-between align-items-center py-3 border-bottom mb-3">
            <div>
                <h1 class="h4">📝 Cadastro de Turma</h1>
            </div>
            <div>
                <a href="<?= URL_BASE ?>?turma=lista" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </main>

    <div class="card">
        <div class="card-header">
            <h5 id="formTitle">Dados da Turma</h5>
        </div>
        <div class="card-body">
            <form id="turmaForm" method="post" action="<?= URL_BASE ?>?turma=inserir">
                <input type="hidden" name="turma" value="inserir">

                <?php if (isset($erro_geral)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($erro_geral) ?></div>
                <?php endif ?>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="nome" class="form-label">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= isset($erros['nome']) ? 'is-invalid' : '' ?>" id="nome" name="nome" value="<?= htmlspecialchars($post['nome'] ?? '') ?>" required>
                        <?php if (isset($erros['nome'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['nome']) ?></div>
                        <?php endif ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="descricao" class="form-label">Descrição <span class="text-danger">*</span></label>
                        <textarea class="form-control <?= isset($erros['descricao']) ? 'is-invalid' : '' ?>" placeholder="Descrição da turma" id="descricao" name="descricao" style="height: 100px" required><?= htmlspecialchars($post['descricao'] ?? '') ?></textarea>
                        <?php if (isset($erros['descricao'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['descricao']) ?></div>
                        <?php endif ?>
                    </div>
                </div>

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