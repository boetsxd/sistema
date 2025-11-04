<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos de Limpeza (Front-End Mockup)</title>
    <link rel="stylesheet" href="./public/listar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Inventário de Produtos de Limpeza</h1>
        <div class="search-bar-container">
            <div class="search-box">
                <input type="text" placeholder="Pesquisar por nome ou descrição..." class="search-input">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nome do produto</th>
                    <th>Descrição</th>
                    <th>Qt. em estoque</th>
                    <th class="data-val">Data de validade</th>
                    <th>Status de Validade</th>
                </tr>
            </thead>
            <tbody>
                <?php if (1 == 1): ?>
                <tr class="baixo-estoque">
                    <td><?php echo $_SESSION['produto']['nome'] ?></td>
                    <td><?php echo $_SESSION['produto']['descricao'] ?></td>
                    <td><?php echo $_SESSION['produto']['quantidade'] ?></td>
                    <td><?php echo $_SESSION['produto']['data_validade'] ?></td>
                    <td class="ok">OK</td>
                </tr>
                <?php endif ?>
                <tr class="baixo-estoque">
                    <td>Detergente Neutro</td>
                    <td>Limpeza geral, remove gordura.</td>
                    <td>4 un.</td>
                    <td>12/02/2026</td>
                    <td class="ok">OK</td>
                </tr>

                <tr>
                    <td>Sabão em Barra</td>
                    <td>Sabão de coco para roupas delicadas.</td>
                    <td>50 un.</td>
                    <td>03/03/2027</td>
                    <td class="ok">OK</td>
                </tr>

                <tr>
                    <td>Água Sanitária</td>
                    <td>Desinfetante e alvejante poderoso.</td>
                    <td>50 un.</td>
                    <td>15/10/2025</td>
                    <td class="vencido">VENCIDO</td>
                </tr>

                <tr>
                    <td>Limpador Multiuso</td>
                    <td>Perfume lavanda, secagem rápida.</td>
                    <td>120 un.</td>
                    <td>01/01/2026</td>
                    <td class="alerta-vencimento">Alerta (60 dias)</td>
                </tr>

                <tr class="baixo-estoque">
                    <td>Álcool em Gel</td>
                    <td>Antisséptico 70% inpm.</td>
                    <td>8 un.</td>
                    <td>01/05/2026</td>
                    <td class="ok">OK</td>
                </tr>

            </tbody>
        </table>
    </div>

    <form action="/sistema/" method="GET"> <!-- Se for uma página, método GET -->
        <!-- Esse input não aparece na tela mas é necessário para redirecionar, não precisa estilizar mas não apaguem. -->
        <input type="hidden" name="pagina" value="adicionar">
        <button>Adicionar</button>
    </form>
</body>

</html>