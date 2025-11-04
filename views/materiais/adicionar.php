<?php definirAcao('adicionar'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<!--Cabeçalho do código e o título-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="./public/adicionar.css">
</head>


<!--Código do formulário, onde será inserido os dados dos produtos-->

<body>

    <center>
        <div class="container">
<?php if (isset($_SESSION['erro']) && $_SESSION['erro']['codigo'] === 400): ?>
        <div class="erro">
            <p class="mensagem">
                <?php
                    echo $_SESSION['erro']['mensagem'];
                    unset($_SESSION['error']);
                ?>
            </p>
        </div>
    <?php endif?>
            <form action="/sistema/" method="POST">
                <h2>Produtos de Limpeza</h2>

                <img src="./public/logo.png" width="200px">
                <br>
                <label for="Produto">Nome do produto</label>
                <input type="text" name="nome_produto">
                <br>
                <label>Descrição</label>
                <input type="text" name="descricao">
                <br>
                <label>Quantidade em estoque</label>
                <input type="number" name="quantidade_em_estoque">
                <br>
                <label>Data de validade</label>
                <input type="date" name="data_validade">
                <br>
                <button type="submit" class="login-btn">Cadastrar</button>
            </form>
              <form action="/sistema/" method="GET">
                <input type="hidden" name="pagina" value="listar">
                <button>Voltar</button>
            </form>
        </div>
    </center>
</body>



</html>
