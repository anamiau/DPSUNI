<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Unistore</title>

<!-- FONTES -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>

html{
    scroll-behavior:smooth;
}

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

/* BODY */
body{
    background:#fff7fb;
    font-family:'Poppins', sans-serif;
    overflow-x:hidden;
}

/* NAVBAR */
header{
    width:100%;
    padding:20px 50px;
    display:flex;
    justify-content:space-between;
    align-items:center;

    background:rgba(255,255,255,0.25);
    backdrop-filter:blur(10px);

    position:fixed;
    top:0;
    z-index:1000;
}

/* LOGO */
.logo{
    font-family:'Cinzel', serif;
    font-size:34px;
    color:#8b3a62;
    letter-spacing:2px;
}

/* MENU */
nav a{
    text-decoration:none;
    margin:0 15px;
    color:#7a4560;
    font-weight:500;
    transition:0.3s;
    position:relative;
}

nav a:hover{
    color:#d63384;
}

nav a::after{
    content:"";
    width:0%;
    height:2px;
    background:#d63384;
    position:absolute;
    left:0;
    bottom:-5px;
    transition:0.3s;
}

nav a:hover::after{
    width:100%;
}

/* BOTÕES HEADER */
.buttons{
    display:flex;
    gap:12px;
}

.btn{
    padding:12px 22px;
    border-radius:30px;
    text-decoration:none;
    transition:0.3s;
    font-size:14px;
    font-weight:500;
}

/* LOGIN */
.btn-login{
    border:1px solid #8b3a62;
    color:#8b3a62;
    background:white;
}

.btn-login:hover{
    background:#8b3a62;
    color:white;
}

/* CRIAR CONTA */
.btn-register{
    background:linear-gradient(45deg,#ff4fa3,#ffb3d9,#ffd6a5);
    color:white;
    box-shadow:0 4px 15px rgba(255,79,163,0.35);
}

.btn-register:hover{
    transform:translateY(-3px) scale(1.05);
}

/* HERO */
.hero{
    height:100vh;

    background-image:
    linear-gradient(
    rgba(255,255,255,0.45),
    rgba(255,255,255,0.45)),
    url("unicorniocerto.png");

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
}

/* HERO CONTENT */
.hero-content{
    max-width:700px;
    padding:20px;
}

.hero h1{
    font-family:'Cinzel', serif;
    font-size:80px;
    color:#8b3a62;
}

.hero p{
    font-size:22px;
    color:#5e3550;
    margin-bottom:40px;
}

/* BOTÕES HERO */
.login-options{
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:30px;
}

.magic-btn{
    padding:15px 30px;
    border:none;
    border-radius:40px;
    font-size:16px;
    cursor:pointer;
    text-decoration:none;
    color:white;
    transition:0.4s;
}

.cliente{
    background:linear-gradient(45deg,#ff9ecb,#ff4fa3);
}

.vendedor{
    background:linear-gradient(45deg,#ff006e,#ff2d95);
}

.magic-btn:hover{
    transform:translateY(-5px) scale(1.05);
}

.cadastro-link a{
    text-decoration:none;
    color:#8b3a62;
    font-weight:600;
    font-size:19px;
}

.cadastro-link a:hover{
    color:#d63384;
}

/* TÓPICOS */
.topicos{
    padding:100px 40px;
    text-align:center;
    background:white;
}

.topicos h2{
    font-family:'Cinzel', serif;
    font-size:38px;
    color:#8b3a62;
    margin-bottom:60px;
}

/* CARDS */
.cards{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:30px;
}

.card{
    width:260px;
    padding:35px 25px;
    border-radius:25px;
    background:linear-gradient(180deg,#ffe4f3,#fff);
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    transition:0.4s;
}

.card:hover{
    transform:translateY(-10px);
}

.card h3{
    color:#8b3a62;
    margin-bottom:15px;
}

.card p{
    color:#666;
}

/* PRODUTOS */
.produtos{
    padding:100px 40px;
    background:#fff7fb;
    text-align:center;
}

.produtos h2{
    font-family:'Cinzel', serif;
    font-size:38px;
    color:#8b3a62;
    margin-bottom:10px;
}

/* SUBTÍTULO ALTERADO */
.subtitulo{
    font-family:'Poppins', sans-serif;
    font-size:16px;
    font-weight:400;
    color:#b05c85;
    margin-bottom:50px;
}

/* GRID */
.produtos-container{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(230px, 1fr));
    gap:30px;
    max-width:1100px;
    margin:0 auto;
}

/* CARD PRODUTO */
.produto-card{
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    transition:0.4s;
}

.produto-card:hover{
    transform:translateY(-10px);
}

/* IMAGEM */
.produto-img{
    width:100%;
    height:220px;
    background:#ffe4f3;
    overflow:hidden;
}

.produto-img img{
    width:100%;
    height:100%;
    object-fit:cover;
}

/* INFO */
.produto-info{
    padding:22px;
    text-align:left;
}

.produto-info h3{
    color:#8b3a62;
    margin-bottom:8px;
}

.produto-info p{
    color:#666;
    font-size:14px;
    margin-bottom:12px;
}

.preco{
    color:#d63384;
    font-size:20px;
    font-weight:600;
    margin-bottom:18px;
}

/* BOTÃO PRODUTO */
.btn-produto{
    display:inline-block;
    padding:10px 18px;
    border-radius:20px;
    text-decoration:none;
    background:linear-gradient(45deg,#ff4fa3,#ff85c2);
    color:white;
    font-size:14px;
    transition:0.3s;
}

.btn-produto:hover{
    transform:scale(1.05);
    opacity:0.9;
}

/* BOTÃO VER MAIS */
.ver-mais-container{
    margin-top:50px;
    text-align:center;
}

.btn-ver-mais{
    display:inline-block;
    padding:14px 34px;
    border-radius:35px;
    text-decoration:none;
    background:linear-gradient(45deg,#ff4fa3,#ff85c2);
    color:white;
    font-size:16px;
    font-weight:500;
    transition:0.3s;
    box-shadow:0 6px 18px rgba(255,79,163,0.25);
}

.btn-ver-mais:hover{
    transform:translateY(-4px) scale(1.05);
    opacity:0.92;
}

/* FOOTER */
footer{
    padding:30px;
    text-align:center;
    background:white;
    color:#8b3a62;
}

/* RESPONSIVO */
@media(max-width:768px){

    header{
        padding:18px 25px;
        flex-direction:column;
        gap:15px;
    }

    .hero h1{
        font-size:52px;
    }

    .hero p{
        font-size:18px;
    }

    .topicos h2,
    .produtos h2{
        font-size:36px;
    }

}

</style>

</head>

<body>

<header>

    <div class="logo">Unistore ✨</div>

    <nav>
        <a href="#produtos">PRODUTOS</a>
        <a href="#sobre">SOBRE NÓS</a>
    </nav>

    <div class="buttons">

        <a href="login_cliente.php" class="btn btn-login">Cliente</a>
        <a href="login_vendedor.php" class="btn btn-login">Vendedor</a>
        <a href="cadastro.php" class="btn btn-register">Criar Conta ✨</a>

    </div>

</header>

<section class="hero">

    <div class="hero-content">

        <h1>Unistore</h1>

        <p>Um mundo mágico para suas compras ✨</p>

        <div class="login-options">

            <a href="login_cliente.php" class="magic-btn cliente">
                Entrar como Cliente
            </a>

            <a href="login_vendedor.php" class="magic-btn vendedor">
                Entrar como Vendedor
            </a>

        </div>

        <div class="cadastro-link">
            <a href="cadastro.php">✨ Criar uma nova conta</a>
        </div>

    </div>

</section>

<section class="topicos" id="sobre">

    <h2>POR QUE USAR A UNISTORE?</h2>

    <div class="cards">

        <div class="card">
            <h3>🛍 Produtos</h3>
            <p>Descubra itens mágicos e exclusivos.</p>
        </div>

        <div class="card">
            <h3>🔥 Promoções</h3>
            <p>Aproveite descontos encantadores.</p>
        </div>

        <div class="card">
            <h3>🌙 Comunidade</h3>
            <p>Conheça aventureiros da Unistore.</p>
        </div>

        <div class="card">
            <h3>📦 Pedidos</h3>
            <p>Acompanhe suas compras facilmente.</p>
        </div>

    </div>

</section>

<!-- PRODUTOS -->
<section class="produtos" id="produtos">

    <h2>EXPLORE A MAGIA</h2>

    <p class="subtitulo">
        Navegue por nossos produtos 👇
    </p>

    <div class="produtos-container">

        <!-- PRODUTO 1 -->
        <div class="produto-card">

            <div class="produto-img">
                <img src="produto1.jpg" alt="Produto 1">
            </div>

            <div class="produto-info">

                <h3>Produto 1</h3>

                <p>Descrição curta do produto.</p>

                <div class="preco">R$ 00,00</div>

                <a href="login.php" class="btn-produto">
                    Ver produto
                </a>

            </div>

        </div>

        <!-- PRODUTO 2 -->
        <div class="produto-card">

            <div class="produto-img">
                <img src="produto2.jpg" alt="Produto 2">
            </div>

            <div class="produto-info">

                <h3>Produto 2</h3>

                <p>Descrição curta do produto.</p>

                <div class="preco">R$ 00,00</div>

                <a href="login.php" class="btn-produto">
                    Ver produto
                </a>

            </div>

        </div>

        <!-- PRODUTO 3 -->
        <div class="produto-card">

            <div class="produto-img">
                <img src="produto3.jpg" alt="Produto 3">
            </div>

            <div class="produto-info">

                <h3>Produto 3</h3>

                <p>Descrição curta do produto.</p>

                <div class="preco">R$ 00,00</div>

                <a href="login.php" class="btn-produto">
                    Ver produto
                </a>

            </div>

        </div>

        <!-- PRODUTO 4 -->
        <div class="produto-card">

            <div class="produto-img">
                <img src="produto4.jpg" alt="Produto 4">
            </div>

            <div class="produto-info">

                <h3>Produto 4</h3>

                <p>Descrição curta do produto.</p>

                <div class="preco">R$ 00,00</div>

                <a href="login.php" class="btn-produto">
                    Ver produto
                </a>

            </div>

        </div>

    </div>

    <!-- BOTÃO VER MAIS -->
<div class="ver-mais-container">

    <a href="login.php" class="btn-ver-mais">
        ✨ VER MAIS
    </a>

</div>

</section>

<footer>
    logo
</footer>

</body>
</html>
