<?php require_once('../app/views/templates/menu.php') ?>

<div class="container-fluid">


    <main class="main-content">
        <div class="main-header d-flex justify-content-between align-items-center py-3 border-bottom mb-3">
            <div>
                <h1 class="h4"> 👩‍🎓 Alunos Ativos: <?= htmlspecialchars(($turma_nome['nome'])) ?></h1>
            </div>
            <div>
                <a href="<?= URL_BASE ?>?turma=lista" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </main>

    <h2 class="mb-3"> </h2>
    <div class="table-responsive">
        <table id="tabelaTurmasPorAluno" class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nome Aluno</th>
                    <th>CPF</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="studentsTableBody">
                <?php if (!empty($turma_cadastrada_por_aluno)): ?>
                    <?php foreach ($turma_cadastrada_por_aluno as $turma): ?>
                        <tr>
                            <td><?= htmlspecialchars($turma['nome_aluno']) ?></td>
                            <td><?= htmlspecialchars(($turma['cpf'])) ?></td>
                            <td><?= htmlspecialchars(($turma['email'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td class="text-center" id="noDataRow">Nenhum registro ainda.</td>
                        <td class="text-center" id="noDataRow">Nenhum registro ainda.</td>
                        <td class="text-center" id="noDataRow">Nenhum registro ainda.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>