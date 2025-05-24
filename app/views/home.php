<?php require_once('/var/www/html/admin-secretaria/app/views/templates/menu.php') ?>
<main class="main-content">


    <?php if (isset($aluno)): ?>

        <div class="main-header">
            <div>
                <div class="page-title">Aluno</div>
                <h4>Alunos cadastrados</h4>
            </div>
            <div>
                <a href="<?= URL_BASE ?>?aluno=criar" class="btn btn-outline-secondary btn-sm me-2">
                    <i class="bi bi-person-fill"></i>
                    Novo Aluno
                </a>
            </div>



        </div>

        <?php require_once('/var/www/html/admin-secretaria/app/views/aluno/lista.php') ?>

    <?php endif ?>


    <?php if (!isset($aluno)): ?>
        <div class="main-header">
            <div>
                <div class="page-title">Overview</div>
                <h4>Vertical layout</h4>
            </div>
            <div>
                <button class="btn btn-outline-secondary btn-sm me-2">New view</button>
                <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle-fill me-1"></i>Create new report</button>
            </div>
        </div>

        <div class="alert alert-info" role="alert">
            O conteúdo da sua página.
        </div>

        <p>Exemplo .</p>
    <?php endif ?>



</main>