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


        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="main-header justify-content-center text-center mb-4">
                        <div>
                            <div class="page-title">Home</div>
                            <h4>Seja bem vindo!</h4>
                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4"> <i class="bi bi-bar-chart-steps" style="font-size: 3rem; color: #0d6efd;"></i>
                                <h3 class="card-title mt-2">Sistema de Gestão da Secretaria</h3>
                                <p class="text-muted">Desafio PHP</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php endif ?>
</main>