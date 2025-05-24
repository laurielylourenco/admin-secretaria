<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada - 404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa; /* Cor de fundo leve */
        }
        .error-container {
            text-align: center;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: #dc3545; /* Cor de destaque para o 404 (vermelho do Bootstrap) */
            line-height: 1;
            margin-bottom: 20px;
        }
        .error-message {
            font-size: 32px;
            font-weight: 500;
            color: #343a40;
            margin-bottom: 15px;
        }
        .error-description {
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="error-container">
                    <div class="error-code">404</div>
                    <h1 class="error-message">Página Não Encontrada</h1>
                    <p class="error-description">
                        Ops! Parece que a página que você está procurando não existe ou foi movida.
                    </p>
                    <a href="/secretaria/public/index.php" class="btn btn-primary btn-lg">
                        Voltar para a Página Inicial
                    </a>
                    <p class="mt-3 text-muted">Se precisar de ajuda, entre em contato com o suporte.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>