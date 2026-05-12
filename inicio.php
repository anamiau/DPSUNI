<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Unistore</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {
        background-image: ("c:\Users\Aluno\Downloads\unicorniocerto.png"); 
        background-repeat: no-repeat;
        background-size: cover;
        height: 500px; 
        background-position: left bottom;
        
    }

    /* NAVBAR */
    header {
        background: #f8c8dc;
        padding: 15px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h2 {
        color: #8b3a62;
    }

    nav a {
        margin: 0 10px;
        text-decoration: none;
        color: #8b3a62;
        font-size: 14px;
    }

    .buttons {
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 6px 12px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-login {
        border: 1px solid #8b3a62;
        color: #8b3a62;
    }

    .btn-register {
        background: #d63384;
        color: white;
    }

    /* HERO */
    .hero {
        height: 75vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;

        /* ✅ FUNDO CORRIGIDO */
        background-image: url("unicornio.jpg."); /* 🔥 TROQUE PELO NOME CERTO */

        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .hero h1 {
        font-size: 50px;
        color: #8b3a62;
        margin-bottom: 20px;
    }

    .hero input {
        padding: 10px;
        border-radius: 20px;
        border: 1px solid #f8c8dc;
        outline: none;
    }

    .hero button {
        padding: 10px 15px;
        border-radius: 20px;
        background: #d63384;
        color: white;
        border: none;
        cursor: pointer;
        margin-left: 10px;
    }

    .hero button:hover {
        background: #c2186a;
    }

</style>

</head>
<body>

<header>
    <h2>Unistore</h2>

    <nav>
        <a href="#">Produtos</a>
        <a href="#">Soluções</a>
        <a href="#">Comunidade</a>
    </nav>

    <div class="buttons">
        <a href="login.php" class="btn btn-login">Entrar</a>
        <a href="cadastro.php" class="btn btn-register">Cadastrar</a>
    </div>
</header>

<section class="hero">
    <h1>Unistore</h1>

    <div>
        <input type="email" placeholder="Digite seu email">
        <button>Enviar</button>
    </div>
</section>

</body>
</html>