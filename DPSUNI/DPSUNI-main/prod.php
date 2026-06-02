<?php
include "conexao.php";

$produtos = $conexao->query("SELECT * FROM produtos ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Unistore</title>

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="logo">
        <img src="https://media.tenor.com/OoG1CF2T3QIAAAAi/kucing-scuba-scuba-cat.gif" alt="Logo" style="width: 60px; height: 60px; object-fit: contain;">
    </div>
    <nav>
        <a href="#">Produtos</a>
        <a href="#">Categorias</a>
    </nav>

    <div class="buttons">
        <a href="login_cliente.php" class="btn btn-login">Cliente</a>
        <a href="login_vendedor.php" class="btn btn-login">Vendedor</a>
        <a href="cadastro.php" class="btn btn-register">Criar Conta</a>
    </div>

</header>

<div class="sort-bar">
    <button class="sort-btn ativo">Novo</button>
    <button class="sort-btn">Maior preço</button>
    <button class="sort-btn">Menor preço</button>
</div>

<div class="produto-grid">

    <?php foreach ($produtos as $p): ?>
    <a href="produto.php?id=<?= $p['id'] ?>" style="text-decoration: none; color: inherit;">
        <div class="produto-card">
            <div class="produto-imagem">
                <img src="<?= $p['fotos'] ?>" alt="<?= $p['nome'] ?>">
            </div>
            <div class="produto-info">
                <p class="produto-nome"><?= $p['nome'] ?></p>
                <p class="produto-preco">R$ <?= number_format($p['preco'], 2, ',', '.') ?></p>
            </div>
        </div>
    </a>
    <?php endforeach; ?>

</div>

</body>
</html>