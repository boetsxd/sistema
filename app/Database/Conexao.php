<?php
$hostname     = "localhost"; // Endereço do servidor do banco de dados
$bancodedados = "controle_estoque_limpeza";  // Nome do banco de dados que contem as informações de login
$usuario      = "root";      //usuario do mysql (Padrão=Root)
$senha        = "";          // Senha do mysql (Padrão da senha é em branco)

// Criação do objeto que fará a conexão com os os parâmetros iniciados anteriormente.
try {
    $PDO = new PDO("mysql:host=$hostname;dbname=$bancodedados", $usuario, $senha);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Falha ao Conectar: (" . $e->getCode() . ") " . $e->getMessage(); //Dirá o numero do erro e a descrição do mesmo
}

