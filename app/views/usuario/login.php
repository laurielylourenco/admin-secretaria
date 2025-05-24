<div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
        <div class="container container-tight my-5 px-lg-5">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
            </div>
            <h2 class="h3 text-center mb-3">
                Bem-vindo!
            </h2>

            <?php if (isset($erro)): ?>
                <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif ?>
            <form  autocomplete="off" novalidate id="loginForm" method="post" action="<?= URL_BASE ?>?usuario=logar">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailInput" name="email" placeholder="your@email.com" autocomplete="on" required>
                </div>
                <div class="mb-2">

                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" id="passwordInput" name="senha" placeholder="Sua senha" autocomplete="on" required>

                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </div>
            </form>

        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
        <div class="bg-cover h-100 min-vh-100" style="background-image: url(https://images.pexels.com/photos/4050315/pexels-photo-4050315.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1)"></div>
    </div>
</div>