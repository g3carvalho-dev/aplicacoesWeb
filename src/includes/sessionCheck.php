<?php
session_start();

define('TIMEOUT_ABSOLUTO', 5 * 60); // 5 minutos

//Se o usuário não estiver logado, redireciona para a página de erro no caso de acesso sem sessão
if (!isset($_SESSION['usuario'])) {
    header('Location: ../pages/4xx.php?motivo=sem_sessao');
    exit;
}

// Se a sessão tiver estourado o tempo limite, encerra a sessão e redireciona para a tela de timeout
if (time() - $_SESSION['ultimo_acesso'] > TIMEOUT_ABSOLUTO) {
    session_unset();
    session_destroy();
    header('Location: ../pages/4xx.php?timeout=1');
    exit;
}

$_SESSION['ultimo_acesso'] = time();
