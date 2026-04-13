<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: home.php');
    exit;
}

$erro = '';
$sucesso = '';
$modo = 'login';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {

    if ($_POST['acao'] === 'login') {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = $_POST['senha'] ?? '';

        if (autenticar($email, $senha)) {
            $_SESSION['usuario'] = $email;
            $_SESSION['ultimo_acesso'] = time();
            header('Location: home.php');
            exit;
        } else {
            $erro = 'Email ou senha inválidos.';
            $modo = 'login';
        }
    }

    if ($_POST['acao'] === 'cadastro') {
        $modo = 'cadastro';
        $nome = htmlspecialchars($_POST['nome'] ?? '');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'] ?? '';
        $confirm = $_POST['confirmar'] ?? '';

        $validacao = validarCadastro($nome, $email, $senha, $confirm);

        if ($validacao === true) {
            cadastrar($nome, $email, $senha);
            $sucesso = 'Cadastro realizado com sucesso! Faça login para continuar.';
            $modo = 'login';
        } else {
            $erro = $validacao;
        }

    }

}

function senhaValida(string $senha)
{

    return strlen($senha) >= 8
    && preg_match('/[A-Z]/', $senha)
    && preg_match('/[0-9]/', $senha)
    && preg_match('/[^A-Za-z0-9]/', $senha);

}

function dominioValido(string $email)
{
    $dominioPermitido = 'veigadealmeida.edu.br';
    return str_ends_with($email, '@' . $dominioPermitido);
}

function cadastrar(string $nome, string $email, string $senha)
{
    $usuarios = lerUsuarios();
    $usuarios[] = [
        'nome' => $nome,
        'email' => $email,
        'senha' => password_hash($senha, PASSWORD_DEFAULT),
    ];
    gravarUsuarios($usuarios);
}

function lerUsuarios()
{
    $arquivo = __DIR__ . '/data/usuarios.json';
    if (!file_exists($arquivo)) {
        return [];
    }

    return json_decode(file_get_contents($arquivo), true) ?? [];
}

function gravarUsuarios(array $usuarios)
{
    $arquivo = __DIR__ . '/data/usuarios.json';
    file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT));
}

function autenticar(string $email, string $senha)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE)) {
        return false;
    }

    foreach (lerUsuarios() as $u) {
        if ($u['email'] === $email && password_verify($senha, $u['senha'])) {
            return true;
        }
    }
    return false;
}

function validarCadastro(string $nome, string $email, string $senha, string $confirm)
{
    if (empty($nome)) {
        return 'Informe o nome.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE)) {
        return 'Email inválido.';
    }

    if (!dominioValido($email)) {
        return 'Somente e-mails @veigadealmeida.edu.br são permitidos.';
    }

    if (!senhaValida($senha)) {
        return 'Senha fraca (mín. 8 caracteres, maiúsculas, números e caracteres especiais).';
    }

    if ($senha !== $confirm) {
        return 'As senhas não coincidem.';
    }

    foreach (lerUsuarios() as $u) {
        if ($u['email'] === $email) {
            return 'Email já cadastrado.';
        }
    }
    return true;

}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Como funcionam aplicações na Web?</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body class="auth-page">
    <div class="page-wrapper">
        <div class="auth-card">
            <?php if ($erro): ?>
            <p class="msg error"><?= $erro ;?></p>
            <?php endif; ?>
            <?php if ($sucesso): ?>
            <p class="msg success"><?= $sucesso ;?></p>
            <?php endif; ?>
        </div>

        <div class="container">

            <div class="form-box login">
                <form id="form-login" method="post" action="index.php">
                    <h1>Login</h1>
                    <input type="hidden" name="acao" value="login">
                    <div class="input-box">
                        <input type="text" name="email" placeholder="email@veigadealmeida.edu.br" required>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="senha" placeholder="Senha" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="forgot-link">
                        <a href="#">Esqueci minha senha</a>
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>

            <div class="form-box register">
                <form id="form-register" method="post" action="index.php">
                    <h1>Registrar</h1>
                    <input type="hidden" name="acao" value="cadastro">
                    <div class="input-box">
                        <input type="text" name="nome" placeholder="Nome" required>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="email" placeholder="email@veigadealmeida.edu.br" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="senha" placeholder="Senha" required
                            oninput="mostrarForca(this.value)" minlength="8">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div id="barra-forca">
                        <div id="nivel-forca"></div>
                    </div>
                    <small id="dica-senha">Mín. 8 caract, maiúsculas, números e caracteres especiais</small>
                    <div class="input-box">
                        <input type="password" name="confirmar" placeholder="Confirmar senha" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <button type="submit" class="btn">Registrar</button>
                </form>
            </div>

            <div class="toggle-box">
                <div class="toggle-panel left">
                    <h1>Bem-vindo de volta!</h1>
                    <p>Faça login para acessar o conteúdo do site!</p>
                    <p>Ainda não tem uma conta?</p>
                    <button class="btn register-btn">Registrar</button>
                </div>

                <div class="toggle-panel right">
                    <h1>Seja bem-vindo!</h1>
                    <p>Cadastre-se para acessar o conteúdo do site!</p>
                    <p>Já tem uma conta?</p>
                    <button class="btn login-btn">Login</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    <?php if ($modo === 'cadastro'): ?>
    document.querySelector('.container').classList.add('active');
    <?php endif; ?>
    </script>
    <script src="js/main.js"></script>
</body>

</html>