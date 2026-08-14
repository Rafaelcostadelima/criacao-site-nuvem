<?php
session_start();

// 1. Proteção de acesso: deve ser SEMPRE a primeira coisa no topo
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

// 2. Dados da Franquia
$angryBirdsMedia = [
    [
        "titulo" => "Angry Birds (Clássico)",
        "tipo" => "Jogo",
        "ano" => 2009,
        "descricao" => "O jogo original e o primeiro da franquia que deu início a todo o sucesso.",
        "imagem" => "img/angrybird1.jpg"
    ],
    [
        "titulo" => "Angry Birds Space",
        "tipo" => "Jogo",
        "ano" => 2012,
        "descricao" => "Os Angry Birds vão para o espaço com novas mecânicas de gravidade e física.",
        "imagem" => "img/angrybird2.jpg"
    ],
    [
        "titulo" => "Angry Birds Toons",
        "tipo" => "Série",
        "ano" => 2013,
        "descricao" => "Primeira série animada focada no dia a dia divertido dos pássaros e porcos.",
        "imagem" => "img/angrybird3.jpg"
    ],
    [
        "titulo" => "Angry Birds Transformers",
        "tipo" => "Jogo",
        "ano" => 2014,
        "descricao" => "Os AutoBirds e os Deceptihogs se unem em um combate frenético contra os Eggbots.",
        "imagem" => "img/angrybird4.jpg"
    ],
    [
        "titulo" => "Angry Birds 2",
        "tipo" => "Jogo",
        "ano" => 2015,
        "descricao" => "A sequência oficial com gráficos aprimorados, novos personagens e habilidades.",
        "imagem" => "img/angrybird5.jpg"
    ],
    [
        "titulo" => "Angry Birds: O Filme",
        "tipo" => "Filme",
        "ano" => 2016,
        "descricao" => "O primeiro longa-metragem nos cinemas mostrando a origem da revolta dos pássaros.",
        "imagem" => "img/angrybird6.jpg"
    ],
    [
        "titulo" => "Angry Birds 2: O Filme",
        "tipo" => "Filme",
        "ano" => 2019,
        "descricao" => "Pássaros e porcos precisam se unir contra uma nova ameaça da Ilha Gelada.",
        "imagem" => "img/angrybird7.jpg"
    ],
    [
        "titulo" => "Angry Birds: Loucuras de Verão",
        "tipo" => "Série",
        "ano" => 2022,
        "descricao" => "Série animada da Netflix acompanhando as aventuras dos pássaros no acampamento.",
        "imagem" => "img/angrybird8.jpg"
    ],
    [
        "titulo" => "Angry Birds: O Filme 3",
        "tipo" => "Filme",
        "ano" => 2026,
        "descricao" => "O terceiro longa-metragem da franquia continuando a saga nos cinemas.",
        "imagem" => "img/angrybird9.jpg"
    ]
];

// Ordena os itens por ano
usort($angryBirdsMedia, function ($a, $b) {
    return $a['ano'] <=> $b['ano'];
});

// Inclui o cabeçalho (que já traz as tags de início e o banner)
include 'cabecalho.php';
?>

<!-- Seção do Título da Linha do Tempo -->
<section class="timeline-header">
    <div class="container">
        <span class="timeline-subtitle">Linha do Tempo</span>
        <h1 class="timeline-title">Franquia Angry Birds: Ordem Cronológica</h1>
        <div class="title-bar"></div>
    </div>
</section>

<!-- Grid com os Cards -->
<main class="grid-container">
    <?php
    foreach ($angryBirdsMedia as $item) {
        $tipoClass = strtolower(str_replace('é', 'e', $item['tipo']));

        echo '<article class="timeline-card">';
        echo '  <div class="card-img-wrapper">';
        echo '      <img src="' . htmlspecialchars($item['imagem']) . '" alt="' . htmlspecialchars($item['titulo']) . '" loading="lazy">';
        echo '      <span class="badge ' . $tipoClass . '">' . htmlspecialchars($item['tipo']) . '</span>';
        echo '  </div>';
        echo '  <div class="card-content">';
        echo '      <span class="card-year">🗓️ ' . $item['ano'] . '</span>';
        echo '      <h2 class="card-title">' . htmlspecialchars($item['titulo']) . '</h2>';
        echo '      <p class="card-desc">' . htmlspecialchars($item['descricao']) . '</p>';
        echo '  </div>';
        echo '</article>';
    }
    ?>
</main>
<!-- Exemplo de botão de saída para colocar na pagina2.php -->
<div class="logout-container">
    <a href="logout.php" class="btn-logout">Sair da Conta</a>
</div>
</body>

</html>