<?php
include_once __DIR__ . '/app/Utilidades/autenticacao.php';
include_once __DIR__ . '/app/Utilidades/request.php';
include_once __DIR__ . '/app/Utilidades/session.php';

include_once __DIR__ . '/app/Controlador/MateriaisController.php';
include_once __DIR__ . '/app/Controlador/LoginController.php';

include_once __DIR__ . '/app/Database/Conexao.php';

iniciarSessao();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (! usuarioConectado()) {
        loginControlador(['metodo' => 'GET', 'pagina' => 'login']);
        exit;
    }

    if (isset($_GET['pagina'])) {
        definirPagina($_GET['pagina']);
        header('Location: /sistema/');
        exit;
    }

    switch (paginaAtual()) {
        case 'adicionar':
            materiaisControlador(['metodo' => 'GET', 'pagina' => 'adicionar']);
            exit;

        case 'exibir':
            materiaisControlador(['metodo' => 'GET', 'pagina' => 'exibir']);
            exit;

        default:
            materiaisControlador(['metodo' => 'GET', 'pagina' => 'listar']);
            exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        definirAcao($_POST['action']);
    }

    switch (acaoAtual()) {
        case 'login':
            loginControlador(['metodo' => 'POST', 'acao' => 'login']);
            exit;

        case 'logout':
            usuarioSair();
            header('Location: /sistema/');
            exit;

        case 'adicionar':
            requerLogin();
            materiaisControlador(['metodo' => 'POST', 'acao' => 'adicionar']);
            exit;

        default:
            header('Location: /sistema/');
    }
}
