
<div class="container mt-5">
    <h2>Criar Conta</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button class="btn btn-success">Cadastrar</button>
       <!--  <a href="<?= URL_BASE ?>/usuario/login" class="btn btn-link">Já tenho conta</a> -->
        <a href="<?= URL_BASE ?>?usuario=login" class="btn btn-link">Já tenho conta</a>
    </form>
</div>
