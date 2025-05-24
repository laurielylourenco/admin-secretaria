<h2 class="mb-3">👩‍🎓 Alunos Cadastrados</h2>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody id="studentsTableBody">
            <?php if (!empty($alunos_cadastrado)): ?>
                <?php foreach ($alunos_cadastrado as $aluno): ?>
                    <tr>
                        <td><?= htmlspecialchars($aluno['nome'] ) ?></td>
                        <td><?= htmlspecialchars(($aluno['data_nascimento'])) ?></td>
                        <td><?= htmlspecialchars($aluno['cpf']) ?></td>
                        <td><?= htmlspecialchars($aluno['email']) ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-sm me-1" onclick="editarAluno(<?= $aluno['id'] ?? '' ?>)">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" data-aluno-id="<?= $aluno['id'] ?? '' ?>" data-aluno-nome="<?= htmlspecialchars($aluno['nome'] ?? '') ?>">
                                <i class="fas fa-trash"></i> Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center" id="noDataRow">Nenhum aluno cadastrado ainda.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">🚨 Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir o aluno <strong id="studentNameToDelete"></strong>? Esta ação não poderá ser desfeita.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Excluir</button>
            </div>
        </div>
    </div>