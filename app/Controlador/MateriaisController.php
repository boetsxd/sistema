<?php
require_once __DIR__ . '\..\Modelo\Repositorio\MaterialRepositorio.php';



/**
 * @param array $request = ['method' => 'GET', 'page' => ''] || ['method' => 'POST', 'action' => '']
 */
function materiaisControlador(array $request)
{
    
    if ($request['metodo'] === 'POST') {
        
        adicionarProduto();
        exit;
    }

    if ($request['metodo'] === 'GET') {
        switch ($request['pagina']) {
            case 'adicionar':
                require __DIR__ . '/../../views/materiais/adicionar.php';
                exit;

            case 'exibir':
                exibirProduto();
                exit;

            case 'listar':
                listarProdutos();
                exit;
        }
    }
}

function adicionarProduto()
{
    $nomeProduto       = trim($_POST['nome_produto'] ?? '');
    $descricaoProduto  = trim($_POST['descricao'] ?? '');
    $quantidadeProduto = (int) ($_POST['quantidade_em_estoque'] ?? -1);
    $validadeProduto   = trim($_POST['data_validade']) ?? date('Y-m-d');

    if (! $nomeProduto || $nomeProduto == '') {
        $_SESSION['erro'] = [
            'codigo'   => 400,
            'campo'    => 'nome_do_produto',
            'mensagem' => "Nome do produto invalido.",
        ];
        header('Location: /sistema/');
        exit;
    }
    if (! $descricaoProduto || $descricaoProduto == '') {
        $_SESSION['erro'] = [
            'codigo'   => 400,
            'campo'    => 'descricao',
            'mensagem' => "Descrição do produto invalida.",
        ];
        header('Location: /sistema/');
        exit;
    }
    if (! $quantidadeProduto || $quantidadeProduto < 0) {
        $_SESSION['erro'] = [
            'codigo'   => 400,
            'campo'    => 'quantidade_em_estoque',
            'mensagem' => "Quantidade do produto invalida.",
        ];
        header('Location: /sistema/');
        exit;
    }
    if (! $validadeProduto || $validadeProduto == '') {
        $_SESSION['erro'] = [
            'codigo'   => 400,
            'campo'    => 'data_validade',
            'mensagem' => "Data de validade do produto invalida.",
        ];
        header('Location: /sistema/');
        exit;
    }
    if ($validadeProduto < date('Y-m-d')) {
        $_SESSION['erro'] = [
            'codigo'   => 400,
            'campo'    => 'data_validade',
            'mensagem' => "Data de validade do produto não pode ser anterior a data de hoje.",
        ];
        header('Location: /sistema/');
        exit;
    }

    global $PDO;
$materialRepo = new MaterialRepositorio($PDO); 
    $id = $materialRepo->adicionarMaterial($nomeProduto, $quantidadeProduto, $descricaoProduto);
    
    // TODO: Inserção no banco de dados
    definirPagina('/listar');
    /* TODO: Exibir erro no front-end
    Para exibir o erro no front-end é so adicionar esse bloco de código em qualquer lugar do html que já vai aparecer se der algum erro.
    Sugestão de apresentação do erro:
    ```php
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
    ```
    O estilo vocês façam como preferir.
    */
    header('Location: /sistema/');
    exit;
}

function listarProdutos()
{
    global $PDO;
    $materialRepo = new MaterialRepositorio($PDO);

    $_SESSION['produto'] = $materialRepo->listarMateriais()[2];

    require __DIR__ . '/../../views/materiais/listar.php';
}

function exibirProduto()
{
    if (! isset($_SESSION['produto'])) {
        // TODO: prevenção de erros
        /*
        definirPagina('listar');
        header('Location: /sistema');
        exit;
        */
    }
    require __DIR__ . '/../../views/materiais/exibir.php';
}
