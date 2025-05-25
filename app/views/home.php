<?php require_once('../app/views/templates/menu.php') ?>
<main class="main-content">


    <?php if (isset($aluno)): ?>

        <div class="main-header">
            <div>
                <div class="page-title">Aluno</div>
                <h4>Módulo de aluno</h4>
            </div>
            <div>
                <a href="<?= URL_BASE ?>?aluno=criar" class="btn btn-outline-secondary btn-sm me-2">
                    <i class="bi bi-person-fill"></i>
                    Novo Aluno
                </a>
            </div>
        </div>

        <?php require_once('../app/views/aluno/lista.php') ?>

    <?php endif ?>


    <?php if (isset($turma)): ?>

        <div class="main-header">
            <div>
                <div class="page-title">Turma</div>
                <h4>Módulo de turma</h4>
            </div>
            <div>
                <a href="<?= URL_BASE ?>?turma=criar" class="btn btn-outline-secondary btn-sm me-2">
                    <i class="bi bi-person-fill"></i>
                    Nova Turma
                </a>
            </div>
        </div>

        <?php require_once('../app/views/turma/lista.php') ?>

    <?php endif ?>


    <?php if (isset($matricula)): ?>

        <div class="main-header">
            <div>
                <div class="page-title">Matricula</div>
                <h4>Módulo de matricula</h4>
            </div>
            <div>
                <a href="<?= URL_BASE ?>?matricula=criar" class="btn btn-outline-secondary btn-sm me-2">
                    <i class="bi bi-person-fill"></i>
                    Nova Matricula
                </a>
            </div>
        </div>

        <?php require_once('../app/views/matricula/lista.php') ?>

    <?php endif ?>



    <?php if (!isset($aluno) && (!isset($turma) || empty($turma)) && (!isset($matricula) || empty($matricula))): ?>
        <div class="main-header">
            <div>
                <div class="page-title">Home</div>
                <h4>Seja bem vindo!</h4>
            </div>

        </div>

    <?php endif ?>
</main>