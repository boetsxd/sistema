<?php
require_once __DIR__ . '\..\Modelo\Repositorio\UsuarioRepositorio.php';

function usuarioConectado()
{
    if (! isset($_SESSION['usuario'])) {
        return false;
    }

    if (! $_SESSION['usuario']['conectado']) {
        return false;
    }

    return $_SESSION['usuario'];
}

function usuarioEntrar($usuario, $senha)
{
    global $PDO;
    $usuarioRepo = new UsuarioRepositorio($PDO);
    $senhaa = $usuarioRepo->buscarPorId(1)['senha'];

    echo password_hash('fontes', PASSWORD_DEFAULT);

    echo "<pre>";
    var_dump($senhaa);
    var_dump(password_verify('fontes', $senhaa));
    echo "</pre>";
    exit;

    if ($usuario == 'fontes' && password_verify($senha, $senhaa['senha']) ) {
        $_SESSION['usuario']['conectado'] = true;
        return true;
    }
    return false;
}

function usuarioSair()
{
    $_SESSION['usuario']['conectado'] = false;
}

function requerLogin()
{
    if (! usuarioConectado()) {
        header('Location: /sistema/');
        exit;
    }
}
