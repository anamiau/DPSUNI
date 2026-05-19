<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Unistore</title>

<!-- FONTES -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>

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

/* LOGIN CLIENTE/VENDEDOR (HEADER) */
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

/* CONTEÚDO HERO */
.hero-content{
    max-width:700px;
    padding:20px;
}

/* TÍTULO */
.hero h1{
    font-family:'Cinzel', serif;
    font-size:80px;
    color:#8b3a62;
}

/* TEXTO */
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

/* BOTÕES GERAIS */
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

/* CLIENTE (ROSA CLARO) */
.cliente{
    background:linear-gradient(45deg,#ff9ecb,#ff4fa3);
}

/* VENDEDOR (ROSA FORTE) */
.vendedor{
    background:linear-gradient(45deg,#ff006e,#ff2d95);
}

/* HOVER */
.magic-btn:hover{
    transform:translateY(-5px) scale(1.05);
}

/* CADASTRO LINK */
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
    font-size:48px;
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

</style>

</head>

<body>

<header>

    <div class="logo">Unistore ✨</div>

    <nav>
        <a href="#">Produtos</a>
        <a href="#">Categorias</a>
        <a href="#">Promoções</a>
        <a href="#">Contato</a>
    </nav>

    <div class="buttons">

        <a href="login_cliente.php" class="btn btn-login">Cliente</a>
        <a href="login_vendedor.php" class="btn btn-login">Vendedor</a>
        <a href="cadastro.php" class="btn btn-register">Criar Conta</a>

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

<section class="topicos">

    <h2>Explore a Magia</h2>

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

</body>
</html>
