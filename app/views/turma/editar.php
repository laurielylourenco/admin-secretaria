<?php require_once('../app/views/templates/menu.php') ?>

<?php

$turmaId = isset($turma_update['id']) ? htmlspecialchars($turma_update['id']) : '';
$nomeValor = isset($turma_update['nome']) ? htmlspecialchars($turma_update['nome']) : '';
$descricaoValor = isset($turma_update['descricao']) ? htmlspecialchars($turma_update['descricao']) : '';
?>

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
            <h5 id="formTitle">Editar Dados da Turma: <?= $nomeValor ?></h5>
        </div>
        <div class="card-body">
            <form id="studentForm" method="post" action="<?= URL_BASE ?>">
                <input type="hidden" name="id" value="<?= $turmaId ?>">
                <input type="hidden" name="turma" value="atualizar">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="nome" class="form-label">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $nomeValor ?>" required>
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-md-12">

                        <div class="form-floating">
                        <textarea class="form-control" placeholder="Descrição" id="descricao" name="descricao" ><?= $descricaoValor ?></textarea>
                            <label for="descricao" class="form-label">Descrição <span class="text-danger">*</span></label>
                        </div>
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