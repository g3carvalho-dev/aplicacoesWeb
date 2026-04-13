<?php
session_start();

$TIMEOUT = 15 * 60; // 15 minutos em segundos

if (!isset($_SESSION['usuario'])) {
    header('Location: /403.php');
    exit;
}

if (time() - $_SESSION['ultimo_acesso'] > $TIMEOUT) {
    session_unset();
    session_destroy();
    header('Location: /index.php?timeout=1');
    exit;
}

$_SESSION['ultimo_acesso'] = time();
