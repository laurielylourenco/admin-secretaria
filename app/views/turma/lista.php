<div class="container-fluid">

<h2 class="mb-3">👩‍🎓 Turmas Ativas</h2>
<div class="table-responsive">
    <table id="tabelaTurmas" class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody id="studentsTableBody">
            <?php if (!empty($turma_cadastrada)): ?>
                <?php foreach ($turma_cadastrada as $turma): ?>
                    <tr>
                        <td><?= htmlspecialchars($turma['nome']) ?></td>
                        <td><?= htmlspecialchars(($turma['descricao'])) ?></td>

                        <td class="text-center">
                            <a href="<?= URL_BASE ?>?turma=editar&id_turma=<?= $turma['id'] ?? '' ?>" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModalTurma" data-turma-id="<?= $turma['id'] ?? '' ?>" data-turma-nome="<?= htmlspecialchars($turma['nome'] ?? '') ?>">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td  class="text-center" id="noDataRow">Nenhum Turma cadastrado ainda.</td>
                    <td  class="text-center" id="noDataRow">Nenhum Turma cadastrado ainda.</td>
                    <td  class="text-center" id="noDataRow">Nenhum Turma cadastrado ainda.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="deleteConfirmModalTurma" tabindex="-1" aria-labelledby="deleteConfirmModalLabelTurma" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabelTurma">🚨 Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir a turma <strong id="turmaNameToDelete"></strong>? Esta ação não poderá ser desfeita.
            </div>
            <div class="modal-footer">
                <form action="<?= URL_BASE ?>" method="post" id="deleteFormTurma">
                    <input type="hidden" name="id" id="turmaIdParaExcluir" value="-1">
                    <input type="hidden" name="turma" value="deletar">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>