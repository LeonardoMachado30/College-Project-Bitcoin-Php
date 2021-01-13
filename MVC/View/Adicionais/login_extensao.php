<?php
//Formato de login alternativo para implementacao
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Texto enviado caso o usuário clique no botão Cancelar';
    exit;
} else {
    echo "<p>Olá, {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>Você digitou {$_SERVER['PHP_AUTH_PW']} como sua senha.</p>";
}
