<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Minha Loja</title>

    <style>
    </style>
</head>
<body>
    <nav class="navbar">
    <div class="logo">
        <img src="https://media.tenor.com/OoG1CF2T3QIAAAAi/kucing-scuba-scuba-cat.gif" alt="Logo">
    </div>
    <div class="nav-links">
        <a href="#">Produtos</a>
        <a href="#">Dúvidas</a>
        <a href="#">Contato</a>
    </div>

    <div class="nav-actions">
        <button class="btn-signin" onclick="window.location.href='login.php'">Sign in</button>
        <button class="btn-register" onclick="window.location.href='cadastro.php'">Register</button>
    </div>
    </nav>

    <div class="sort-bar">
        <button class="sort-btn ativo">Novo</button>
        <button class="sort-btn">Maior preço</button>
        <button class="sort-btn">Menor preço</button>
    </div>

    <div class="produto-grid">

    <div class="produto-card">
        <div class="produto-imagem"><img src="https://i.pinimg.com/736x/cb/33/9a/cb339a683738c3e97a95f37d377d69f3.jpg" alt="MLP"></div>
        <div class="produto-info">
            <p class="produto-nome">Item 1</p>
            <p class="produto-preco">$5</p>
        </div>
    </div>

    <div class="produto-card">
        <div class="produto-imagem"><img src="https://i.pinimg.com/736x/f5/0f/01/f50f017ea579e3c8a544f052aa400a1b.jpg" alt="Unicornio"></div>
        <div class="produto-info">
            <p class="produto-nome">Item 2</p>
            <p class="produto-preco">$10</p>
        </div>
    </div>

    <div class="produto-card">
        <div class="produto-imagem"><img src="https://i.pinimg.com/736x/07/a2/e2/07a2e259bac5f66945a1a75832d86ee1.jpg" alt="Ponei"></div>
        <div class="produto-info">
            <p class="produto-nome">Item 3</p>
            <p class="produto-preco">$3</p>
        </div>
    </div>

    <div class="produto-card destaque">
        <div class="produto-imagem"><img src="https://i.pinimg.com/736x/16/9e/6e/169e6e07391edec0c579f7c968333bfd.jpg" alt="ble"></div>
        <div class="produto-info">
            <p class="produto-nome">Featured Item</p>
            <p class="produto-preco">$0</p>
        </div>
    </div>
</div>
</body>
</html>