<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops — Acesso Negado</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/4xx.css">
</head>

<body>
    <?php
$motivo = $_GET['motivo'] ?? 'sem_sessao';
$isTimeout = isset($_GET['timeout']);

// Ajusta o código HTTP de resposta: 401 para sessão/timeout, 404 para páginas inexistentes
if ($motivo !== 'sem_sessao' && !$isTimeout) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 401 Unauthorized');
}

if ($motivo === 'sem_sessao' || $isTimeout):
    $titulo = $isTimeout ? 'Sua sessão expirou' : 'Acesso restrito';
    $descricao = $isTimeout
    ? 'Por inatividade, sua sessão foi encerrada automaticamente por segurança. Faça login novamente para continuar.'
    : 'Você tentou acessar uma área protegida sem estar autenticado. Por favor, faça login para prosseguir.';
    $ascii = <<<ASCII
    ╔══════════════════════════╗
    ║   ( ._.)   sessão?       ║
    ║   /  >🔒  não encontrei  ║
    ║  (  )  )                 ║
    ╚══════════════════════════╝
ASCII;
    $btnPrimario = ['href' => '../index.php', 'label' => 'Fazer login novamente'];
    $btnSecundario = null;
else:
    $titulo = 'Página não encontrada';
    $descricao = 'Desculpe, a página que você procura não existe ou foi movida. Verifique o endereço ou volte ao início.';
    $ascii = <<<ASCII
    ╔══════════════════════════╗
    ║  (╥_╥)  404              ║
    ║  / > /  não encontrei    ║
    ║ (  ) )   nada aqui...    ║
    ╚══════════════════════════╝
ASCII;
    $btnPrimario = ['href' => '../pages/home.php', 'label' => 'Voltar ao início'];
    $btnSecundario = ['href' => '../index.php', 'label' => 'Fazer login'];
endif;
?>
    <div class="card">
        <pre class="ascii"><?= $ascii ;?></pre>

        <p class="error-code">
            <?= $motivo === 'sem_sessao' || $isTimeout ? 'Erro 401 · Não autorizado' : 'Erro 404 · Não encontrado' ;?>
        </p>

        <h1><?= $titulo ;?></h1>
        <p class="desc"><?= $descricao ;?></p>

        <div class="actions">
            <a href="<?= $btnPrimario['href'] ;?>" class="btn btn-primary">
                <?= $btnPrimario['label'] ;?>
            </a>
            <?php if ($btnSecundario): ?>
            <a href="<?= $btnSecundario['href'] ;?>" class="btn btn-ghost">
                <?= $btnSecundario['label'] ;?>
            </a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>