<?php include 'cabecalho.php'; ?>

<?php

$angryBirdsMedia = [
    [
        "titulo" => "Angry Birds (Clássico)",
        "tipo" => "Jogo",
        "ano" => 2009,
        "descricao" => "O jogo original e o primeiro da franquia.",
        "imagem" => "img/angrybird1.jpg"
    ],
    [
        "titulo" => "Angry Birds Space",
        "tipo" => "Jogo",
        "ano" => 2012,
        "descricao" => "Os AngryBirds vão para o espaço e com novas mecânicas de gravidade.",
        "imagem" => "img/angrybird2.jpg"
    ],
    [
        "titulo" => "Angry Birds Toons",
        "tipo" => "Série",
        "ano" => 2013,
        "descricao" => "Primeira série animada focada no dia a dia dos pássaros e porcos.",
        "imagem" => "img/angrybird3.jpg"
    ],
    [
        "titulo" => "Angry Birds Transformers",
        "tipo" => "Jogo",
        "ano" => 2014,
        "descricao" => "Os AutoBirds e os Deceptihogs se unem contra os Eggbots.",
        "imagem" => "img/angrybird4.jpg"
    ],
    [
        "titulo" => "Angry Birds 2",
        "tipo" => "Jogo",
        "ano" => 2015,
        "descricao" => "A sequência oficial do jogo original, com gráficos atualizados, novos personagens e novas habilidades.",
        "imagem" => "img/angrybird5.jpg"
    ],
    [
        "titulo" => "Angry Birds: O Filme",
        "tipo" => "Filme",
        "ano" => 2016,
        "descricao" => "O primeiro longa-metragem mostrando a revolta dos passáros.",
        "imagem" => "img/angrybird6.jpg"
    ],
    [
        "titulo" => "Angry Birds 2: O Filme",
        "tipo" => "Filme",
        "ano" => 2019,
        "descricao" => "Pássaros e porcos precisam se unir para enfrentar uma nova ameaça glacial.",
        "imagem" => "img/angrybird7.jpg"
    ],
    [
        "titulo" => "Angry Birds: Loucuras de Verão",
        "tipo" => "Série",
        "ano" => 2022,
        "descricao" => "Série animada da Netflix acompanhando os pássaros adolescentes em um acampamento.",
        "imagem" => "img/angrybird8.jpg"
    ],
    [
        "titulo" => "Angry Birds O Filme 3",
        "tipo" => "Filme",
        "ano" => 2026,
        "descricao" => "O terceiro longa-metragem da franquia nos cinemas.",
        "imagem" => "img/angrybird9.jpg"
    ]
];


usort($angryBirdsMedia, function($a, $b) {
    return $a['ano'] <=> $b['ano'];
});
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linha do Tempo: Angry Birds</title>
    <style>
        /* Estilos CSS para deixar a página bonita */
       
    </style>
</head>
<body>

    <h1>🐥 Franquia Angry Birds: Ordem Cronológica 🐷</h1>

    <div class="grid-container">
        <?php
        // 3. Loop para criar um card para cada item da nossa lista ordenada
        foreach ($angryBirdsMedia as $item) {
            
            // Tratamento para a classe do CSS ficar correta (tirar acento e minúscula)
            $tipoClass = strtolower(str_replace('é', 'e', $item['tipo'])); 
            
            echo '<div class="card">';
            echo '  <img src="' . $item['imagem'] . '" alt="' . $item['titulo'] . '">';
            echo '  <div class="card-content">';
            echo '      <span class="badge ' . $tipoClass . '">' . $item['tipo'] . '</span>';
            echo '      <h2 class="card-title">' . $item['titulo'] . '</h2>';
            echo '      <span class="card-year">Lançamento: ' . $item['ano'] . '</span>';
            echo '      <p class="card-desc">' . $item['descricao'] . '</p>';
            echo '  </div>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>