<?php require_once('../app/views/templates/menu.php') ?>

<div class="container-fluid">

    <main class="main-content mb-4">
        <div class="main-header d-flex justify-content-between align-items-center py-3 border-bottom mb-3">
            <div>
                <h1 class="h4">📝 Editar Turma</h1>
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
            <h5 id="formTitle">Editar Dados da Turma: <?= htmlspecialchars($turma_update['nome'] ?? '') ?></h5>
        </div>
        <div class="card-body">
            <form id="turmaForm" method="post" action="<?= URL_BASE ?>?turma=atualizar">

                <input type="hidden" name="id" value="<?= htmlspecialchars($turma_update['id'] ?? '') ?>">
                <input type="hidden" name="turma" value="atualizar">

                <?php if (isset($erros['geral'])): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($erros['geral']) ?></div>
                <?php endif; ?>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="nome" class="form-label">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= isset($erros['nome']) ? 'is-invalid' : '' ?>" id="nome" name="nome" value="<?= htmlspecialchars($turma_update['nome'] ?? '') ?>" required>
                        <?php if (isset($erros['nome'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['nome']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="descricao" class="form-label">Descrição <span class="text-danger">*</span></label>
                        <textarea class="form-control <?= isset($erros['descricao']) ? 'is-invalid' : '' ?>" placeholder="Descrição" id="descricao" name="descricao" style="height: 100px" required><?= htmlspecialchars($turma_update['descricao'] ?? '') ?></textarea>
                        <?php if (isset($erros['descricao'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($erros['descricao']) ?></div>
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