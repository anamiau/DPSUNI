<?php
include "conexao.php";

$mensagem = "";

if (isset($_POST['inserir'])) {

    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);
    $erro = false;

    // Validação de senha
    $senhaf = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha);
    if (!$senhaf) {
        $mensagem .= "<p class='erro'>A senha deve ter no mínimo 8 caracteres, com letra maiúscula, minúscula, número e símbolo.</p>";
        $erro = true;
    }

    // Validação de email
    $emailval = filter_var($login, FILTER_VALIDATE_EMAIL);
    if (!$emailval) {
        $mensagem .= "<p class='erro'>Digite um e-mail válido.</p>";
        $erro = true;
    }

    // Se não houver erro, insere no banco
    if (!$erro) {

        $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conexao->prepare("INSERT INTO usuarios (login, senha) VALUES (?, ?)");

        if (!$stmt) {
            die("Erro no prepare: " . $conexao->error);
        }

        $stmt->bind_param("ss", $login, $senhaCrip);

        if ($stmt->execute()) {

        header("Location: inicio.php");
        exit;

            $mensagem = "<p class='sucesso'>Cadastro realizado com sucesso!</p>";
        } else {
            $mensagem = "<p class='erro'>Erro ao cadastrar: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro</title>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    :root {
        --brand-gradient: linear-gradient(135deg, #f472b6 0%, #facc15 100%);
        --bg-gradient: linear-gradient(135deg, #ffe0f0 0%, #fff8d6 50%, #ffd6e8 100%);
        --color-primary: #be185d;
        --color-primary-light: #f472b6;
        --color-border: #fbb6d4;
        --color-text-main: #831843;
        --color-text-dim: #f0abcb;
        --shadow-main: 0 8px 32px rgba(220, 80, 140, 0.15);
        --shadow-subtle: 0 2px 8px rgba(220, 80, 140, 0.08);
        --transition-fast: 0.2s ease;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background: var(--bg-gradient);
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 420px;
    }

    /* 3. Componente Card */
    .card {
        background: #ffffff;
        padding: 40px 36px;
        border-radius: 24px;
        box-shadow: var(--shadow-main), var(--shadow-subtle);
        border: 1.5px solid #f9c6de;
    }

    .logo-circle {
        width: 64px;
        height: 64px;
        background: var(--brand-gradient);
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
    }

    /* 4. Tipografia */
    h2 {
        text-align: center;
        color: var(--color-primary);
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .subtitle {
        text-align: center;
        color: var(--color-text-dim);
        font-size: 13px;
        margin-bottom: 28px;
    }

    /* 5. Formulários */
    label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        color: var(--color-primary);
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    input {
        width: 100%;
        padding: 12px 16px;
        margin-bottom: 20px;
        border: 1.5px solid var(--color-border);
        border-radius: 12px;
        background: #fff5fa;
        font-family: inherit;
        font-size: 14px;
        color: var(--color-text-main);
        outline: none;
        transition: var(--transition-fast);
    }

    input:focus {
        border-color: var(--color-primary-light);
        box-shadow: 0 0 0 3px rgba(244, 114, 182, 0.15);
        background: #ffffff;
    }

    input::placeholder {
        color: var(--color-text-dim);
    }

    /* 6. Botões */
    button {
        width: 100%;
        padding: 14px;
        background: var(--brand-gradient);
        color: #ffffff;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        transition: transform 0.1s, opacity 0.2s, box-shadow 0.2s;
        margin-top: 4px;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    button:hover {
        opacity: 0.95;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(244, 114, 182, 0.2);
    }

    button:active {
        transform: translateY(0px);
    }

    /* 7. Estados de Feedback */
    .erro, .sucesso {
        font-size: 13px;
        font-weight: 500;
        text-align: center;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 10px;
        border: 1px solid;
    }

    .erro {
        color: #be123c;
        background: #fff1f5;
        border-color: #fda4af;
    }

    .sucesso {
        color: #166534;
        background: #f0fdf4;
        border-color: #86efac;
    }

    /* 8. Rodapé */
    .footer-link {
        text-align: center;
        margin-top: 24px;
        font-size: 13px;
        color: var(--color-text-dim);
    }

    .footer-link a {
        color: var(--color-primary);
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }

    .footer-link a:hover {
        text-decoration: underline;
        color: var(--color-primary-light);
    }
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="logo-circle">🌸</div>
        <h2>Criar conta</h2>
        <p class="subtitle">Preencha os dados para se registrar</p>

        <?php echo $mensagem; ?>

        <form method="post">

            <label>Nome:</label>
            <input name="nome" size="30" required placeholder="Seu nome completo" required>

            <label>E-mail/Celular</label>
            <input name="email_tel" type="text" placeholder="Digite aqui..." autocomplete="off" required>

            <label>Senha</label>
            <input name="senha" type="password" placeholder="Mínimo 8 caracteres" required>

            <label>CPF:</label>
            <input name="cpf" size="15" required placeholder="000.000.000-00" required>

            <label>Data de nascimento:</label>
            <input name="nasc" type="date" required>

            <label>Senha:</label> 
            <input name="senha" size="40" type="password" required>

            <label>CEP:</label>
            <input name="cep" size="10" required placeholder="00000-000" required>

            <button type="submit" name="inserir">Cadastrar</button>
        </form>

        <p class="footer-link">Já tem conta? <a href="login.php">Entrar</a></p>
    </div>
</div>
</body>
</html>