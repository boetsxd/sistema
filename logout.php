<?php
include_once __DIR__ . '/app/Utilidades/autenticacao.php';

if (! session_id()) {
        session_start();
    }

usuarioSair();