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

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>

<body>

<form method="post" action="">

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

<button type="submit" name="enviar">Fazer Login</button>

<p>A senha deve conter no mínimo: <br> 
8 caracteres <br> 
Uma letra minúscula <br> 
Uma letra maiúscula <br> 
Um caractere especial <br> 
Um número</p>

</form>

</body>
</html>