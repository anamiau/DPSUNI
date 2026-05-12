<?php

include "conexao.php";
$mensagem = [];

function validarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    if (strlen($cpf) != 11) return false;
    if (preg_match('/(\d)\1{10}/', $cpf)) return false;
    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($c = 0; $c < $t; $c++) {
            $soma += $cpf[$c] * (($t + 1) - $c);
        }
        $digito = ((10 * $soma) % 11) % 10;
        if ($cpf[$t] != $digito) return false;
    }
    return true;
}

function validarSenha($senha) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W_]).{8,}$/', $senha);
}

function validarNascimento($nasc) {
    if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $nasc, $m)) {
        return checkdate((int)$m[2], (int)$m[3], (int)$m[1]);
    }
    return false;
}

function validarCEP($cep) {
    $cep = preg_replace('/[^0-9]/', '', $cep);
    return strlen($cep) === 8;
}

function normalizarCEP($cep) {
    return preg_replace('/[^0-9]/', '', $cep);
}



if (isset($_POST['enviar'])):
    $email_tel = trim($_POST['email_tel'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $nasc = trim($_POST['nasc'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    $cep = trim($_POST['cep'] ?? '');
    $nome = trim($_POST['nome'] ?? '');

    $emailValido = filter_var($email_tel, FILTER_VALIDATE_EMAIL);
    $telefoneValido = preg_match('/^[0-9]{10,15}$/', preg_replace('/[^0-9]/', '', $email_tel));
    $cpfValido = validarCPF($cpf);
    $nascValido = validarNascimento($nasc);
    $senhaValida = validarSenha($senha);
    $cepValido = validarCEP($cep);

    $erros = [];
    if (!$emailValido && !$telefoneValido) $erros[] = "E-mail ou telefone inválido.";
    if (!$cpfValido) $erros[] = "CPF inválido.";
    if (!$nascValido) $erros[] = "Data de nascimento inválida.";
    if (!$senhaValida) $erros[] = "Senha não atende aos requisitos.";
    if (!$cepValido) $erros[] = "CEP inválido.";
    if (empty($nome)) $erros[] = "Nome é obrigatório."; // ✅ NOVO

    if (empty($erros)) {
        $cpfHash = hash('sha256', preg_replace('/[^0-9]/', '', $cpf));
        $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);
        $cepFormatado = normalizarCEP($cep);

        $email_telEsc = mysqli_real_escape_string($conexao, $email_tel);
        $nascEsc = mysqli_real_escape_string($conexao, $nasc);
        $cepEsc = mysqli_real_escape_string($conexao, $cepFormatado);
        $nomeEsc = mysqli_real_escape_string($conexao, $nome);

        $sql = mysqli_query($conexao,
            "INSERT INTO cadastro(`email_tel`, `cpf`, `data_nasc`, `senha`, `cep`, `nome`)
            VALUES('$email_telEsc', '$cpfHash', '$nascEsc', '$senhaCrip', '$cepEsc', '$nomeEsc')"
        );

        if ($sql) {
            $mensagem = ['tipo' => 'sucesso', 'texto' => 'Cadastro realizado com sucesso!'];
        } else {
            die("Erro ao salvar: " . mysqli_error($conexao)); 
        }
    } else {
        $mensagem = ['tipo' => 'erro', 'texto' => implode(' | ', $erros)];
    }
endif;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    :root {
        --primary-grad: linear-gradient(135deg, #f472b6 0%, #facc15 100%);
        --bg-grad: linear-gradient(135deg, #ffe0f0 0%, #fff8d6 50%, #ffd6e8 100%);
        --pink-dark: #be185d;
        --pink-medium: #f472b6;
        --pink-light: #fbb6d4;
        --pink-pale: #fff5fa;
        --text-muted: #f0abcb;
        --shadow-soft: 0 8px 32px rgba(220, 80, 140, 0.15);
        --transition: all 0.2s ease-in-out;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background: var(--bg-grad);
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        display: grid;
        place-items: center;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 420px;
    }

    .card {
        background: #ffffff;
        padding: 40px 36px;
        border-radius: 24px;
        box-shadow: var(--shadow-soft), 0 2px 8px rgba(220, 80, 140, 0.08);
        border: 1.5px solid #f9c6de;
    }

    .logo-circle {
        width: 64px;
        height: 64px;
        background: var(--primary-grad);
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
    }

    h2 {
        text-align: center;
        color: var(--pink-dark);
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .subtitle {
        text-align: center;
        color: var(--text-muted);
        font-size: 13px;
        margin-bottom: 28px;
    }

    label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        color: var(--pink-dark);
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    input {
        width: 100%;
        padding: 12px 16px;
        margin-bottom: 20px;
        border: 1.5px solid var(--pink-light);
        border-radius: 12px;
        background: var(--pink-pale);
        font-family: inherit;
        font-size: 14px;
        color: #831843;
        outline: none;
        transition: var(--transition);
    }

    input:focus {
        border-color: var(--pink-medium);
        box-shadow: 0 0 0 4px rgba(244, 114, 182, 0.1);
        background: #ffffff;
    }

    input::placeholder {
        color: var(--text-muted);
    }

    button {
        width: 100%;
        padding: 14px;
        background: var(--primary-grad);
        color: #ffffff;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        transition: var(--transition);
        margin-top: 4px;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    button:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(244, 114, 182, 0.3);
    }

    button:active {
        transform: translateY(0px);
    }

    .erro, .sucesso {
        font-size: 13px;
        font-weight: 500;
        text-align: center;
        border-radius: 10px;
        padding: 12px;
        margin-bottom: 20px;
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

        .footer-link {
        text-align: center;
        margin-top: 24px;
        font-size: 13px;
        color: var(--text-muted);
    }

    .footer-link a {
        color: var(--pink-dark);
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
    }

    .footer-link a:hover {
        color: var(--pink-medium);
        text-decoration: underline;
    }   
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="logo-circle">🌸</div>
        <h2>Login</h2>
        <p class="subtitle">Preencha os dados para realizar login</p>

        <?php echo $mensagem; ?>

        <form method="post">
<label>Nome:</label>
<input name="nome" size="30" required placeholder="Seu nome completo" required>

<label>Email/Telefone:</label>
<input name="email_tel" size="20" required placeholder="email@exemplo.com ou telefone" required>

<label>CPF:</label>
<input name="cpf" size="15" required placeholder="000.000.000-00" required>

<label>Data de nascimento:</label>
<input name="nasc" type="date" required>

<label>Senha:</label> 
<input name="senha" size="40" type="password" required>

<label>CEP:</label>
<input name="cep" size="10" required placeholder="00000-000" required>
            <button type="submit" name="enviar">Fazer login</button>
        </form>

        <p class="footer-link">Já tem conta? <a href="cadastro.php">Entrar</a></p>
        <p class="footer-link">Esqueceu sua senha? <a href="senha.php">Recuperar senha</a></p>
    </div>
</div>
</body>
</html>