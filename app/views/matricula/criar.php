<?php require_once('../app/views/templates/menu.php') ?>

<div class="container-fluid">

    <main class="main-content mb-4">
        <div class="main-header d-flex justify-content-between align-items-center py-3 border-bottom mb-3">
            <div>
                <h1 class="h4">📝 Nova Matrícula</h1>
            </div>
        </div>
    </main>

    <div class="card">
        <div class="card-header">
            <h5 id="formTitle">Dados da Matrícula</h5>
        </div>
        <div class="card-body">
            <form id="matriculaForm" method="post" action="<?= URL_BASE ?>">

                <input type="hidden" name="matricula" value="inserir"> <!-- Onde indentifica requisição -->
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="aluno_id" class="form-label">Aluno <span class="text-danger">*</span></label>
                        <select class="form-control select2-aluno" id="aluno_id" name="aluno_id" required>
                            <option value="">Selecione um aluno...</option>
                            <?php if (!empty($alunos_cadastrado)): ?>
                                <?php foreach ($alunos_cadastrado as $aluno): ?>
                                    <option value="<?= htmlspecialchars($aluno['id']) ?>">
                                        <?= htmlspecialchars($aluno['nome']) ?> (CPF: <?= htmlspecialchars($aluno['cpf'] ?? 'N/D') ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="turma_id" class="form-label">Turma <span class="text-danger">*</span></label>
                        <select class="form-control select2-turma" id="turma_id" name="turma_id" required>
                            <option value="">Selecione uma turma...</option>
                            <?php if (!empty($turma_cadastrada)): ?>
                                <?php foreach ($turma_cadastrada as $turma_item): // Renomeado para evitar conflito com o hidden input original ?>
                                    <option value="<?= htmlspecialchars($turma_item['id']) ?>">
                                        <?= htmlspecialchars($turma_item['nome']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="data_matricula" class="form-label">Data da Matrícula</label>
                        <input type="date" class="form-control" id="data_matricula" name="data_matricula" value="<?= date('Y-m-d') ?>">
                        <small class="form-text text-muted">Opcional. Se não informada, será a data atual.</small>
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
                        <i class="bi bi-check-lg"></i> Matricular Aluno
                    </button>
                </div>
                <div id="formAlert" class="mt-3"></div>
            </form>
        </div>
    </div>
</div>