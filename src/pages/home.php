<?php require_once '../includes/sessionCheck.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como funcionam as aplicações na Web?</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Syne:wght@700;800&family=Space+Mono&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>

    <!-- NAVBAR -->
    <header class="header">
        <nav class="navbar">
            <a href="#home" class="navLinks">Início</a>
            <a href="#estruturaWeb" class="navLinks">Estrutura Web</a>
            <a href="#linguagemPHP" class="navLinks">PHP</a>
            <a href="#bancoMySQL" class="navLinks">MySQL</a>
            <a href="#persistencia" class="navLinks">Persistência</a>
            <a href="#webService" class="navLinks">Web-Service</a>
            <a href="logout.php" class="navLinks nav-logout">
                <i class="fa-solid fa-right-from-bracket"></i> Sair
            </a>
        </nav>
    </header>

    <!-- ══════════════════════════════════════════
        SEÇÃO 1 — BANNER INICIAL
    ══════════════════════════════════════════ -->
    <section id="home" class="section-hero">
        <div class="hero-bg-art" aria-hidden="true">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>
            <div class="grid-lines"></div>
        </div>

        <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                Trabalho A1 · Aplicações para Internet
            </div>
            <h1 class="hero-title">
                Como funcionam<br>
                <em>aplicações</em> na Web?
            </h1>
            <p class="hero-sub">
                Uma jornada pelos fundamentos do desenvolvimento web — do cliente ao servidor,
                do PHP ao MySQL, da persistência aos Web Services.
            </p>
            <div class="hero-cta">
                <a href="#estruturaWeb" class="cta-btn">Explorar conteúdo</a>
                <span class="cta-hint">
                    <i class="fa-solid fa-chevron-down"></i> Role para descobrir
                </span>
            </div>
        </div>

        <div class="hero-art" aria-hidden="true">
            <div class="code-window">
                <div class="window-bar">
                    <span class="dot red"></span>
                    <span class="dot yellow"></span>
                    <span class="dot green"></span>
                    <span class="window-title">app.php</span>
                </div>
                <pre class="code-block"><span class="ct">&lt;?php</span>
<span class="ck">session_start</span><span class="cp">()</span><span class="cs">;</span>

<span class="ck">$usuario</span> <span class="cs">=</span> <span class="cm">validar</span><span class="cp">(</span>
<span class="cl">$_POST</span><span class="cs">[</span><span class="co">'email'</span><span class="cs">]</span><span class="cp">)</span><span class="cs">;</span>

<span class="cm">echo</span> <span class="co">"Bem-vindo, "</span>
    <span class="cs">.</span> <span class="ck">$usuario</span><span class="cs">;</span>
<span class="ct">?&gt;</span></pre>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
        SEÇÃO 2 — ESTRUTURA WEB
    ══════════════════════════════════════════ -->
    <section id="estruturaWeb" class="section-content">
        <div class="glass-card">
            <div class="card-header">
                <span class="card-tag">01</span>
                <div>
                    <h2 class="card-title">A Estrutura da Programação Web</h2>
                    <p class="card-subtitle">Como cliente e servidor se comunicam para entregar uma página</p>
                </div>
            </div>
            <div class="four-col">
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-display"></i></div>
                    <h3>Lado Cliente</h3>
                    <p>O navegador interpreta HTML, CSS e JavaScript para renderizar a interface. Toda a lógica de
                        apresentação roda localmente, sem precisar do servidor.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-server"></i></div>
                    <h3>Lado Servidor</h3>
                    <p>O servidor processa requisições, executa a lógica de negócio, consulta bancos de dados e devolve
                        respostas ao cliente — geralmente em HTML ou JSON.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-arrow-right-arrow-left"></i></div>
                    <h3>Protocolo HTTP</h3>
                    <p>A comunicação se dá via HTTP: o cliente envia uma <em>request</em> (GET, POST, PUT, DELETE) e o
                        servidor responde com um status code e o conteúdo solicitado.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-layer-group"></i></div>
                    <h3>Camadas da App</h3>
                    <p>Aplicações modernas separam apresentação, lógica e dados em camadas distintas — padrão MVC —
                        facilitando manutenção e escalabilidade do sistema.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
        SEÇÃO 3 — LINGUAGEM PHP
    ══════════════════════════════════════════ -->
    <section id="linguagemPHP" class="section-content">
        <div class="glass-card">
            <div class="card-header">
                <span class="card-tag">02</span>
                <div>
                    <h2 class="card-title">Linguagem PHP</h2>
                    <p class="card-subtitle">A linguagem de script server-side mais utilizada na web</p>
                </div>
            </div>
            <div class="four-col">
                <div class="col-item">
                    <div class="col-icon"><i class="fa-brands fa-php"></i></div>
                    <h3>O que é PHP</h3>
                    <p>PHP (Hypertext Preprocessor) é uma linguagem interpretada, de tipagem dinâmica, criada em 1994
                        por Rasmus Lerdorf e amplamente usada no backend web.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-code"></i></div>
                    <h3>Estrutura</h3>
                    <p>Código PHP é delimitado por <code>&lt;?php ... ?&gt;</code>. Suporta variáveis, arrays, funções,
                        classes, namespaces e interfaces — paradigmas procedural e OOP.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-gears"></i></div>
                    <h3>Funcionamento</h3>
                    <p>O servidor web (Apache/Nginx) recebe a requisição, passa o arquivo ao interpretador PHP, que
                        executa o código e retorna HTML puro ao navegador.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Segurança</h3>
                    <p>Boas práticas incluem validação de inputs com <code>filter_input()</code>, hashing de senhas com
                        <code>password_hash()</code> e proteção contra SQL Injection via PDO.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
        SEÇÃO 4 — BANCO MYSQL
    ══════════════════════════════════════════ -->
    <section id="bancoMySQL" class="section-content">
        <div class="glass-card">
            <div class="card-header">
                <span class="card-tag">03</span>
                <div>
                    <h2 class="card-title">Banco MySQL</h2>
                    <p class="card-subtitle">O sistema de gerenciamento de banco de dados relacional mais popular do
                        mundo</p>
                </div>
            </div>
            <div class="four-col">
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-database"></i></div>
                    <h3>O que é</h3>
                    <p>MySQL é um SGBD relacional open-source que organiza dados em tabelas com linhas e colunas, usando
                        SQL (Structured Query Language) como linguagem de consulta.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-table"></i></div>
                    <h3>Estrutura</h3>
                    <p>Dados são organizados em <em>databases</em> → <em>tables</em> → <em>rows</em>. Cada tabela possui
                        colunas tipadas e pode ter chaves primárias e estrangeiras para integridade referencial.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <h3>Como funciona</h3>
                    <p>O cliente envia queries SQL ao servidor MySQL, que as analisa, otimiza e executa — buscando,
                        inserindo, atualizando ou deletando registros conforme solicitado.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-lock"></i></div>
                    <h3>Transações</h3>
                    <p>MySQL suporta ACID (Atomicidade, Consistência, Isolamento, Durabilidade) com o engine InnoDB,
                        garantindo integridade dos dados mesmo em falhas do sistema.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
        SEÇÃO 5 — CAMADA DE PERSISTÊNCIA
    ══════════════════════════════════════════ -->
    <section id="persistencia" class="section-content">
        <div class="glass-card">
            <div class="card-header">
                <span class="card-tag">04</span>
                <div>
                    <h2 class="card-title">Camada de Persistência</h2>
                    <p class="card-subtitle">Como integrar e mapear o MySQL com PHP de forma segura e eficiente</p>
                </div>
            </div>
            <div class="four-col">
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-plug"></i></div>
                    <h3>PDO</h3>
                    <p>PHP Data Objects é a interface padrão para conexão com bancos de dados. Abstrai o SGBD,
                        permitindo trocar MySQL por PostgreSQL sem reescrever a camada de acesso.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-terminal"></i></div>
                    <h3>Prepared Statements</h3>
                    <p>Queries parametrizadas com <code>prepare()</code> e <code>execute()</code> separam código SQL de
                        dados do usuário, eliminando vulnerabilidades de SQL Injection.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-diagram-project"></i></div>
                    <h3>ORM</h3>
                    <p>Object-Relational Mapping mapeia tabelas em classes PHP. Frameworks como Eloquent (Laravel)
                        permitem manipular registros como objetos, sem escrever SQL manualmente.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-arrows-spin"></i></div>
                    <h3>Padrão Repository</h3>
                    <p>Isola a lógica de acesso a dados do restante da aplicação. A camada de negócio não sabe
                        <em>como</em> os dados são buscados — apenas solicita e recebe os resultados.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
        SEÇÃO 6 — WEB SERVICE
    ══════════════════════════════════════════ -->
    <section id="webService" class="section-content">
        <div class="glass-card">
            <div class="card-header">
                <span class="card-tag">05</span>
                <div>
                    <h2 class="card-title">Web-Service & REST</h2>
                    <p class="card-subtitle">Comunicação entre sistemas via HTTP — a espinha dorsal das APIs modernas
                    </p>
                </div>
            </div>
            <div class="four-col">
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-cloud"></i></div>
                    <h3>O que é</h3>
                    <p>Web Service é um sistema que disponibiliza funcionalidades via rede usando protocolos
                        padronizados (HTTP/HTTPS), permitindo integração entre aplicações heterogêneas.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-sitemap"></i></div>
                    <h3>REST</h3>
                    <p>Representational State Transfer é um estilo arquitetural que usa verbos HTTP (GET, POST, PUT,
                        DELETE) e URIs para representar recursos — stateless e escalável.</p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-wrench"></i></div>
                    <h3>Como implementar</h3>
                    <p>Em PHP, leia o método com <code>$_SERVER['REQUEST_METHOD']</code>, roteie para funções
                        específicas, processe JSON com <code>json_decode()</code> e retorne com
                        <code>json_encode()</code>.
                    </p>
                </div>
                <div class="col-item">
                    <div class="col-icon"><i class="fa-solid fa-file-code"></i></div>
                    <h3>JSON</h3>
                    <p>JavaScript Object Notation é o formato padrão de troca de dados em APIs REST. Leve, legível por
                        humanos e suportado nativamente em todas as linguagens modernas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php require_once '../includes/footer.php'; ?>

    <script src="../js/main.js"></script>
</body>

</html>